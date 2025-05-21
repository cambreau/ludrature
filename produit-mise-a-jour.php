<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: index.php');
    exit;
}

require_once('classes/CRUD.php');
$crud = new CRUD;

// Récupération de l'id du produit à mettre à jour
$id = $_POST['id'];

// Mettre age_max à null si non défini
if (!isset($_POST['age_max'])) {
    $_POST['age_max'] = null;
}

$update = $crud->update('produit', $_POST);

if($update){
    header('location:index.php');
}else{
    echo "error";
}

?>