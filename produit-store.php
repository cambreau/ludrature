<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: index.php');
    exit;
}


require_once('classes/CRUD.php');

$crud = new CRUD;

$insert = $crud->insert('produit', $_POST);

header('location:fiche-produit.php?id='.$insert);

?>