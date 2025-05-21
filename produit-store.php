<?php
require_once('classes/CRUD.php');
$crud = new CRUD;

//Ajout dans la table produit
$insertProduit = $crud->insert('produit', $_POST);



//Ajout dans la table produit_theme
$themes=$_GET['themes'];

foreach ($themes as $theme) {
    $insert=$crud->insert('produit_theme', array('produit_id' => $insertProduit, 'theme_id' => $theme));
    if (!$insert) {
        echo "error";
    } 
}

header('location:fiche-produit.php?id='.$insertProduit);

?>