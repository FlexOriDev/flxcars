<!Doctype html>
<html lang="fr" class="no-js">
<head>

  <meta charset ="utf_8"><!--Encodage universel-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="../css/main.css" rel="stylesheet"><!--lien vers feuille de style avec le nom de celle-ci-->
  <link rel="shortcut icon" href="../../library/imgFioritures/logo_test.png"><!--favicon du site-->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-datepicker.css"/>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>




    <title>Flx Cars</title><!--Titre de la page web-->
  <?php
    include("../actions/user/login.php");
    ?>

    <script>
        <?php
            include("../scripts/checkboxSCRIPT.js");
        ?>
    </script>


    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea.history', // Sélecteur spécifique pour les textarea avec la classe "addFiche"
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
  
</head>

<!---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER--->
<!-- Navbar-->
<header class="header">

<div class="header-top-top" id="haut-haut">

</div>

<div class="header-top">

        
</div>

<div class="header-mid">
    
</div>

<div class="header-content">

<nav>
  <ul>
    <li class="deroulant"><a href="../pages/index.php">Accueil</a>
      <ul class="sous">
        <li><a href="index.php">Pourquoi Smoky Ghost ?</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="../pages/voitures.php">Voitures</a>
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
<!--
    <li class="deroulant"><a href="../pages/constructeurs.php">Constructeurs</a>
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


    <li class="deroulant"><a href="../pages/details.php">Détails</a>
      <ul class="sous">
        <li><a href="details.php">Types</a></li>
        <li><a href="details.php">Segments</a></li>
        <li><a href="details.php">Goupes</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="accueil.php">Qui sommes nous ?</a>
      <ul class="sous">
        <li><a href="accueil.php#article-1">Pourquoi Flx Cars ?</a></li>
        <li><a href="accueil.php#article-2">Quel est le but ?</a></li>
        <li><a href="accueil.php#article-3">Comment ça fonctionne ?</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="accueil.php">Nous contacter</a></li>
-->
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
            <li class="deroulant"><a href="login.php">Connexion</a></li>
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