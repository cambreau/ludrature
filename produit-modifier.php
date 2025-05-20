<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('classes/CRUD.php');
    $id = $_GET['id'];
    $crud = new CRUD;
    $selectId = $crud->selectId('produit', $id);
    if($selectId){
        //La fonction extract() convertit les clés d’un tableau associatif en variables avec les mêmes noms.
        extract($selectId);
        //On récupère les thèmes du produit
        $themesId = $crud->selectWhere('produit_theme', $id, 'produit_id');
        $themesProduit = [];
        foreach($themesId as $themeId){
            $theme = $crud->selectId('theme', $themeId['theme_id']);
            array_push($themesProduit, $theme);
        }
        //On récupère la catégorie du produit
        require_once('variables-globales.php');
        $themeJeuxIds = array_column($themeJeux, 'id'); 
        $categorieProduit = in_array($themesId[0],$themeJeuxIds)? "Jeu" :"Livre";
        print_r($themesProduit);

    }else{

        header('location:index.php');
    }
}else{
    header('location:index.php');
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
    <main>
      <h2>Modifier le produit numéro <?=$id . " - " . $nom ?> </h2>
       <div class="non-modifiable">
        <p class="label-non-modifiable">Catégorie:</p>
        <p class="input-non-modifiable"><?=$categorieProduit?></p>
      </div>
      <div class="non-modifiable">
        <p class="label-non-modifiable">Thème:</p>
        <?php
          foreach($themesProduit as $theme){
        ?>
            <p class="input-non-modifiable"><?=$theme['nom']?></p>
        <?php
          }
        ?>
      </div>
      <form class="form-produit" method="post" action="produit-mise-a-jour.php">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?=$nom?>" required/>
        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur" value="<?=$auteur?>" required/>
        <label for="edition">Edition:</label>
        <input type="text" id="edition" name="edition" value="<?=$edition?>"required/>
        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" value="<?=$prix?>" required/>
        <label for="age_min">Age minimum:</label>
        <input type="number" id="age_min" name="age_min" value="<?=$age_min?>" required/>
        <?php 
        if($categorieProduit === 1){
        ?>
          <label for="age_max">Age maximum:</label>
          <input type="number" id="age_max" name="age_max" value="<?=$age_max?>"/>
        <?php
        }
        ?>
        <button class="bouton" type="submit">Modifier</button>
      </form>
    </main>
    <footer class="bas-page">
      <p>Tous droits réservés &copy; 2025 Ludrature : Restaurant Livre et Jouets</p>
    </footer>
  </body>
</html>