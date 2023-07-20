<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Voitures</title><!--Titre de la page web-->
</head>

<?php 
include '../includesHeaderFooter/header.php'; 

?>

<main>

 <a href="index.php" class="boutonPath">Accueil</a>
 <a href="voitures.php" class="boutonPath">/Voitures</a>
 <a class="boutonPathActual">/Fiche</a>


<div class="fiche-container">
        <?php 
        if(isset($_GET['id_fiche'] ) AND !empty($_GET['id_fiche'])){

                $fiche_id = $_GET['id_fiche'];

                $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM fiches WHERE id = ?');
                $getInfosOfThisFicheReq->execute(array($fiche_id));
        
                $ficheInfos = $getInfosOfThisFicheReq->fetch();

                $getConstructor = $bdd->prepare('SELECT * FROM constructeurs WHERE id = ?');
                $getConstructor->execute(array($ficheInfos['id_constructeur']));

                $ficheConstructeur = $getConstructor->fetch();

                $getType = $bdd->prepare('SELECT * FROM types WHERE id = ?');
                $getType->execute(array($ficheInfos['id_type']));

                $ficheType = $getType->fetch();
                
                ?>

                <div class="article-div-fiche">
                        <article class="article-fiche-name">

                                <h6 class="ficheConstruct"><?= $ficheConstructeur['nom']; ?></h6>
                                <h5 class="h5Title"><?= $ficheInfos['nom']; ?></h5>
                                <h6 class="ficheType"><?= $ficheType['nom']; ?></h6>
                                
                        </article>
                </div>
                
                <br>
                <div class="imgFicheDiv">

                <img class="imgFiche" src="../../library/img/<?= $ficheInfos['image']; ?>">

                </div>
                
                <br><br><br>

                <div class="article-div-fiche-2">
                        <article class="article-fiche-name2">
                                <p><?= $ficheInfos['resume']; ?></p>
                        </article>
                </div>
                <br><br><br><br>
                <div class="article-div-fiche-3">
                        <article class="article-fiche-name3">
                                <p><?= $ficheInfos['description']; ?></p>
                        </article>
                </div>

                <?php

        }else{
                echo "Fiche introuvable.";
        }
        
                

        ?>
        

</div>

<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

</main>

