<?php
  require_once('classes/CRUD.php');
  $crud = new CRUD;
  $produits = $crud->select('produit');

  require_once('variables-globales.php');
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
    <main>
      <section>
        <h2>Profil administrateur</h2>
        <p>Bienvenue dans votre profil administrateur</p>
        <a href="ajout-produit.php" class="bouton">Ajouter un produit</a>
      </section>
      <section class="section-produits">
        <h2 class="section-produits__titre">Nos produits</h2>
        <div class="produits-conteneur">
            <?php 
              
              foreach ($produits as $produit)
              {
            ?>    
                <a class="produit produit-lien" href="fiche-produit.php?id=<?= $produit["id"]?>">
                  <picture class="produit-image">
                    <img src="<?= "images/produit-" . $produit["id"] . ".jpg"?>" alt="<?= $produit["nom"]?>" />
                  </picture>
                  <h3><?= $produit["nom"]?></h3>
                  <div class="produit-description">
                    <p><?= $produit["auteur"]?></p>
                    <p>Edition: <?= $produit["edition"]?></p>
                    <p>Prix: <?= $produit["prix"]?> $</p>
                    <p>Age: <?= $produit["age_min"]?>
                    <?php
                    if ($produit["age_max"] != null)
                    {
                    ?>    
                        <?= " - ".$produit["age_max"]?> ans</p>
                    <?php
                    }
                    ?>    
                  </div>    
                </a>
            <?php    
              }
            ?>
        </div>
      </section>
    </main>
    <footer class="bas-page">
      <p>Tous droits réservés &copy; 2025 Ludrature : Restaurant Livre et Jouets</p>
    </footer>
  </body>
</html>