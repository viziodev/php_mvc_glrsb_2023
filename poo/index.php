<?php 
//Inclusion 
require_once "Personne.php";
require_once "Professeur.php";


//$persone=new Personne
$persone=new Personne();
//$persone-> ==> interface de l'objet
$persone->setId(1);
$persone->setNomComplet("Hawa");


$prof=new Professeur;
//$persone-> ==> interface de l'objet
$prof->setId(1);
$prof->setNomComplet("Bbw");
$prof->setGrade("Ingenieur");

$personnes=[$persone,$prof];

require_once "liste.html.php";