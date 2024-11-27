<?php
require './vendor/autoload.php';
 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once './class/Bdd.php';
require_once './class/Categorie.php';
 
$bdd = new Bdd();

$sql = 'SELECT * FROM categorie';
$resultat = $bdd->prepareExecute($sql);

// conversion en tableau PHP du PDOStatement :
$categories = $resultat->fetchAll(PDO::FETCH_CLASS, 'Categorie');
// On parcours le tableau PHP :
foreach ($categories as $une_categorie) {
  echo $une_categorie;
}