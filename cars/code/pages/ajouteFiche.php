<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');
require('../actions/fiche/ajouteFiche.php'); 
?>

<main>

<article id="article-1">
        <h1>Ajouter une fiche</h1>
      
</article>

<!-- debut de la partie contenu -->
<div class="main">
<div class="register">

<form method="POST" ENCTYPE="multipart/form-data"> 

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
<br>
<div class="register-top-grid">

<h3>Publier une fiche</h3>
<br>
<div>
<span>Nom <label> :</label></span>
<input class="addFiche" type="text" name="nom"> 
</div>
<br>
<div>
<span>Résumé <label> :</label></span>
<input class="addFiche" type="text" name="resume"> 
</div>
<br>
<div>
<span>Description <label> :</label></span>
<input class="addFiche" type="text" name="description"> 
</div>
<br>
<div>
<span>Motorisation <label> :</label></span>
<input class="addFiche" type="text" name="motorisation"> 
</div>
<br>
<div>
<span>Image 1<label> :</label></span>
<input type="file" name="fichier_1" id="fichier_1" />
</div>
<div>
<span>Image 2<label> :</label></span>
<input type="file" name="fichier_2" id="fichier_2" />
</div>
<div>
<span>Image 3<label> :</label></span>
<input type="file" name="fichier_3" id="fichier_3" />
</div>
<div>
<span>Image 4<label> :</label></span>
<input type="file" name="fichier_4" id="fichier_4" />
</div>
<div>
<span>Image 5<label> :</label></span>
<input type="file" name="fichier_5" id="fichier_5" />
</div>
<br>


<div class="drp">

<select class="custom-select" id="select-5" name="id_constructeur">
<option value="">Constructeur</option>
<?php 
$getAllConstructeurs = $bdd->query('SELECT * FROM constructeurs ORDER BY nom');
$getAllConstructeurs->execute(array());
foreach($getAllConstructeurs as $constructeur ){
	
	?>
	<option value=<?= $constructeur['id']; ?>><?= $constructeur['nom']; ?></option>
	<?php
}
?>
</select>

</div>
<br>
<div class="drp">

<select class="custom-select" id="select-5" name="id_type">
<option value="">Type</option>
<?php 
$getAllTypes = $bdd->query('SELECT * FROM types ORDER BY nom');
$getAllTypes->execute(array());
foreach($getAllTypes as $type ){
	
	?>
	<option value=<?= $type['id']; ?>><?= $type['nom']; ?></option>
	<?php
}
?>
</select>

</div>
<br>
<div class="drp">

<select class="custom-select" id="select-5" name="id_modele">
<option value="">Modèle</option>
<?php 
$getAllModeles = $bdd->query('SELECT * FROM modeles ORDER BY nom');
$getAllModeles->execute(array());
foreach($getAllModeles as $modele ){
	
	?>
	<option value=<?= $modele['id']; ?>><?= $modele['nom']; ?></option>
	<?php
}
?>
</select>

</div>
<br>
<div class="drp">

<select class="custom-select" id="select-5" name="id_annee">
<option value="">Année</option>
<?php 
$getAllAnnees = $bdd->query('SELECT * FROM annees ORDER BY nom');
$getAllAnnees->execute(array());
foreach($getAllAnnees as $annee ){
	
	?>
	<option value=<?= $annee['id']; ?>><?= $annee['nom']; ?></option>
	<?php
}
?>
</select>

</div>

<br>
<div class="drp">

<select class="custom-select" id="select-5" name="id_segment">
<option value="">Segment</option>
<?php 
$getAllSegment = $bdd->query('SELECT * FROM segments ORDER BY nom');
$getAllSegment->execute(array());
foreach($getAllSegment as $segment ){
	
	?>
	<option value=<?= $segment['id']; ?>><?= $segment['nom']; ?></option>
	<?php
}
?>
</select>

</div>
<br>
<div class="clear"> </div>
<div class="register-but">

<input type="submit" value="Publier" name="validate">
<div class="clear"> </div>

</div>
</form>
</div>
<br>
<div class="clear"></div>

</div><!-- fin de la partie contenu -->

<?php

?>

</main>