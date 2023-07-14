<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Voitures</title><!--Titre de la page web-->
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->

<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');

?>

<!---------------------------------------------MAIN----------------------------------------------------->

<main>

<!-------------------------CONTENT--------------------------->



<!-----------------------PARTIE FORMS------------------------>



<div class="rowPreferences" id="colonnePreferences">

  <div class="columnPreferences">

<!-------------CONSTRUCTEURS------------->

<form method="post" id="make_checkbox_select_constructeurs">

<select name="Constructeurs" multiple="multiple" id="current_select">
      <?php 
			$getAllConstructeurs = $bdd->query('SELECT * FROM constructeurs ORDER BY nom');
			$getAllConstructeurs->execute(array());
				foreach($getAllConstructeurs as $constructeur ){
                    ?>
					<option value=<?= $constructeur['id']; ?> name=<?= $constructeur['nom']; ?> ><?= $constructeur['nom']; ?></option>
                    <?php
                }
    	?>
      
  </select>
  <input type="submit" class="sub-drop1"/>
</form>

  <!--On envoie le script personalisé pour cette checkbox = MARQUES-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <?php
    include("../scripts/checkboxConstructeurs.php");
  ?>
  
  </div>

  <div class="columnPreferences">
    <!-------------TYPES------------->

<form id="make_checkbox_select_types">

<select name="Types">
    <?php 
    $getAllTypes = $bdd->query('SELECT * FROM types ORDER BY nom');
    $getAllTypes->execute(array());
      foreach($getAllTypes as $type ){
                  
                  ?>
        <option value=<?= $type['id']; ?> name=<?= $type['nom']; ?> ><?= $type['nom']; ?></option>
                  <?php
              }
    ?>
    
</select>
<input type="submit" class="sub-drop1"/>
</form>

<!--On envoie le script personalisé pour cette checkbox = FORMES-->

<?php
  include("../scripts/checkboxTypes.php");
?>	

  </div>


  <div class="columnPreferences">
    <!-------------MODELES------------->

<form id="make_checkbox_select_modeles">

<select name="Modèles">
    <?php 
   
      $getAllModeles = $bdd->query('SELECT * FROM modeles ORDER BY nom');
      $getAllModeles->execute(array());
    
    
      foreach($getAllModeles as $modele ){
                  
                  ?>
        <option value=<?= $modele['id']; ?> name=<?= $modele['nom']; ?> ><?= $modele['nom']; ?></option>
                  <?php
      }
    ?>
    
</select>
<input type="submit" class="sub-drop1"/>
</form>

<!--On envoie le script personalisé pour cette checkbox = FORMES-->

<?php
  include("../scripts/checkboxModeles.php");
?>	
  </div>

  <div class="columnPreferences">
    <!-------------ANNEE------------->

<form id="make_checkbox_select_year">

<select name="Année">
    <?php 
    $getAllAnnees = $bdd->query('SELECT * FROM annees ORDER BY nom DESC');
    $getAllAnnees->execute(array());
      foreach($getAllAnnees as $annee ){
                  
                  ?>
        <option value=<?= $annee['id']; ?> name=<?= $annee['nom']; ?>><?= $annee['nom']; ?></option>
                  <?php
              }
    ?>
    
</select>
<input type="submit" class="sub-drop1" name="validateFormes"/>
</form>

<!--On envoie le script personalisé pour cette checkbox = FORMES-->

  
<?php
  include("../scripts/checkboxAnnee.php");
?>	

  </div>

</div> 







<!-----------------------AFFICHAGE VOITURES------------------------>
<?php 
include("../actions/actionsVoiture/allFiches.php");
?>
<div class="row" id="colonne">

  <?php if(isset($error)){ echo '<p>'.$error.'</p>'; } ?>
  <?php 
    
      while($fiche = $getAllFiches->fetch()){
  ?>

  <div class="column">
    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image class="voitures" src=../../library/img/<?= $fiche['image']; ?> /></a>
    <div class="text">
      <p><?= $fiche['nom']; ?></p>
    </div> 
  </div>

  <?php
    }
  ?>

</div> 

</main>