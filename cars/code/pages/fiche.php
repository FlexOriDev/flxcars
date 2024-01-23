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

                $ficheInfos = $getInfosOfThisFicheReq->fetch();

                if(!$ficheInfos){
                        echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
                }else{

                $getConstructor = $bdd->prepare('SELECT * FROM constructeurs WHERE id = ?');
                $getConstructor->execute(array($ficheInfos['id_constructeur']));

                $ficheConstructeur = $getConstructor->fetch();

                $getPays = $bdd->prepare('SELECT * FROM pays WHERE id = ?');
                $getPays->execute(array($ficheConstructeur['id_pays']));

                $fichePays = $getPays->fetch();

                $getAnnee = $bdd->prepare('SELECT * FROM annees WHERE id = ?');
                $getAnnee->execute(array($ficheInfos['id_annee']));

                $ficheAnne = $getAnnee->fetch();

                $getModele = $bdd->prepare('SELECT * FROM modeles WHERE id = ?');
                $getModele->execute(array($ficheInfos['id_modele']));

                $modele = $getModele->fetch();

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
                                <img class="pictureFiche" src="../../library/voitures/<?= $modele['nom']."/".$fiche_id."/".$ficheInfos['image']; ?>">
                        </div>
                </div>

                <div class="boxButtonRightOne">

                                <a href="#" class="buttonRightOne" ><p class="textButtonOneRightFiche"><?= $ficheSegment['nom']; ?></p></a>
                                <a href="#" ><img class="imgLeftSegment" src="../../library/imgIconsFiche/segment.png"></a>

                </div>

                <div class="boxButtonRight2">

                                <a href="#" class="buttonRight2" ><p class="textButton2RightFiche"><?= $ficheGroupeFinal; ?></p></a>
                                <a href="#" ><img class="imgLeftGroupe" src="../../library/imgIconsFiche/groupe.png"></a>

                </div>

                <div class="boxButtonRight3">

                                <a href="#resume" class="buttonRight3" ><p class="textButton3RightFiche">Résumé</p></a>
                                <a href="#resume" ><img class="imgLeftResume" src="../../library/imgIconsFiche/resume.png"></a>

                </div>

                <div class="boxButtonRight4">

                                <a href="#histoire" class="buttonRight4" ><p class="textButton4RightFiche">Histoire</p></a>
                                <a href="#histoire" ><img class="imgLeftHistoire" src="../../library/imgIconsFiche/histoire.png"></a>

                </div>

                <div class="boxButtonRight5">

                                <a href="#technique" class="buttonRight5" ><p class="textButton5RightFiche">Technique</p></a>
                                <a href="#technique" ><img class="imgLeftTechnique" src="../../library/imgIconsFiche/technique.png"></a>

                </div>

                <div class="boxButtonRight6">

                                <a href="#photos" class="buttonRight6" ><p class="textButton6RightFiche">Photos</p></a>
                                <a href="#photos" ><img class="imgLeftPhoto" src="../../library/imgIconsFiche/photo.png"></a>

                </div>

        <?php
                }

        }else{
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }
        
                

        ?>
</div>


<!----------CARD---------->

<!--------------------------------------------MAIN------------------------------------------------------>
<main>

<?php
if(isset($_GET['id_fiche'] ) AND !empty($_GET['id_fiche'])){

        $fiche_id = $_GET['id_fiche'];

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM fiches WHERE id = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_id));

        $ficheInfos = $getInfosOfThisFicheReq->fetch();

        if(!$ficheInfos){
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }else{?>

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

        <?php
                        }

        ?>


<!-- GALERIE -->

