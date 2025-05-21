<?php

$id = $_POST['id'];
require_once('classes/CRUD.php');

$crud = new CRUD;

// Suppression des lignes dans la table produit_theme
$deleteThemes = $crud->delete('produit_theme', $id, 'produit_id');

// Supression du produit dans la table produit
$deleteProduit = $crud->delete('produit', $id);

// Si la suppression a réussi, rediriger vers la page d'accueil
// Sinon, afficher un message d'erreur
if($deleteThemes && $deleteProduit){
    header('location:index.php');
}else{
    echo "Error: La suppression a échoué.";
}    

?>