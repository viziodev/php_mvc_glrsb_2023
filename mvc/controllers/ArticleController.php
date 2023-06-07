<?php 
require_once './../models/ArticleModel.php';
require_once './../models/ArticleVenteModel.php';
require_once './../models/ArticleConfModel.php';

require_once './../models/CategorieModel.php';

class ArticleController extends Controller{
 
      private ArticleModel  $articleVenteModel;
      private ArticleConfModel  $articleConfModel;
      private  CategorieModel   $categorieModel;
      private  ArticleModel   $articleModel;
      
     
      public function __construct()
      {
        parent::__construct();
        $this->articleVenteModel=new ArticleVenteModel;
        $this->articleConfModel=new ArticleConfModel;
        $this->articleModel=new articleModel;
        $this->categorieModel=new CategorieModel;
        
      }
        public function index(){
           $articlesV=$this->articleVenteModel->findAll();
           $articlesC=$this->articleConfModel->findAll();
           $articles=array_merge($articlesV,$articlesC);
           $this->renderView("article/liste.html.php",[
              "articles"=>$articles
           ]);
        
        }

        public function  showFormArticle(){
          $categories=$this->categorieModel->findAll();
          $types= $this->articleModel->findTypeArticles();
          $this->renderView("article/form.html.php",[
            "categories"=> $categories,
            "types"=> $types,
          ]);
        }
}