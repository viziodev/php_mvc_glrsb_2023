<?php 
namespace App\Controllers; 
use App\Core\Helper;
use App\Core\Session;
use App\Core\Controller;
use App\Models\UserModel;
use App\Core\Autorisation;
use Rakit\Validation\Validator;
class AuthController extends Controller{
    private UserModel $userModel; 
    public function __construct()
    {
      parent::__construct();
      $this->userModel=new UserModel;
    }

    public function showLoginForm()
    {
        $this->layout="connexion";
         $this->renderView("auth/login.html.php");
        
    }

    public function login()
    {
       // Validator::isEmail($_POST['login'],'login');
        //Validator::isVide($_POST['password'],'password');
        $validator = new Validator;
        $validation = $validator->make($_POST, [
          'login'                 => 'required|email',
          'password'              => 'required|min:3',
        ],[
           'required' => 'Le champ :attribute est obligatoire',
           'email' => "Le :attribute n'est pas un email",
           'min' => "Le :attribute doit avoir au minimun :min ",
   // etc
        ]);
      
        $validation->validate();
        if(!$validation->fails()){
             extract($_POST);
             $user= $this->userModel->findUserByLoginAndPassword($login,$password) ;
             if($user){
               //Garder dans la session utilisateur connecter
               //Authentification Stafull
               //Stocke un tableau ou donnee elementaire    
                  Session::set("user",Helper::toArray($user));
                  if(Autorisation::hasRole("Admin")){
                    $this->redirect("categorie"); 
                  }else{
                    $this->redirect("article"); 
                  }
                  
             }else{
                //Validator::addErrors("error-connexion","Login ou Mot de Passe Incorrect");
             }
           
        }
        $errors=$validation->errors();
       // dd(  $errors);
        Session::set("errors", $errors);
        $this->redirect("show-form-login");

       // 
    }

    public function logout()
    {
       Session::unset("user");
       Session::destroy();
       $this->redirect("show-form-login"); 
    }



    
    public function showRegisterForm()
    {
    }
    public function register()
    {

        
    }
    

    
    
}