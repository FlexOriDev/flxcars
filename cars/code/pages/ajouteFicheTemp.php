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

<!-- EDITABLE TABLE -->

<div class="table-responsive">
                                <br>
                                <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                                <div id="alert_message"></div>
                                <table id="user_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Appellation</th>
                                            <th>Construction</th>
                                            <th>Moteur</th>
                                            <th>Cylindrée</th>
                                            <th>Performance</th>
                                            <th>Couple</th>
                                            <th>0-100</th>
                                            <th>Vitesse maximale</th>
                                            <th>Consommation</th>
                                            <th>Carrosserie</th>
                                            <th>Marché</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        <script type="text/javascript" language="javascript">

                                $(document).ready(function(){
                                        fetch_data();

                                        function fetch_data(){
                                                var dataTable = $('#user_data').DataTable({
                                                        "processing" : true,
                                                        "serverSide" : true,
                                                        "order" : [],
                                                        "ajax" : {
                                                                url:"../actions/fiche/editableTable.php",
                                                                type:"POST"
                                                        }
                                                });
                                        }
                                });

                        </script>

<!-- EDITABLE TABLE -->

<br>
<div>
<span>Image<label> :</label></span>
<input type="file" name="fichier" id="cfichier" />
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