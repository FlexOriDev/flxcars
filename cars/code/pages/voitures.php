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

<!----------PATH---------->
<div class="pathButtons">
        <a href="index.php" class="boutonPath">Accueil</a>
        <a class="boutonPathActual">/Voitures</a>
</div>
<!----------PATH---------->

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
      if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur'])){
          $getAllModeles = $bdd->query('SELECT * FROM modeles ORDER BY nom');
          $getAllModeles->execute(array());
          foreach($getAllModeles as $modele ){   
                      ?>
            <option value=<?= $modele['id']; ?> name=<?= $modele['nom']; ?> ><?= $modele['nom']; ?></option>
                      <?php
          }
      }else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur'])){
        $ids_constructeur = explode(",", $_GET['id_constructeur']);
        foreach($ids_constructeur as $id) {
          $getAllModeles = $bdd->prepare('SELECT * FROM modeles WHERE id_constructeur=? ORDER BY nom');
          $getAllModeles->execute(array($id));
          foreach($getAllModeles as $modele) {
            ?>
            <option value=<?= $modele['id']; ?> name=<?= $modele['nom']; ?> ><?= $modele['nom']; ?></option>
                      <?php
          }
        }
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

  <div class="columnPreferences">
    <!-------------SEGMENT------------->

<form id="make_checkbox_select_segments">

<select name="Segment">
    <?php 
    $getAllSegments = $bdd->query('SELECT * FROM segments ORDER BY nom');
    $getAllSegments->execute(array());
      foreach($getAllSegments as $segment ){
                  
                  ?>
        <option value=<?= $segment['id']; ?> name=<?= $segment['nom']; ?>><?= $segment['nom']; ?></option>
                  <?php
              }
    ?>
    
</select>
<input type="submit" class="sub-drop1" name="validateFormes"/>
</form>

<!--On envoie le script personalisé pour cette checkbox = FORMES-->

  
<?php
  include("../scripts/checkboxSegments.php");
?>	

  </div>

</div> 


<!-----------------------AFFICHAGE VOITURES------------------------>
<div class="row" id="colonne">
<?php 
include("../actions/actionsVoiture/allFiches.php");
?>


  <?php if(isset($error)){ echo '<p class="errorCarNotFind">'.$error.'</p>'; } ?>
  <?php 
    
      while($fiche = $getAllFiches->fetch()){
        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
        $getConstructeur->execute(array($fiche['id_constructeur']));
        $constructeur = $getConstructeur->fetch();

        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
        $getAnnee->execute(array($fiche['id_annee']));
        $annee = $getAnnee->fetch();

        $getModele = $bdd->prepare('SELECT nom FROM modeles WHERE id=?');
        $getModele->execute(array($fiche['id_modele']));
        $modele = $getModele->fetch();
        $stringImageFiche = $modele[0]."/".$fiche['id']."/".$fiche['image'];
  ?>

  <div class="column">
    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image class="voitures" src=../../library/voitures/<?= $stringImageFiche; ?> /></a>
    <div class="text">
      <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
    </div> 
  </div>

  <?php
    }
  ?>

</div> 


</main>

<?php require '../includesHeaderFooter/footer.php' ; ?>