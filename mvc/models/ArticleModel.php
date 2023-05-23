<?php 
class ArticleModel extends Model{
 protected int $id;
 protected string $libelle;
 protected float $prixAchat;
 protected int $qteStock;
 protected string $type="article";
 protected int $categorieID;


 public function __construct()
 {
     parent::__construct();
     $this->table="article";
 }
 /**
  * Get the value of libelle
  */ 
 public function getLibelle()
 {
     return $this->libelle;
 }

 /**
  * Set the value of libelle
  *
  * @return  self
  */ 
 public function setLibelle($libelle)
 {
     $this->libelle = $libelle;

     return $this;
 }

 /**
  * Get the value of id
  */ 
 public function getId()
 {
     return $this->id;
 }

 /**
  * Set the value of id
  *
  * @return  self
  */ 
 public function setId($id)
 {
     $this->id = $id;

     return $this;
 }

 /**
  * Get the value of prixAchat
  */ 
 public function getPrixAchat()
 {
  return $this->prixAchat;
 }

 /**
  * Set the value of prixAchat
  *
  * @return  self
  */ 
 public function setPrixAchat($prixAchat)
 {
  $this->prixAchat = $prixAchat;

  return $this;
 }

 /**
  * Get the value of qteStock
  */ 
 public function getQteStock()
 {
  return $this->qteStock;
 }

 /**
  * Set the value of qteStock
  *
  * @return  self
  */ 
 public function setQteStock($qteStock)
 {
  $this->qteStock = $qteStock;

  return $this;
 }

 /**
  * Get the value of type
  */ 
 public function getType()
 {
  return $this->type;
 }

 /**
  * Set the value of type
  *
  * @return  self
  */ 
 public function setType($type)
 {
  $this->type = $type;

  return $this;
 }

 

 //$this->table
public function insert():int{
   //$sql="select * from categorie where id=$id" ;Jamais
   $sql="INSERT INTO $this->table values (NULL, :libelle, :prixAchat, :qteStock, :type, :dateProd, :fournisseur, :categorieID) ";//Requete preparee
   //prepare ==> requete avec parametres
   $stm= $this->pdo->prepare($sql);
   $stm->execute(["libelle"=>$this->libelle,
                  "prixAchat"=> $this->prixAchat,
                  "qteStock"=>$this->qteStock,
                  "type" => $this->type,
                  "dateProd"=>NULL,
                  "fournisseur"=>NULL,
                  "categorieID"=>$this->categorieID
       ]);
   return  $stm->rowCount() ;
}



 /**
  * Get the value of categorieID
  */ 
 public function getCategorieID()
 {
  return $this->categorieID;
 }

 /**
  * Set the value of categorieID
  *
  * @return  self
  */ 
 public function setCategorieID($categorieID)
 {
  $this->categorieID = $categorieID;

  return $this;
 }
}