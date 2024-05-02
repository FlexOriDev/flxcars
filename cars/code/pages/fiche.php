<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Fiche</title><!--Titre de la page web-->
    <link href="../css/fiche.css" rel="stylesheet">
</head>
<!--------------------------------------------HEAD------------------------------------------------------>

<!--------------------------------------------HEADER------------------------------------------------------>
<?php
include '../includesHeaderFooter/header.php';
?>
<!--------------------------------------------HEADER------------------------------------------------------>

<!----------PATH---------->
<div class="global-pathButtons">
        <a href="index.php" class="global-boutonPath">Accueil</a>
        <a href="voitures.php" class="global-boutonPath">/Voitures</a>
        <a class="global-boutonPathActual">/Fiche</a>
</div>
<!----------PATH---------->

<!----------CARD---------->
<br>

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

                $getAnneeFin = $bdd->prepare('SELECT * FROM annees WHERE id = ?');
                $getAnneeFin->execute(array($ficheInfos['id_annee_fin']));

                $ficheAnneFin = $getAnneeFin->fetch();

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

                $getImage = $bdd->prepare('SELECT img_1 FROM imagesfiche WHERE id_fiche=?');
                $getImage->execute(array($ficheInfos['id']));
                $image = $getImage->fetch();

                $getLignesOfTab = $bdd->prepare('SELECT * FROM motorisationsessence WHERE id_fiche = ?');
                $getLignesOfTab->execute(array($fiche_id));

                // Récupération de toutes les lignes de résultats dans un tableau
                $tabInfos = $getLignesOfTab->fetchAll();

            ?>
                <div class="color-band">
                    <div class="car-details">
                        <div class="content-left">
                            <p><?= $ficheInfos['resume']; ?></p>
                        </div>
                        <div class="title-banner">
                            <h2><?= $ficheConstructeur['nom']; ?> <?= $ficheInfos['nom']; ?></h2>
                        </div>
                        <a href="#summary-anchor" class="btn-banner-1">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon4">
                            <p>Modèle : <?= $modele['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-2">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon7">
                            <p>Type : <?= $ficheType['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-3">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon3">
                            <p>Segment : <?= $ficheSegment['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-4">
                            <img src="../../library/imgIconsFiche/groupe.png" alt="Icone" class="banner-icon">
                            <p>Constructeur : <?= $ficheConstructeur['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-5">
                            <img src="../../library/imgIconsFiche/groupe.png" alt="Icone" class="banner-icon2">
                            <p>Groupe automobile : <?= $ficheGroupe['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-6">
                            <img src="../../library/imgIconsFiche/date.png" alt="Icone" class="banner-icon5">
                            <p>Année de sortie : <?= $ficheAnne['nom']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-7">
                            <img src="../../library/imgIconsFiche/pays.png" alt="Icone" class="banner-icon2">
                            <p>Pays constructeur : <?= $fichePays['nom']; ?></p>
                        </a>
                        <img src="../../library/voitures/<?= $modele['nom']."/".$fiche_id."/".$image['img_1']; ?>" alt="Car Photo" class="car-photo">
                        <a href="#histoire" class="btn-banner-8">
                            <img src="../../library/imgIconsFiche/histoire.png" alt="Icone" class="banner-icon8">
                            <p>Histoire</p>
                        </a>
                        <a href="#technique" class="btn-banner-9">
                            <img src="../../library/imgIconsFiche/technique.png" alt="Icone" class="banner-icon9">
                            <p>Nombre de versions : <?= count($tabInfos); ?></p>
                        </a>
                        <a href="#photo" class="btn-banner-10">
                            <img src="../../library/imgIconsFiche/photo.png" alt="Icone" class="banner-icon10">
                            <p>Galerie photo</p>
                        </a>
                    </div>
                    <!-- Ajoutez d'autres détails de la voiture ici -->
                </div>
            <?php
            }
            } else{echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';}?>


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

            <article class="article-fiche-title" id="histoire">
                    <h1 class="h1-fiche">Histoire</h1>
            </article>
            <br>
            <article class="article-fiche-name3" id="histoire">
                <?= htmlspecialchars_decode($ficheInfos['histoire']); ?>
            </article>
            <br><br><br>

            <!----------------TABLEAU DES VERSIONS-------------->
            <article class="article-fiche-title" id="technique">
                    <h1 class="h1-fiche">Versions</h1>
            </article>
            <br><br><br>

            <?php
            // Préparation et exécution de la requête pour récupérer toutes les lignes associées à la fiche


            // Vérifier s'il y a des lignes à afficher
            if (count($tabInfos) > 0) {
                echo '<div class="table-container">';
                echo '<div class="table-responsive">';
                echo '<table id="user_data" class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Appellation</th>';
                echo '<th class="col-carburant">Carburant</th>';
                echo '<th>Construction</th>';
                echo '<th>Moteur</th>';
                echo '<th>Cylindrée</th>';
                echo '<th>Performance</th>';
                echo '<th>Couple</th>';
                echo '<th>0-100</th>';
                echo '<th>Vitesse maximale</th>';
                echo '<th>Consommation</th>';
                echo '<th>Carrosserie</th>';
                echo '<th class="col-marche">Marché</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody id="table_body">';

                // Parcourir chaque ligne de résultats pour générer les lignes du tableau
                foreach ($tabInfos as $ligne) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($ligne['appellation']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['carburant']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['construction']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['moteur']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['cylindree']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['performance']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['couple']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['zero_to_hundred']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['vmax']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['conso']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['carrosserie']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['marche']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
            } else {
                // Aucune ligne trouvée pour cette fiche
                echo 'Aucune donnée à afficher.';
            }
            ?>



                        <br><br><br>
                        <article class="article-fiche-title" id="photos">
                                <h1 id="photo" class="h1-fiche">Galerie photo</h1>
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
                                <img class="fiche-photo-carousel" src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_1']; ?>" >
                                </div>

                                <?php if($photo['img_2']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img class="fiche-photo-carousel" src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_2']; ?>" >
                                        </div>

                                <?php }if($photo['img_3']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img class="fiche-photo-carousel" src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_3']; ?>" >
                                        </div>

                                <?php }if($photo['img_4']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img class="fiche-photo-carousel" src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_4']; ?>" >
                                        </div>

                                <?php }if($photo['img_5']!=""){
                        ?>

                                        <div class="slides<?= $photo['id_fiche']; ?>">
                                        <img class="fiche-photo-carousel" src="../../library/voitures/<?= $modele['nom']; ?>/<?= $photo['id_fiche']; ?>/<?= $photo['img_5']; ?>" >
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