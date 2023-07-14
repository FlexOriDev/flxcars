<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');
require('../actions/fiche/ajouteConstructeur.php'); 
require('../actions/actionsVoiture/allConstructeurs.php'); 
require('../actions/actionsVoiture/allTypes.php'); 
require('../actions/actionsVoiture/allModeles.php'); 
require('../actions/actionsVoiture/allAnnees.php'); 
?>

<main>

<article id="article-1">
        <h1>Dashboard</h1>
      
</article>

<!-- debut de la partie contenu -->
<div class="main">

    <br>
    <div class="clear"></div>
    <!-- AFFICHAGE CONTRUCTEURS -->

    <table class="constructeurDash">
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

    <!-- AFFICHAGE TYPES -->

    <table class="typeDash">
    <thead>
        <tr>
        <th>ID
        <th>TYPES
    </thead>
    
    <?php
        while($type = $getAllTypes->fetch()){
            ?>
            <tr>
            <td><?= $type['id']; ?></td>
            <td><?= $type   ['nom']; ?></td>        
            </tr>
            
            <?php
            
        }?>
    </table>

    <!-- AFFICHAGE MODELES -->

    <table class="modeleDash">
    <thead>
        <tr>
        <th>ID
        <th>MODELES
    </thead>
    
    <?php
        while($modele = $getAllModeles->fetch()){
            ?>
            <tr>
            <td><?= $modele['id']; ?></td>
            <td><?= $modele   ['nom']; ?></td>        
            </tr>
            
            <?php
            
        }?>
    </table>

    <!-- AFFICHAGE ANNEES -->

    <table class="anneeDash">
    <thead>
        <tr>
        <th>ID
        <th>ANNEES
    </thead>
    
    <?php
        while($annee = $getAllAnnees->fetch()){
            ?>
            <tr>
            <td><?= $annee['id']; ?></td>
            <td><?= $annee   ['nom']; ?></td>        
            </tr>
            
            <?php
            
        }?>
    </table>

</div><!-- fin de la partie contenu -->

<?php

?>

</main>