<?php

        $fiche_id = $_GET['id_fiche'];

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM fiches WHERE id = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_id));

        $ficheInfos = $getInfosOfThisFicheReq->fetch();

        $getModele = $bdd->prepare('SELECT * FROM modeles WHERE id = ?');
        $getModele->execute(array($ficheInfos['id_modele']));

        $modele = $getModele->fetch();

        if(!$ficheInfos){
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }else{
                
                $getPhotos = $bdd->prepare('SELECT * FROM imagesfiche WHERE id_fiche=?');
                $getPhotos->execute(array($fiche_id));

                

                $photo = $getPhotos->fetch();
                        
                        $getNomFiche = $bdd->prepare('SELECT * FROM fiches WHERE id = ?');
                        $getNomFiche->execute(array($fiche_id));
                        $nomFiche = $getNomFiche->fetch()

                        ?>
                        <br><br>
                        <article class="article-fiche-title-photos">
                                <h2 class="ficheTitreModelePhotos"><?= $nomFiche['nom']; ?></h2>
                        </article>
                        <br><br>
                        <br><br>

                        <?php
                        if($photo['img_1']!=""){
                        ?>

                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['id_fiche']; ?>(1)">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_1']; ?>" alt=<?= $photo['img_1']; ?> width="300" height="200">
                                        </a>
                                </div>

                        <?php }if($photo['img_2']!=""){
                        ?>

                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['id_fiche']; ?>(2)">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_2']; ?>" alt=<?= $photo['img_2']; ?> width="300" height="200">
                                        </a>
                                </div>

                        <?php }if($photo['img_3']!=""){
                        ?>

                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['id_fiche']; ?>(3)">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_3']; ?>" alt=<?= $photo['img_3']; ?> width="300" height="200">
                                        </a>
                                </div>

                        <?php }if($photo['img_4']!=""){
                        ?>

                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['id_fiche']; ?>(4)">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_4']; ?>" alt=<?= $photo['img_4']; ?> width="300" height="200">
                                        </a>
                                </div>

                        <?php }if($photo['img_5']!=""){
                        ?>
                                
                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['id_fiche']; ?>(5)">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_5']; ?>" alt=<?= $photo['img_5']; ?> width="300" height="200">
                                        </a>
                                </div>

                        <?php }if($photo['img_1']!=""){
                        ?>
                                <!-- CARROUSEL -->

                                <div class="container">
                                <div class="slides<?= $photo['id_fiche']; ?>">
                                <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_1']; ?>" style="width:100%">
                                </div>

                                <?php if($photo['img_2']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_2']; ?>" style="width:100%">
                                        </div>

                                <?php }if($photo['img_3']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_3']; ?>" style="width:100%">
                                        </div>

                                <?php }if($photo['img_4']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_4']; ?>" style="width:100%">
                                        </div>

                                <?php }if($photo['img_5']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_5']; ?>" style="width:100%">
                                        </div>

                                <?php }
                        ?>

                                <a class="prev" onclick="plusSlides<?= $photo['id_fiche']; ?>(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides<?= $photo['id_fiche']; ?>(1)">&#10095;</a>
                                </div>

                                <script>

                                let slideIndex<?= $photo['id_fiche']; ?> = 1;
                                showSlides<?= $photo['id_fiche']; ?>(slideIndex<?= $photo['id_fiche']; ?>);


                                function plusSlides<?= $photo['id_fiche']; ?>(n) {
                                showSlides<?= $photo['id_fiche']; ?>(slideIndex<?= $photo['id_fiche']; ?> += n);
                                }

                                function currentSlide<?= $photo['id_fiche']; ?>(n) {
                                showSlides<?= $photo['id_fiche']; ?>(slideIndex<?= $photo['id_fiche']; ?> = n);
                                }

                                function showSlides<?= $photo['id_fiche']; ?>(n) {
                                let slides = document.getElementsByClassName('slides<?= $photo['id_fiche']; ?>');
                                
                                if(n > slides.length) { slideIndex<?= $photo['id_fiche']; ?> = 1 }
                                
                                if(n < 1 ) { slideIndex<?= $photo['id_fiche']; ?> = slides.length }
                                
                                // Cacher toutes les slides
                                for(let i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                                }
                                
                                
                                // Afficher la slide demandée
                                slides[slideIndex<?= $photo['id_fiche']; ?> - 1].style.display = 'block';
                                
                                }

                                </script>
        <?php
                        }
                
        }

}else{
        echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
}        

        ?>
<br>




<br><br><br><br><br><br><br><br><br><br><br><br>

</main>

<!--------------------------------------------MAIN------------------------------------------------------>

<?php require '../includesHeaderFooter/footer.php' ; ?>