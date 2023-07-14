<?php 
include '../includesHeaderFooter/header.php'; 
require('../actions/database.php');
require('../actions/fiche/ajouteConstructeur.php'); 
require('../actions/fiche/ajouteType.php'); 
require('../actions/fiche/ajouteModele.php'); 
require('../actions/fiche/ajouteAnnee.php'); 
require('../actions/fiche/ajoutePays.php'); 
require('../actions/fiche/ajouteGroupe.php'); 

require('../actions/actionsVoiture/allConstructeurs.php'); 
require('../actions/actionsVoiture/allTypes.php'); 
require('../actions/actionsVoiture/allModeles.php'); 
require('../actions/actionsVoiture/allAnnees.php'); 
require('../actions/actionsVoiture/allPays.php'); 
require('../actions/actionsVoiture/allGroupes.php'); 
?>

<main>

<article id="article-1">
        <h1>Dashboard</h1>
      
</article>

<!-- debut de la partie contenu -->
<div class="main">

<!-- AFFICHAGE FORMULAIRE CONSTRUCTEUR-->

    <form method="POST" ENCTYPE="multipart/form-data"> 

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    <br>
    <div class="addDashboardConstructeur">

    <h3 class="ajouteConstructeurH3" >Ajouter un Constructeur</h3>
    <br>
    <div>
    <span>Nom <label> :</label></span>
    <input class="addConstructeur" type="text" name="nomConstructeur"> 
    </div>
    <br>
    <div class="register-but">

    <input type="submit" value="Publier" name="validateConstructeur">

    </div>
    </form>
    </div>
<!-- --------------------- -->

<!-- AFFICHAGE FORMULAIRE TYPE-->

    <form method="POST" ENCTYPE="multipart/form-data" > 

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    <br>
    <div class="addDashboardType">

    <h3 class="ajouteTypeH3" >Ajouter un Type</h3>
    <br>
    <div>
    <span>Nom <label> :</label></span>
    <input class="addType" type="text" name="nomType"> 
    </div>
    <br>
    <div class="clear"> </div>
    <div class="register-but">

    <input type="submit" value="Publier" name="validateType">

    </div>
    </form>
    </div>
<!-- --------------------- -->

<!-- AFFICHAGE FORMULAIRE MODELE-->

    <form method="POST" ENCTYPE="multipart/form-data" > 

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    <br>
    <div class="addDashboardModele">

    <h3 class="ajouteModeleH3" >Ajouter un Modèle</h3>
    <br>
    <div>
    <span>Nom <label> :</label></span>
    <input class="addModele" type="text" name="nomModele"> 
    </div>
    <br>
    <div class="clear"> </div>
    <div class="register-but">

    <input type="submit" value="Publier" name="validateModele">

    </div>
    </form>
    </div>
<!-- --------------------- -->

<!-- AFFICHAGE FORMULAIRE ANNEE-->

    <form method="POST" ENCTYPE="multipart/form-data" > 

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    <br>
    <div class="addDashboardAnnee">

    <h3 class="ajouteAnneeH3" >Ajouter une Année</h3>
    <br>
    <div>
    <span>Nom <label> :</label></span>
    <input class="addAnnee" type="text" name="nomAnnee"> 
    </div>
    <br>
    <div class="clear"> </div>
    <div class="register-but">

    <input type="submit" value="Publier" name="validateAnnee">

    </div>
    </form>
    </div>
<!-- --------------------- -->

<!-- AFFICHAGE FORMULAIRE PAYS-->

    <form method="POST" ENCTYPE="multipart/form-data" > 

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
    <br>
    <div class="addDashboardPays">

    <h3 class="ajoutePaysH3" >Ajouter un Pays</h3>
    <br>
    <div>
    <span>Nom <label> :</label></span>
    <input class="addPays" type="text" name="nomPays"> 
    </div>
    <br>
    <div class="clear"> </div>
    <div class="register-but">

    <input type="submit" value="Publier" name="validatePays">

    </div>
    </form>
    </div>
<!-- --------------------- -->

<!-- AFFICHAGE FORMULAIRE GROUPES-->

<form method="POST" ENCTYPE="multipart/form-data" > 

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
<br>
<div class="addDashboardGroupe">

<h3 class="ajouteGroupeH3" >Ajouter un Groupe Automobile</h3>
<br>
<div>
<span>Nom <label> :</label></span>
<input class="addGroupe" type="text" name="nomGroupe"> 
</div>
<br>
<div class="clear"> </div>
<div class="register-but">

<input type="submit" value="Publier" name="validateGroupe">

</div>
</form>
</div>
<!-- --------------------- -->
<br><br><br>
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

    <!-- AFFICHAGE PAYS -->

    <table class="paysDash">
    <thead>
        <tr>
        <th>ID
        <th>PAYS
    </thead>
    
    <?php
        while($pays = $getAllPays->fetch()){
            ?>
            <tr>
            <td><?= $pays['id']; ?></td>
            <td><?= $pays   ['nom']; ?></td>        
            </tr>
            
            <?php
            
        }?>
    </table>

    <!-- AFFICHAGE GROUPES -->

    <table class="groupeDash">
    <thead>
        <tr>
        <th>ID
        <th>GROUPES
    </thead>
    
    <?php
        while($groupe = $getAllGroupes->fetch()){
            ?>
            <tr>
            <td><?= $groupe['id']; ?></td>
            <td><?= $groupe   ['nom']; ?></td>        
            </tr>
            
            <?php
            
        }?>
    </table>

</div><!-- fin de la partie contenu -->

<?php

?>

</main>