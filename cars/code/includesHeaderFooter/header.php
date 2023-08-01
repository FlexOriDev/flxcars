<!Doctype html>
<html lang="fr" class="no-js">
<head>

  <meta charset ="utf_8"><!--Encodage universel-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="../css/main.css" rel="stylesheet"><!--lien vers feuille de style avec le nom de celle-ci-->
  <link rel="shortcut icon" href="../../library/imgFioritures/logo_test.png"><!--favicon du site-->
  <title>Flx Cars</title><!--Titre de la page web-->
  <?php
    include("../actions/user/login.php");
    ?>

    <script>
        <?php
            include("../scripts/checkboxSCRIPT.js");
        ?>
    </script> 
  
</head>

<!---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER--->
<!-- Navbar-->
<header class="header">

<div class="header-top-top" id="haut-haut">
    <div class="box">
        
            <form method="GET">
                <input class="textSearch" type="text" name="id_modele" placeholder="Ecrire ici...">
                <input class="submit" type="submit" name="submit" value="Search">
            </form>
    </div>
</div>

<div class="header-top">
        
        <img class="logo" src="../../library/img2/logo.png" href="#">
        
</div>

<div class="header-mid">
    
</div>

<div class="header-content">

<nav>
  <ul>
    <li class="deroulant"><a href="../pages/index.php">Accueil &ensp;</a>
      <ul class="sous">
        <li><a href="index.php">Pourquoi Smoky Ghost ?</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="../pages/voitures.php">Voitures &ensp;</a>
      <ul class="sous">
      <?php 
    $getAllTypes = $bdd->query('SELECT * FROM types ORDER BY nom');
    $getAllTypes->execute(array());
      foreach($getAllTypes as $type ){
                  
                  ?>
        <li><a href="voitures.php?id_type=<?= $type['id']; ?>"><?= $type['nom']; ?></a></li>
                  <?php
              }
    ?>
 
      </ul>
    </li>

    <li class="deroulant"><a href="../pages/constructeurs.php">Constructeurs &ensp;</a>
      <ul class="sous">
      <?php 
    $getAllConstructeurs = $bdd->query('SELECT * FROM constructeurs ORDER BY nom');
    $getAllConstructeurs->execute(array());
      foreach($getAllConstructeurs as $constructeur ){
                  
                  ?>
        <li><a href="constructeurs.php?id_constructeur=<?= $constructeur['id']; ?>"><?= $constructeur['nom']; ?></a></li>
                  <?php
              }
    ?>
 
      </ul>
    </li>

    <li class="deroulant"><a href="../pages/details.php">Détails &ensp;</a>
      <ul class="sous">
        <li><a href="details.php">Types</a></li>
        <li><a href="details.php">Segments</a></li>
        <li><a href="details.php">Goupes</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="accueil.php">Qui sommes nous ? &ensp;</a>
      <ul class="sous">
        <li><a href="accueil.php#article-1">Pourquoi Flx Cars ?</a></li>
        <li><a href="accueil.php#article-2">Quel est le but ?</a></li>
        <li><a href="accueil.php#article-3">Comment ça fonctionne ?</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="accueil.php">Nous contacter &ensp;</a></li>

    <?php 
          if(isset($_SESSION['auth'])){
            ?>
            <li class="deroulant"><a href="moncompte.php?id=<?= $_SESSION['id']; ?>">Mon profil &ensp;</a>
                <ul class="sous">
                    <li><a href="../pages/dashboard.php">Dashboard</a></li>
                    <li><a href="../pages/ajouteFiche.php">Ajouter un fiche</a></li>
                    <li><a href="../actions/user/logout.php">Deconnexion</a></li>
                </ul>
            </li>
            <?php
          }
        ?>
		<?php 
          if(!isset($_SESSION['auth'])){
            ?>
            <li class="deroulant"><a href="login.php">Connexion &ensp;</a></li>
            <?php
          }
        ?>
    
  </ul>
</nav>

<div class="header-bot">
        
</div>

</header>

    <!---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER--->
    <body>