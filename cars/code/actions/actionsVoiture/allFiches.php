<?php

require('../actions/database.php');



// recherche par constructeur automobile
if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_constructeur = explode(",", $_GET['id_constructeur']);
    $cpt = 0;

    foreach($ids_constructeur as $id) {
        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? ORDER BY nom');
        $getAllFiches->execute(array($id));
        if($getAllFiches->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($fiche = $getAllFiches->fetch()){
                    $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                    $getConstructeur->execute(array($fiche['id_constructeur']));
                    $constructeur = $getConstructeur->fetch();
            
                    $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                    $getAnnee->execute(array($fiche['id_annee']));
                    $annee = $getAnnee->fetch();
            ?>
            <div class="column">
                <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                <div class="text">
                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                </div> 
            </div>

            

            <?php
                }
    }
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}
// recherche par type de voiture
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids = explode(",", $_GET['id_type']);
    $cpt = 0;
    ?>
           

            <?php 
    foreach($ids as $id) {
        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_type=? ORDER BY id');
        $getAllFiches->execute(array($id));
        if($getAllFiches->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($fiche = $getAllFiches->fetch()){
                    $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                    $getConstructeur->execute(array($fiche['id_constructeur']));
                    $constructeur = $getConstructeur->fetch();
            
                    $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                    $getAnnee->execute(array($fiche['id_annee']));
                    $annee = $getAnnee->fetch();
            ?>
            <div class="column">
                <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                <div class="text">
                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                </div> 
            </div>

            <?php
                }
            ?>
<?php
    }
    ?>
            

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}
// recherche par modele de voiture
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids = explode(",", $_GET['id_modele']);
    $cpt = 0;
    ?>
            

            <?php 
    foreach($ids as $id) {
        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_modele=? ORDER BY id');
        $getAllFiches->execute(array($id));
        if($getAllFiches->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($fiche = $getAllFiches->fetch()){
                    $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                    $getConstructeur->execute(array($fiche['id_constructeur']));
                    $constructeur = $getConstructeur->fetch();
            
                    $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                    $getAnnee->execute(array($fiche['id_annee']));
                    $annee = $getAnnee->fetch();
            ?>
            <div class="column">
                <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                <div class="text">
                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                </div> 
            </div>

            <?php
                }
            ?>
<?php
    }
    ?>
          

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par annee de voiture
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids = explode(",", $_GET['id_annee']);
    $cpt = 0;
    ?>
         

            <?php 
    foreach($ids as $id) {
        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_annee=? ORDER BY id');
        $getAllFiches->execute(array($id));
        if($getAllFiches->rowCount() > 0){
            $cpt++;
        }
                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                while($fiche = $getAllFiches->fetch()){
                    $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                    $getConstructeur->execute(array($fiche['id_constructeur']));
                    $constructeur = $getConstructeur->fetch();
            
                    $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                    $getAnnee->execute(array($fiche['id_annee']));
                    $annee = $getAnnee->fetch();
            ?>
            <div class="column">
                <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                <div class="text">
                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                </div> 
            </div>

            <?php
                }
            ?>
<?php
    }
    ?>
          

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par constructeur automobile + type
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_type = explode(",", $_GET['id_type']);
    $cpt1 = 0;
    foreach($ids_type as $idType) {
        $ids_constructeur = explode(",", $_GET['id_constructeur']);
        $cpt2 = 0;
        ?>
                

                <?php 
        foreach($ids_constructeur as $idConstructeur) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_type=? ORDER BY nom');
            $getAllFiches->execute(array($idConstructeur, $idType));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
         

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par constructeur automobile + modele
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_modele = explode(",", $_GET['id_modele']);
    $cpt1 = 0;
    foreach($ids_modele as $idModele) {
        $ids_constructeur = explode(",", $_GET['id_constructeur']);
        $cpt2 = 0;
        ?>
         

                <?php 
        foreach($ids_constructeur as $idConstructeur) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_modele=? ORDER BY nom');
            $getAllFiches->execute(array($idConstructeur, $idModele));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
            

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par constructeur automobile + annee
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_annees = explode(",", $_GET['id_annee']);
    $cpt1 = 0;
    foreach($ids_annees as $idAnnee) {
        $ids_constructeur = explode(",", $_GET['id_constructeur']);
        $cpt2 = 0;
        ?>
              

                <?php 
        foreach($ids_constructeur as $idConstructeur) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_annee=? ORDER BY nom');
            $getAllFiches->execute(array($idConstructeur, $idAnnee));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
          

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par type + modele
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_modeles = explode(",", $_GET['id_modele']);
    $cpt1 = 0;
    foreach($ids_modeles as $idModele) {
        $ids_types = explode(",", $_GET['id_type']);
        $cpt2 = 0;
        ?>
                

                <?php 
        foreach($ids_types as $idType) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_type=? AND id_modele=? ORDER BY nom');
            $getAllFiches->execute(array($idType, $idModele));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
           

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par type + annee
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_annees = explode(",", $_GET['id_annee']);
    $cpt1 = 0;
    foreach($ids_annees as $idAnnee) {
        $ids_types = explode(",", $_GET['id_type']);
        $cpt2 = 0;
        ?>
                

                <?php 
        foreach($ids_types as $idType) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_type=? AND id_annee=? ORDER BY nom');
            $getAllFiches->execute(array($idType, $idAnnee));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
          

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par modele + annee
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_modeles = explode(",", $_GET['id_modele']);
    $cpt1 = 0;
    foreach($ids_modeles as $idModele) {
        $ids_annees = explode(",", $_GET['id_annee']);
        $cpt2 = 0;
        ?>
         

                <?php 
        foreach($ids_annees as $idAnnee) {
            $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_annee=? AND id_modele=? ORDER BY nom');
            $getAllFiches->execute(array($idAnnee, $idModele));
            if($getAllFiches->rowCount() > 0){
                $cpt2++;
            }
                    if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                    while($fiche = $getAllFiches->fetch()){
                        $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                        $getConstructeur->execute(array($fiche['id_constructeur']));
                        $constructeur = $getConstructeur->fetch();
                
                        $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                        $getAnnee->execute(array($fiche['id_annee']));
                        $annee = $getAnnee->fetch();
                ?>
                <div class="column">
                    <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                    <div class="text">
                    <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                    </div> 
                </div>

                

                <?php
                    }
                ?>
                
    <?php
        }}
    ?>
           

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par constructeur + type + modele
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND !isset($_GET['id_annee'] ) AND empty($_GET['id_annee'])){
    $ids_constructeurs = explode(",", $_GET['id_constructeur']);
    $cpt1 = 0;
    foreach($ids_constructeurs as $idConstructeur) {
        $ids_types = explode(",", $_GET['id_type']);
        $cpt2 = 0;
        ?>
          

                <?php 
        foreach($ids_types as $idType) {

            $ids_modeles = explode(",", $_GET['id_modele']);

            foreach($ids_modeles as $idModele) {
                    $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_type=? AND id_modele=? ORDER BY nom');
                    $getAllFiches->execute(array($idConstructeur, $idType, $idModele));
                    if($getAllFiches->rowCount() > 0){
                        $cpt2++;
                    }
                            if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                            while($fiche = $getAllFiches->fetch()){
                                $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                                $getConstructeur->execute(array($fiche['id_constructeur']));
                                $constructeur = $getConstructeur->fetch();
                        
                                $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                                $getAnnee->execute(array($fiche['id_annee']));
                                $annee = $getAnnee->fetch();
                        ?>
                        <div class="column">
                            <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                            <div class="text">
                            <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                            </div> 
                        </div>

                        

                        <?php
                            }
                        ?>
                
    <?php
        }}}
    ?>
         

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par type + modele + annee
else if(!isset($_GET['id_constructeur'] ) AND empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_types = explode(",", $_GET['id_type']);
    $cpt1 = 0;
    foreach($ids_types as $idType) {
        $ids_modeles = explode(",", $_GET['id_modele']);
        $cpt2 = 0;
        ?>
                

                <?php 
        foreach($ids_modeles as $idModele) {

            $ids_annees = explode(",", $_GET['id_annee']);

            foreach($ids_annees as $idAnnee) {
                    $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_type=? AND id_modele=? AND id_annee=? ORDER BY nom');
                    $getAllFiches->execute(array($idType, $idModele, $idAnnee));
                    if($getAllFiches->rowCount() > 0){
                        $cpt2++;
                    }
                            if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                            while($fiche = $getAllFiches->fetch()){
                                $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                                $getConstructeur->execute(array($fiche['id_constructeur']));
                                $constructeur = $getConstructeur->fetch();
                        
                                $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                                $getAnnee->execute(array($fiche['id_annee']));
                                $annee = $getAnnee->fetch();
                        ?>
                        <div class="column">
                            <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                            <div class="text">
                            <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                            </div> 
                        </div>

                        

                        <?php
                            }
                        ?>
                
    <?php
        }}}
    ?>
           

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par modele + annee + constructeur
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND !isset($_GET['id_type'] ) AND empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_constructeurs = explode(",", $_GET['id_constructeur']);
    $cpt1 = 0;
    foreach($ids_constructeurs as $idConstructeur) {
        $ids_modeles = explode(",", $_GET['id_modele']);
        $cpt2 = 0;
        ?>
                

                <?php 
        foreach($ids_modeles as $idModele) {

            $ids_annees = explode(",", $_GET['id_annee']);

            foreach($ids_annees as $idAnnee) {
                    $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_modele=? AND id_annee=? ORDER BY nom');
                    $getAllFiches->execute(array($idConstructeur, $idModele, $idAnnee));
                    if($getAllFiches->rowCount() > 0){
                        $cpt2++;
                    }
                            if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                            while($fiche = $getAllFiches->fetch()){
                                $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                                $getConstructeur->execute(array($fiche['id_constructeur']));
                                $constructeur = $getConstructeur->fetch();
                        
                                $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                                $getAnnee->execute(array($fiche['id_annee']));
                                $annee = $getAnnee->fetch();
                        ?>
                        <div class="column">
                            <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                            <div class="text">
                            <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                            </div> 
                        </div>

                        

                        <?php
                            }
                        ?>
                
    <?php
        }}}
    ?>
           

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par annee + constructeur + type
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND !isset($_GET['id_modele'] ) AND empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_constructeurs = explode(",", $_GET['id_constructeur']);
    $cpt1 = 0;
    foreach($ids_constructeurs as $idConstructeur) {
        $ids_types = explode(",", $_GET['id_type']);
        $cpt2 = 0;
        ?>
               

                <?php 
        foreach($ids_types as $idType) {

            $ids_annees = explode(",", $_GET['id_annee']);

            foreach($ids_annees as $idAnnee) {
                    $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_type=? AND id_annee=? ORDER BY nom');
                    $getAllFiches->execute(array($idConstructeur, $idType, $idAnnee));
                    if($getAllFiches->rowCount() > 0){
                        $cpt2++;
                    }
                            if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                            while($fiche = $getAllFiches->fetch()){
                                $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                                $getConstructeur->execute(array($fiche['id_constructeur']));
                                $constructeur = $getConstructeur->fetch();
                        
                                $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                                $getAnnee->execute(array($fiche['id_annee']));
                                $annee = $getAnnee->fetch();
                        ?>
                        <div class="column">
                            <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                            <div class="text">
                            <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                            </div> 
                        </div>

                        

                        <?php
                            }
                        ?>
                
    <?php
        }}}
    ?>
           

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}// recherche par constructeur + type + modele + annee
else if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur']) AND isset($_GET['id_type'] ) AND !empty($_GET['id_type']) AND isset($_GET['id_modele'] ) AND !empty($_GET['id_modele']) AND isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
    $ids_constructeurs = explode(",", $_GET['id_constructeur']);
    $cpt1 = 0;
    foreach($ids_constructeurs as $idConstructeur) {
        $ids_types = explode(",", $_GET['id_type']);
        $cpt2 = 0;
        ?>
      

                <?php 
        foreach($ids_types as $idType) {

            $ids_modeles = explode(",", $_GET['id_modele']);

            foreach($ids_modeles as $idModele) {

                $ids_annees = explode(",", $_GET['id_annee']);
    
                foreach($ids_annees as $idAnnee) {
                        $getAllFiches = $bdd->prepare('SELECT * FROM fiches WHERE id_constructeur=? AND id_type=? AND id_annee=? AND id_modele=? ORDER BY nom');
                        $getAllFiches->execute(array($idConstructeur, $idType, $idAnnee, $idModele));
                        if($getAllFiches->rowCount() > 0){
                            $cpt2++;
                        }
                                if(isset($error)){ echo '<p>'.$error.'</p>'; } 
                                while($fiche = $getAllFiches->fetch()){
                                    $getConstructeur = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=?');
                                    $getConstructeur->execute(array($fiche['id_constructeur']));
                                    $constructeur = $getConstructeur->fetch();
                            
                                    $getAnnee = $bdd->prepare('SELECT nom FROM annees WHERE id=?');
                                    $getAnnee->execute(array($fiche['id_annee']));
                                    $annee = $getAnnee->fetch();
                            ?>
                            <div class="column">
                                <a href="fiche.php?id_fiche=<?= $fiche['id']; ?>"><input type=image src=../../library/img/<?= $fiche['image']; ?> width="100%"/></a>
                                <div class="text">
                                <p class="nomWidgetFiche"><span class="spanNomConstructeur"><?= $constructeur['nom']; ?> </span>  <?= $fiche['nom']; ?> <span class="spanNomAnnee"><?= $annee['nom']; ?> </span></p>
                                </div> 
                            </div>

                            

                            <?php
                                }
                            ?>
                
    <?php
        }}}}
    ?>
          

            <?php 
     
    if($cpt == 0){
        $error =  "Aucune annonce n'a été trouvée.";  
    }
  
}else{

    $getAllFiches = $bdd->query('SELECT * FROM fiches ORDER BY nom');

}

?>