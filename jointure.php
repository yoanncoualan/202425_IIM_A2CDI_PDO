<?php

require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
require_once './class/Bdd.php';
require_once './class/Categorie.php';
require_once './class/Produit.php'; // Import de Produit
 
$bdd = new Bdd();
 
// Requête avec jointure
$sql = 'SELECT p.id AS p_id, p.nom AS p_nom, p.description AS p_description, 
c.id AS c_id, c.nom AS c_nom, c.description AS c_description 
FROM produit p 
INNER JOIN categorie c ON p.categorie_id = c.id';
$resultat = $bdd->prepareExecute($sql);
 
$produits = $resultat->fetchAll(PDO::FETCH_OBJ);
 
// Création d'un tableau vide que l'on va remplir dans le foreach
$produits_as_obj = [];
// Parcours du résultat de la requête
foreach ($produits as $un_produit) {
  // Création de l'objet Categorie et hydratation
  $categorie = new Categorie();
  $categorie->setNom($un_produit->c_nom)
    ->setDescription($un_produit->c_description);
  
  // Création de l'objet Produit et hydratation
  $produit = new Produit();
  $produit->setNom($un_produit->p_nom)
    ->setDescription($un_produit->p_description)
    ->setCategorie($categorie);
 
  // Sauvegarde dans le tableau du produit en cours
  $produits_as_obj[] = $produit;
}
 
foreach ($produits_as_obj as $produit) {
  echo '<h2>'. $produit->getNom() .'</h2>';
  echo '<p>Catégorie : '. $produit->getCategorie()->getNom() .'</p>';
}