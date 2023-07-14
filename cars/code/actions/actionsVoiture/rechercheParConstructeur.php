<?php
require('../actions/database.php');

// recherche par type de voiture
if(!empty($_GET['id_type'])){
    $ids = explode(",", $_GET['id_type']);
    $cpt = 0;
    ?>
            <div class="row" id="colonne">

            <?php 
    foreach($ids as $id) {
        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_type=? ORDER BY id');
        $getAllFiches->execute(array($id));
        if($getAllFiches->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($fiche = $getAllFiches->fetch()){
            ?>
            <div class="column">
                <a href="fiche.php?id=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%" height= "275px"/></a>
                <div class="text">
                   <p><?= $fiche['nom']; ?></p>
                </div> 
            </div>

            <?php
                }
            ?>
<?php
    }
    ?>
            </div>

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}