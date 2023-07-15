<?php
require('../actions/database.php');

// recherche par constructeur automobile
if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND !isset($_GET['id_pays'] ) AND empty($_GET['id_pays']) AND !isset($_GET['id_groupe'] ) AND empty($_GET['id_groupe']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_constructeur = explode(",", $_GET['id_constructeur']);
    $cpt = 0;

    foreach($ids_constructeur as $id) {
        $getAllFichesConstructeurs = $bdd->prepare('SELECT * FROM constructeurs WHERE id=? ORDER BY nom');
        $getAllFichesConstructeurs->execute(array($id));
        if($getAllFichesConstructeurs->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($ficheConstructeur = $getAllFichesConstructeurs->fetch()){
                    $getPays = $bdd->prepare('SELECT nom FROM pays WHERE id=?');
                    $getPays->execute(array($ficheConstructeur['id_pays']));
                    $pays = $getPays->fetch();
            
                    $getGroupe = $bdd->prepare('SELECT nom FROM groupes WHERE id=?');
                    $getGroupe->execute(array($ficheConstructeur['id_groupe']));
                    $groupe = $getGroupe->fetch();
              ?>
            
              <div class="column">
                <a href="voitures.php?id_constructeur=<?= $ficheConstructeur['id']; ?>"><input type=image class="voitures" src=../../library/img/<?= $ficheConstructeur['image']; ?> /></a>
                <div class="text">
                  <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $pays['nom']; ?> </span>  <?= $ficheConstructeur['nom']; ?> <span class="spanNomAnnee"><?= $groupe['nom']; ?> </span></p>
                </div> 
              </div>

            

            <?php
                }
    }
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}else{
    $getAllConstructeurs = $bdd->prepare('SELECT * FROM constructeurs ORDER BY nom');
    $getAllConstructeurs->execute(array());
}

    