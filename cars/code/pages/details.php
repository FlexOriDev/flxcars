<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Détails</title><!--Titre de la page web-->
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->

<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');
?>

<!----------PATH---------->
<div class="global-pathButtons">
  <a href="index.php" class="global-boutonPath">Accueil</a>
  <a class="global-boutonPathActual">/Détails</a>
</div>
<!----------PATH---------->

<!---------------------------------------------MAIN----------------------------------------------------->

<main>

<!-------------------------CONTENT--------------------------->

<!-----------------------PARTIE FORMS------------------------>


<!-----------------------AFFICHAGE VOITURES------------------------>
<?php 
include("../actions/actionsSegment/allSegments.php");
?>
<div class="row" id="colonne">

  <?php if(isset($error)){ echo '<p>'.$error.'</p>'; } ?>
  <?php 
    
      while($ficheSegment = $getAllSegments->fetch()){

  ?>

  <div class="column">
    <a href="type.php?id_type=<?= $ficheSegment['id']; ?>"><input type=image class="voitures" src=../../library/models_cars/<?= $ficheSegment['image']; ?> /></a>
    <div class="text">
      <p class="nomWidgetFiche">  <?= $ficheSegment['nom']; ?> </p>
    </div> 
  </div>

  <?php
    }
  ?>

</div> 

</main>

<?php require '../includesHeaderFooter/footer.php' ; ?>