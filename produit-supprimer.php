<?php

$id = $_POST['id'];
require_once('classes/CRUD.php');

$crud = new CRUD;

$delete = $crud->delete('produit', $id);

if($delete){
    ($delete=$crud->delete('produit-theme',$id,'produit_id'));
    if($delete){
        header('location:index.php');
    }else{
    echo "Error";
    }
}else{
    echo "Error";
    }    


?>