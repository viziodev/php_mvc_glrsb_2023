<?php 
require_once './../models/UserModel.php';
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
        Validator::isEmail($_POST['login'],'login');
        Validator::isVide($_POST['password'],'password');
        if(Validator::validate()){
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
                Validator::addErrors("error-connexion","Login ou Mot de Passe Incorrect");
             }
           
        }
        
        Session::set("errors",Validator::getErrors());
        $this->redirect("show-form-login");

       // 
    }

    public function logout()
    {
       Session::unset("user");
       Session::unset("details");
       Session::unset("total");
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