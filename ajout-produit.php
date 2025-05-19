<?php
  require_once('classes/CRUD.php');
  $crud = new CRUD;
  $categories = $crud->select('categorie');
  $themes = $crud->select('produit_theme');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Site internet de vente de livre et jeux de société" />
    <meta
      name="keywords"
      content="jeux de société, livre"
    />
    <meta name="author" content="Ludrature" />
    <!-- <link rel="shortcut icon" href="logo.ico" type="image/x-icon" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <title>Ludrature : Boutique Jeux et Livre</title>
  </head>
  <body>
    <!-- navigation =================================================================================================-->
    <header class="entete">
      <a class="titre-logo" href="index.php">
        <img src="images/logo.svg" alt="Logo du restaurant Ludrature" />
        <h1><span class="titre-logo__titre-rouge">Lud</span>rature</h1></a
      >
      <form class="recherche" method="get">
        <div class="recherche-barre">
          <input
            name="recherche"
            type="text"
            id="recherche"
            placeholder="Trouver un produit"
          />
          <button type="submit">
              <span class="recherche-cache">trouver</span>
              <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
      <nav class="menu-principal">
          <div class="sousMenu">
            <a href="#">Jeux de société <span>&#9663;</span></>
            <div>
              <?php foreach ($themes as $theme)
              {
                if ($theme['categorie_id'] == 1)
                {
              ?>    
                  <a href="#"><?= $theme['nom'] ?></a>
              <?php    
                }
              }?>
            </div>
          </div>
          <div class="sousMenu">
            <a href="#">Livres <span>&#9663;</span></a>
            <div>
               <?php foreach ($themes as $theme)
              {
                if ($theme['categorie_id'] == 2)
                {
              ?>    
                  <a href="#"><?= $theme['nom'] ?></a>
              <?php    
                }
              }?>
            </div>
          </div>
      </nav>
    </header>
    <main>
      <form class="produit">
        <select name="categorie" id="categorie" placeholder="Veuillez choisir une catégorie">
            <?php 
              foreach ($categories as $categorie)
              {
            ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
            <?php
              }
            ?>
        </select>
        <lablel for="nom">Nom:</lablel>
        <input type="text" id="nom" name="nom"/>
        <lablel for="description">Description:</lablel>
        <textarea id="description" name="description"></textarea>
        <lablel for="auteur">Auteur:</lablel>
        <input type="text" id="auteur" name="auteur"/>
        <lablel for="edition">Edition:</lablel>
        <input type="text" id="edition" name="edition"/>
        <lablel for="prix">Prix:</lablel>
        <input type="number" id="prix" name="prix"/>
        <lablel for="age_min">Age minimum:</lablel>
        <input type="number" id="age_min" name="age_min"/>
        <lablel for="age_max">Age maximum:</lablel>
        <input type="number" id="age_max" name="age_max"/>
      </form>
    </main>
    <footer class="bas-page">
      <p>Tous droits réservés &copy; 2025 Ludrature : Restaurant Livre et Jouets</p>
    </footer>
  </body>
</html>