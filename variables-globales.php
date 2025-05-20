<?php
// Connexion
require_once('classes/CRUD.php');
$crud = new CRUD;
//Categorie livre et ses thèmes
$themeLivre = $crud->selectWhere('theme', 2, 'categorie_id');
//Categorie jeux et ses thèmes
$themeJeux = $crud->selectWhere('theme', 1, 'categorie_id');
//Categories
$categories = $crud->select('categorie');
?>