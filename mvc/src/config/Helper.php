<?php 
namespace App\Core; 
class Helper{
   
     public static function errorField(array $error,$field){
        if(array_key_exists($field,$error)) echo"is-invalid"  ; 
    }
    public static function errorMessage(array $error,$field){
      if(array_key_exists($field,$error)) echo "invalid-feedback"; 
    }


    public static function toArray(object $data):array{
      //objet ==>tableau  //Erreur
      //objet ==>Json ==>   tableau 
      //  json_encode(array|object)  ==> json
      //  json_decode(Json,true) ==> Tableau   
          $json=json_encode($data);
          return  json_decode($json,true);
    }

    public static function toObject(array $data){
      //tableau ==>Object  //Erreur
      //tableau ==>Json ==>   object 
      //  json_encode(array|object)  ==> json
      //  json_decode(Json,False) ==> Object 
          $json=json_encode($data);
          return  json_decode($json,false);
    }

    public static function redirect(string $path){
      header("location:".BASE_URL."?page=$path");
      exit(); 
 }
//Toutes les classes de PHP se trouvent dans  
//un namespace racine ==>\
  public static function dateToFr(string $dateEn):string{
    $date = new \DateTimeImmutable($dateEn);
    //$date=  DateTimeImmutable::createFromFormat("Y-m-d",$dateEn);
    return $date->format('d-m-Y');
  }

  public static function dateToEn(string $dateFr):string{
      $date=  \DateTimeImmutable::createFromFormat("d-m-Y",$dateFr);
      return  $date->format('Y-m-d') ;
  }
 
    
}