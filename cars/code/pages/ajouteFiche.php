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
<div class="input-container">
<span>Nom <label> :</label></span>
<input class="addFiche" type="text" name="nom"> 
</div>
<br>
<div class="input-container">
    <span>Résumé <label> :</label></span>
    <textarea class="addFiche" name="resume" maxlength="200"></textarea>
</div>
<br>

<div id="editor-container" style="height: 300px;">
        <p>Commencez à écrire ici...</p>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Initialiser Quill
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });
    </script>

<br>
<!-- EDITABLE TABLE -->

<!-- Tableau des versions -->
<div class="table-container">
        <div class="table-responsive">
            <table id="user_data" class="table table-bordered">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_body">
            <!-- Lignes du tableau à remplir dynamiquement -->
            <tr>
                <td><input type="text" name="appellation[]" class="form-control" /></td>
                <td><input type="text" name="construction[]" class="form-control" /></td>
                <td><input type="text" name="moteur[]" class="form-control" /></td>
                <td><input type="text" name="cylindree[]" class="form-control" /></td>
                <td><input type="text" name="performance[]" class="form-control" /></td>
                <td><input type="text" name="couple[]" class="form-control" /></td>
                <td><input type="text" name="zero_to_hundred[]" class="form-control" /></td>
                <td><input type="text" name="vitesse_max[]" class="form-control" /></td>
                <td><input type="text" name="consommation[]" class="form-control" /></td>
                <td><input type="text" name="carrosserie[]" class="form-control" /></td>
                <td><input type="text" name="marche[]" class="form-control" /></td>
                <td class="center-button">
                            <button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button>
                </td>
            </tr>
        </tbody>
            </table>
        </div>
        <button type="button" name="add" id="add" class="btn btn-info">Ajouter une ligne</button>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
    // Supprimer une ligne du tableau
    $(document).on('click', 'button[name="remove"]', function() {
        $(this).closest('tr').remove();
    });

    // Ajouter une nouvelle ligne au tableau
    $('#add').click(function() {
        var html = '<tr>';
        html += '<td><input type="text" name="appellation[]" class="form-control" /></td>';
        html += '<td><input type="text" name="construction[]" class="form-control" /></td>';
        html += '<td><input type="text" name="moteur[]" class="form-control" /></td>';
        html += '<td><input type="text" name="cylindree[]" class="form-control" /></td>';
        html += '<td><input type="text" name="performance[]" class="form-control" /></td>';
        html += '<td><input type="text" name="couple[]" class="form-control" /></td>';
        html += '<td><input type="text" name="zero_to_hundred[]" class="form-control" /></td>';
        html += '<td><input type="text" name="vitesse_max[]" class="form-control" /></td>';
        html += '<td><input type="text" name="consommation[]" class="form-control" /></td>';
        html += '<td><input type="text" name="carrosserie[]" class="form-control" /></td>';
        html += '<td><input type="text" name="marche[]" class="form-control" /></td>';
        html += '<td class="center-button"><button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button></td>';
        html += '</tr>';
        $('#table_body').append(html);
    });
});
</script>

<!-- EDITABLE TABLE -->
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