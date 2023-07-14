<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Constructeurs</title><!--Titre de la page web-->
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->

<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');

?>

<!---------------------------------------------MAIN----------------------------------------------------->

<main>

<!-------------------------CONTENT--------------------------->

<article id="article-1">
        <h1>Constructeurs</h1>
</article>

<!-----------------------PARTIE FORMS------------------------>



<div class="rowPreferences" id="colonnePreferences">

  <div class="columnPreferences">

<!-------------PAYS------------->

<form id="make_checkbox_select_pays">

<select name="Pays" multiple="multiple" id="current_select">
      <?php 
			$getAllPays = $bdd->query('SELECT * FROM pays ORDER BY nom');
			$getAllPays->execute(array());
				foreach($getAllPays as $pays ){
                    ?>
					<option value=<?= $pays['id']; ?> name=<?= $pays['nom']; ?> ><?= $pays['nom']; ?></option>
                    <?php
                }
    	?>
      
  </select>
  <input type="submit" class="sub-drop1"/>
</form>

  <!--On envoie le script personalisé pour cette checkbox = MARQUES-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <?php
    include("../scripts/checkboxPays.php");
  ?>
  
  </div>

  <div class="columnPreferences">
    <!-------------GROUPES------------->

<form id="make_checkbox_select_groupes">

<select name="Groupes">
    <?php 
    $getAllGroupes = $bdd->query('SELECT * FROM groupes ORDER BY nom');
    $getAllGroupes->execute(array());
      foreach($getAllGroupes as $groupe ){
                  
                  ?>
        <option value=<?= $groupe['id']; ?> name=<?= $groupe['nom']; ?> ><?= $groupe['nom']; ?></option>
                  <?php
              }
    ?>
    
</select>
<input type="submit" class="sub-drop1"/>
</form>

<!--On envoie le script personalisé pour cette checkbox = FORMES-->

<?php
  include("../scripts/checkboxGroupes.php");
?>	

  </div>

</div> 







<!-----------------------AFFICHAGE VOITURES------------------------>

</main>