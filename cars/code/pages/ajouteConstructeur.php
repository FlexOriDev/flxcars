<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');
require('../actions/fiche/ajouteConstructeur.php'); 
require('../actions/actionsVoiture/allConstructeurs.php'); 
?>

<main>

<article id="article-1">
        <h1>Ajouter un Constructeur</h1>
      
</article>

<!-- debut de la partie contenu -->
<div class="main">
<div class="register">

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

<!-- AFFICHAGE FORMULAIRE -->

<form method="POST" ENCTYPE="multipart/form-data"> 

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
<br>
<div class="register-top-grid">

<h3>Ajouter un Constructeur</h3>
<br>
<div>
<span>Nom <label> :</label></span>
<input class="addFiche" type="text" name="nom"> 
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
<!-- AFFICHAGE CONTRUCTEURS -->

<table>
  <thead>
    <tr>
      <th>ID
      <th>CONSTRUCTEUR
  </thead>
  
  <?php
    while($constructeur = $getAllConstructeurs->fetch()){
        ?>
        <tr>
        <td><?= $constructeur['id']; ?></td>
        <td><?= $constructeur   ['nom']; ?></td>        
        </tr>
        
        <?php
        
    }?>
</table>

</div><!-- fin de la partie contenu -->

<?php

?>

</main>