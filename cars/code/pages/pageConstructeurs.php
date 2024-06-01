<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Constructeurs</title><!--Titre de la page web-->
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->

<?php 
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
?>

<!----------PATH---------->
<div class="global-pathButtons">
  <a href="pageIndex.php" class="global-boutonPath">Accueil</a>
  <a class="global-boutonPathActual">/Constructeurs</a>
</div>
<!----------PATH---------->

<!---------------------------------------------MAIN----------------------------------------------------->

<main>

<!-------------------------CONTENT--------------------------->

<!-----------------------PARTIE FORMS------------------------>



<div class="rowPreferences" id="colonnePreferences">

<div class="columnPreferences">

<!-------------CONSTRUCTEURS------------->

<form method="post" id="make_checkbox_select_constructeurs2">

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
    include("../scripts/checkboxConstructeurs2.php");
  ?>
  
  </div>

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
<?php 
include("../actions/actionsConstructeur/actionGetAllConstructeurs.php");
?>
<div class="row" id="colonne">

  <?php if(isset($error)){ echo '<p>'.$error.'</p>'; } ?>
  <?php 
    
      while($ficheConstructeur = $getAllConstructeurs->fetch()){
        $getPays = $bdd->prepare('SELECT nom FROM pays WHERE id=?');
        $getPays->execute(array($ficheConstructeur['id_pays']));
        $pays = $getPays->fetch();

        $getGroupe = $bdd->prepare('SELECT nom FROM groupes WHERE id=?');
        $getGroupe->execute(array($ficheConstructeur['id_groupe']));
        $groupe = $getGroupe->fetch();
        if(empty($groupe)){
          $groupe="";
        }else{
          $groupe = $groupe['nom'];
        };
  ?>

  <div class="column">
    <a href="pageVoitures.php?id_constructeur=<?= $ficheConstructeur['id']; ?>"><input type=image class="voitures" src=../../library/imgConstructeurs/<?= $ficheConstructeur['image']; ?> /></a>
    <div class="text">
      <p class="nomWidgetFiche">  <?= $ficheConstructeur['nom']; ?> </p>
    </div> 
  </div>

  <?php
    }
  ?>

</div> 

</main>

<?php require '../includesHeaderFooter/includeFooter.php'; ?>