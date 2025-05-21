<?php
  require_once('classes/CRUD.php');
  $crud = new CRUD;
  require_once('variables-globales.php');
  $categorieSelection = isset($_GET['categorie'])?$_GET['categorie']:'';
  $themesSelection = isset($_GET['themes']) && is_array($_GET['themes']) ? $_GET['themes'] : [];

  // Construire query string themes[] pour GET
  $themesGET = '';
  if (!empty($themesSelection)) {
    foreach ($themesSelection as $theme) {
      $themesGET .= '&themes[]=' . urlencode($theme);
    }
  }
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
              <?php foreach ($themeJeux as $theme)
                    {
              ?>    
                        <a href="#"><?= $theme['nom'] ?></a>
              <?php    
                    }
              ?>
            </div>
          </div>
          <div class="sousMenu">
            <a href="#">Livres <span>&#9663;</span></a>
            <div>
              <?php foreach ($themeLivre as $theme)
                    {
              ?>    
                        <a href="#"><?= $theme['nom'] ?></a>
              <?php    
                    }
              ?>
            </div>
          </div>
      </nav>
    </header>
    <main class="contenu">
      <h2>Ajouter un produit</h2>
      <form class="form-produit" method="get" action="ajout-produit.php">
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie" onchange="this.form.submit()" required >
           <option class="placeholder" value="" disabled selected hidden>Choisissez une option</option>
           <?php 
              foreach ($categories as $categorie)
              {
            ?>
                <option value="<?= $categorie['id'] ?>" <?= (isset($_GET['categorie']) && $_GET['categorie'] == $categorie['id']) ? 'selected':''?>>
                <?= $categorie['nom'] ?></option>
            <?php
              }
            ?>
        </select>
      </form>
      <form class="form-produit" method="get">
          <label for="themes">Thèmes:</label>
          <select name="themes[]" id="themes" onchange="this.form.submit()" multiple required>
              <?php
                if(isset($categorieSelection)){
                  if($categorieSelection == 1){
                    foreach ($themeJeux as $theme)
                    {
              ?>
                        <option value="<?= $theme['id'] ?>" <?php if(is_array($themesSelection) && in_array($theme['id'], $themesSelection, false)){echo 'selected';}?>><?= $theme['nom'] ?></option>
              <?php
                    }
                  }else{
                    foreach ($themeLivre as $theme)
                    {
              ?>
                        <option value="<?= $theme['id'] ?>" <?php if(is_array($themesSelection) && in_array($theme['id'], $themesSelection, false)){echo 'selected';}?>><?= $theme['nom'] ?></option>
              <?php
                    }
                  }
                }
              ?>
          </select>
          <input type="hidden" name="categorie" value="<?= $categorieSelection ?>">
      </form>
      <form class="form-produit" method="post" action="produit-store.php?categorie=<?= $categorieSelection ?><?= $themesGET ?>">
          <label for="nom">Nom:</label>
          <input type="text" id="nom" name="nom" placeholder="Entrez le nom du produit"/>
          <label for="auteur">Auteur:</label>
          <input type="text" id="auteur" name="auteur" placeholder="Entrez le nom de l'auteur" required/>
          <label for="edition">Edition:</label>
          <input type="text" id="edition" name="edition" placeholder="Entrez le nom de l'édition" required/>
          <label for="date_sortie">Date de sortie:</label>
          <input type="date" id="date_sortie" name="date_sortie" placeholder="Entrez la date de sortie" required/>
          <label for="prix">Prix:</label>
          <input type="number" id="prix" name="prix" placeholder="Entrez le prix du produit" required/>
          <label for="age_min">Age minimum:</label>
          <input type="number" id="age_min" name="age_min" placeholder="Entrez l'age minimum" required/>
           <?php 
          if($categorieSelection == 1){
          ?>
          <label for="age_max">Age maximum:</label>
          <input type="number" id="age_max" name="age_max" placeholder="Entrez l'age maximum"/>
          <?php
          }
          ?>
          <button class="bouton" type="submit">Ajouter</button>
      </form>
    </main>
    <footer class="bas-page">
      <p>Tous droits réservés &copy; 2025 Ludrature : Restaurant Livre et Jouets</p>
    </footer>
  </body>
</html>