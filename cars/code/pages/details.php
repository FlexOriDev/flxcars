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
<div class="pathButtons">
  <a href="index.php" class="boutonPath">Accueil</a>
  <a class="boutonPathActual">/Détails</a>
</div>
<!----------PATH---------->

<!---------------------------------------------MAIN----------------------------------------------------->

<main>

<!-------------------------CONTENT--------------------------->

<!-----------------------PARTIE FORMS------------------------>


<!-----------------------AFFICHAGE VOITURES------------------------>
<?php 
include("../actions/actionsType/allTypes.php");
?>
<div class="row" id="colonne">

  <?php if(isset($error)){ echo '<p>'.$error.'</p>'; } ?>
  <?php 
    
      while($ficheType = $getAllTypes->fetch()){

  ?>

  <div class="column">
    <a href="type.php?id_type=<?= $ficheType['id']; ?>"><input type=image class="voitures" src=../../library/imgGroupes/<?= $ficheType['image']; ?> /></a>
    <div class="text">
      <p class="nomWidgetFiche">  <?= $ficheType['nom']; ?> </p>
    </div> 
  </div>

  <?php
    }
  ?>

</div> 

</main>

<?php require '../includesHeaderFooter/footer.php' ; ?>