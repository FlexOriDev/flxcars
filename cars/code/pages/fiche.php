<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Fiche</title><!--Titre de la page web-->
</head>
<!--------------------------------------------HEAD------------------------------------------------------>

<!--------------------------------------------HEADER------------------------------------------------------>
<?php 
include '../includesHeaderFooter/header.php'; 
?>
<!--------------------------------------------HEADER------------------------------------------------------>

<!----------PATH---------->
<div class="pathButtons">
        <a href="index.php" class="boutonPath">Accueil</a>
        <a href="voitures.php" class="boutonPath">/Voitures</a>
        <a class="boutonPathActual">/Fiche</a>
</div>
<!----------PATH---------->

<!----------CARD---------->
<div class="cardFiche">

<?php 
        if(isset($_GET['id_fiche'] ) AND !empty($_GET['id_fiche'])){

                $fiche_id = $_GET['id_fiche'];

                $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM fiches WHERE id = ?');
                $getInfosOfThisFicheReq->execute(array($fiche_id));

                if(empty($getInfosOfThisFicheReq)){
                        echo "Fiche introuvable.";
                }else{
        
                $ficheInfos = $getInfosOfThisFicheReq->fetch();

                $getConstructor = $bdd->prepare('SELECT * FROM constructeurs WHERE id = ?');
                $getConstructor->execute(array($ficheInfos['id_constructeur']));

                $ficheConstructeur = $getConstructor->fetch();

                $getPays = $bdd->prepare('SELECT * FROM pays WHERE id = ?');
                $getPays->execute(array($ficheConstructeur['id_pays']));

                $fichePays = $getPays->fetch();

                $getAnnee = $bdd->prepare('SELECT * FROM annees WHERE id = ?');
                $getAnnee->execute(array($ficheInfos['id_annee']));

                $ficheAnne = $getAnnee->fetch();

                $getGroupe = $bdd->prepare('SELECT * FROM groupes WHERE id = ?');
                $getGroupe->execute(array($ficheConstructeur['id_groupe']));
                $ficheGroupe = $getGroupe->fetch();
                $ficheGroupeFinal = $ficheConstructeur['nom'];

                if($ficheGroupe){  
                        $ficheGroupeFinal = $ficheGroupe['nom'];
                }

                $getType = $bdd->prepare('SELECT * FROM types WHERE id = ?');
                $getType->execute(array($ficheInfos['id_type']));

                $ficheType = $getType->fetch();

                $getSegment = $bdd->prepare('SELECT * FROM segments WHERE id = ?');
                $getSegment->execute(array($ficheInfos['id_segment']));

                $ficheSegment = $getSegment->fetch();
                
                ?>

                <article class="boxLeftResume">
                                
                                <p class="textResumeFiche"><?= $ficheInfos['resume']; ?></p>

                </article>

                <div class="boxButtonLeftDate">

                                <a><p class="textButtonDateFiche"><?= $ficheAnne['nom']; ?></p></a>
                                <img class="imgLeftDate" src="../../library/imgIconsFiche/date.png">

                </div>

                <div class="boxButtonLeftOne">

                                <a class="buttonLeftOne" ><p class="textButtonOneFiche"><?= $fichePays['nom']; ?></p></a>
                                <img class="imgLeftPays" src="../../library/imgIconsFiche/pays.png">

                </div>

                <div class="boxButtonLeftTwo">

                                <a href="#" class="buttonLeftTwo" ><p class="textButtonTwoFiche"><?= $ficheType['nom']; ?></p></a>

                </div>

                <div class="boxTopAndPicture">

                        <article class="boxTopPictureFiche">

                                <h6 class="textFicheConstruct"><?= $ficheConstructeur['nom']; ?> - <?= $ficheInfos['nom']; ?></h6>
                                
                        </article>

                        <div class="containerPictureFiche">
                                <img class="pictureFiche" src="../../library/img/<?= $ficheInfos['image']; ?>">
                        </div>
                </div>

                <div class="boxButtonRightOne">

                                <a href="#" class="buttonRightOne" ><p class="textButtonOneRightFiche"><?= $ficheSegment['nom']; ?></p></a>
                                <img class="imgLeftSegment" src="../../library/imgIconsFiche/segment.png">

                </div>

                <div class="boxButtonRight2">

                                <a href="#" class="buttonRight2" ><p class="textButton2RightFiche"><?= $ficheGroupeFinal; ?></p></a>
                                <img class="imgLeftGroupe" src="../../library/imgIconsFiche/groupe.png">

                </div>

                <div class="boxButtonRight3">

                                <a href="#resume" class="buttonRight3" ><p class="textButton3RightFiche">Résumé</p></a>
                                <img class="imgLeftResume" src="../../library/imgIconsFiche/resume.png">

                </div>

                <div class="boxButtonRight4">

                                <a href="#histoire" class="buttonRight4" ><p class="textButton4RightFiche">Histoire</p></a>
                                <img class="imgLeftHistoire" src="../../library/imgIconsFiche/histoire.png">

                </div>

                <div class="boxButtonRight5">

                                <a href="#technique" class="buttonRight5" ><p class="textButton5RightFiche">Technique</p></a>
                                <img class="imgLeftTechnique" src="../../library/imgIconsFiche/technique.png">

                </div>

                <div class="boxButtonRight6">

                                <a href="#photos" class="buttonRight6" ><p class="textButton6RightFiche">Photos</p></a>
                                <img class="imgLeftPhoto" src="../../library/imgIconsFiche/photo.png">

                </div>

        <?php
                }

        }else{
                echo "Fiche introuvable.";
        }
        
                

        ?>
</div>


<!----------CARD---------->

<!--------------------------------------------MAIN------------------------------------------------------>
<main>

<div class="fiche-container">
                <article class="article-fiche-title" id="resume">
                        <h1>Résumé</h1>
                </article>
                <br>
                <article class="article-fiche-name3">
                        <p class="textResumeFiche"><?= $ficheInfos['description']; ?></p>
                </article>
                <br><br><br>
                <article class="article-fiche-title" id="histoire">
                        <h1>Histoire</h1>
                </article>
                <br>
                <article class="article-fiche-name3">
                        <p><?= $ficheInfos['description']; ?></p>
                </article>
                <br><br><br>
                <article class="article-fiche-title" id="technique">
                        <h1>Technique</h1>
                </article>
                <br>
                <article class="article-fiche-name3">
                        <p><?= $ficheInfos['description']; ?></p>
                </article>
                <br><br><br>
                <article class="article-fiche-title" id="photos">
                        <h1>Photos</h1>
                </article>
</div>

<br><br><br><br><br><br>

</main>
<!--------------------------------------------MAIN------------------------------------------------------>

<?php require '../includesHeaderFooter/footer.php' ; ?>