<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Fiche</title><!--Titre de la page web-->
    <link href="../css/styleFiche.css" rel="stylesheet">
</head>
<!--------------------------------------------HEAD------------------------------------------------------>

<!--------------------------------------------HEADER------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
?>
<!--------------------------------------------HEADER------------------------------------------------------>

<!----------PATH---------->
<div class="global-pathButtons">
        <a href="pageIndex.php" class="global-boutonPath">Accueil</a>
        <a href="pageVoitures.php" class="global-boutonPath">/Voitures</a>
        <a class="global-boutonPathActual">/Fiche</a>
</div>
<!----------PATH---------->

<!----------CARD---------->
<br>

<?php
        if(isset($_GET['id_fiche'] ) AND !empty($_GET['id_fiche'])){

            $fiche_id = $_GET['id_fiche'];

            $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
            $getInfosOfThisFicheReq->execute(array($fiche_id));

            $ficheInfos = $getInfosOfThisFicheReq->fetch();

            if(!$ficheInfos){
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
            }else{

                $getConstructor = $bdd->prepare('SELECT * FROM CONSTRUCTEUR WHERE ID = ?');
                $getConstructor->execute(array($ficheInfos['ID_CONSTRUCTEUR']));

                $ficheConstructeur = $getConstructor->fetch();

                $getPays = $bdd->prepare('SELECT * FROM PAYS WHERE ID = ?');
                $getPays->execute(array($ficheConstructeur['ID_PAYS']));

                $fichePays = $getPays->fetch();

                $getAnnee = $bdd->prepare('SELECT * FROM ANNEE WHERE ID = ?');
                $getAnnee->execute(array($ficheInfos['ID_ANNEE_DEBUT']));

                $ficheAnne = $getAnnee->fetch();

                $getAnnee2 = $bdd->prepare('SELECT * FROM ANNEE WHERE ID = ?');
                $getAnnee2->execute(array($ficheInfos['ID_ANNEE_FIN']));

                $ficheAnne2 = $getAnnee2->fetch();

                $getAnneeFin = $bdd->prepare('SELECT * FROM ANNEE WHERE ID = ?');
                $getAnneeFin->execute(array($ficheInfos['ID_ANNEE_FIN']));

                $ficheAnneFin = $getAnneeFin->fetch();

                $getModele = $bdd->prepare('SELECT * FROM MODELE WHERE ID = ?');
                $getModele->execute(array($ficheInfos['ID_MODELE']));

                $modele = $getModele->fetch();

                $getGroupe = $bdd->prepare('SELECT * FROM GROUPE WHERE ID = ?');
                $getGroupe->execute(array($ficheConstructeur['ID_GROUPE']));
                $ficheGroupe = $getGroupe->fetch();
                $ficheGroupeFinal = $ficheConstructeur['NOM_CONSTRUCTEUR'];

                if($ficheGroupe){
                    $ficheGroupeFinal = $ficheGroupe['NOM_GROUPE'];
                }

                $getType = $bdd->prepare('SELECT * FROM TYPE WHERE ID = ?');
                $getType->execute(array($ficheInfos['ID_TYPE']));

                $ficheType = $getType->fetch();

                $getSegment = $bdd->prepare('SELECT * FROM SEGMENT WHERE ID = ?');
                $getSegment->execute(array($ficheInfos['ID_SEGMENT']));

                $ficheSegment = $getSegment->fetch();

                $getImage = $bdd->prepare('SELECT IMAGE_URL FROM IMAGE WHERE ID_FICHE=?');
                $getImage->execute(array($ficheInfos['ID']));
                $image = $getImage->fetch();

                $getLignesOfTab = $bdd->prepare('SELECT * FROM VERSION WHERE ID_FICHE = ?');
                $getLignesOfTab->execute(array($fiche_id));

                // Récupération de toutes les lignes de résultats dans un tableau
                $tabInfos = $getLignesOfTab->fetchAll();

            ?>
                <div class="color-band">
                    <div class="car-details">
                        <div class="content-left">
                            <p><?= $ficheInfos['RESUME_FICHE']; ?></p>
                        </div>
                        <div class="title-banner">
                            <h2><?= $ficheConstructeur['NOM_CONSTRUCTEUR']; ?> <?= $ficheInfos['NOM_FICHE']; ?></h2>
                        </div>
                        <a href="#summary-anchor" class="btn-banner-1">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon4">
                            <p>Modèle : <?= $modele['NOM_MODELE']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-2">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon7">
                            <p>Type : <?= $ficheType['NOM_TYPE']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-3">
                            <img src="../../library/imgIconsFiche/segment.png" alt="Icone" class="banner-icon3">
                            <p>Segment : <?= $ficheSegment['NOM_SEGMENT']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-4">
                            <img src="../../library/imgIconsFiche/groupe.png" alt="Icone" class="banner-icon">
                            <p>Constructeur : <?= $ficheConstructeur['NOM_CONSTRUCTEUR']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-5">
                            <img src="../../library/imgIconsFiche/groupe.png" alt="Icone" class="banner-icon2">
                            <p>Groupe automobile : <?= $ficheGroupe['NOM_GROUPE']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-6">
                            <img src="../../library/imgIconsFiche/date.png" alt="Icone" class="banner-icon5">
                            <p>Période de production : <?= $ficheAnne['NOM_ANNEE']; ?> - <?= $ficheAnne2['NOM_ANNEE']; ?></p>
                        </a>
                        <a href="#summary-anchor" class="btn-banner-7">
                            <img src="../../library/imgIconsFiche/pays.png" alt="Icone" class="banner-icon2">
                            <p>Pays constructeur : <?= $fichePays['NOM_PAYS']; ?></p>
                        </a>
                        <img src="../../library/voitures/<?= $modele['NOM_MODELE']."/".$fiche_id."/".$image['IMAGE_URL']; ?>" alt="Car Photo" class="car-photo">
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

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_id));

        $ficheInfos = $getInfosOfThisFicheReq->fetch();

        if(!$ficheInfos){
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }else{?>

        <div class="fiche-container">

            <article class="article-fiche-title" id="histoire">
                    <h1 class="h1-fiche">Histoire</h1>
            </article>
            <article class="²" id="histoire">
                <?= htmlspecialchars_decode($ficheInfos['HISTOIRE_FICHE']); ?>
            </article>
            <br><br><br>

            <!----------------TABLEAU DES VERSIONS-------------->
            <article class="article-fiche-title" id="technique">
                    <h1 class="h1-fiche">Versions</h1>
            </article>

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
                    echo '<td>' . htmlspecialchars($ligne['APPELLATION']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CARBURANT']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CONSTRUCTION_ANNEE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['NOM_MOTEUR']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CYLINDREE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['PERFORMANCE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['COUPLE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['ZERO_A_100']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['VMAX']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CONSOMMATION']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['CARROSSERIE']) . '</td>';
                    echo '<td>' . htmlspecialchars($ligne['MARCHE_CONTINENT']) . '</td>';
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

        $getInfosOfThisFicheReq = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
        $getInfosOfThisFicheReq->execute(array($fiche_id));

        $ficheInfos = $getInfosOfThisFicheReq->fetch();

        $getModele = $bdd->prepare('SELECT * FROM MODELE WHERE ID = ?');
        $getModele->execute(array($ficheInfos['ID_MODELE']));

        $modele = $getModele->fetch();

        if(!$ficheInfos){
                echo '<p class="errorFicheNonTrouvee">'."Erreur 10 : Fiche introuvable.".'</p>';
        }else{
                
                $getPhotos = $bdd->prepare('SELECT * FROM IMAGE WHERE ID_FICHE=?');
                $getPhotos->execute(array($fiche_id));

                $photo = $getPhotos->fetch();
                        
                        $getNomFiche = $bdd->prepare('SELECT * FROM FICHE WHERE ID = ?');
                        $getNomFiche->execute(array($fiche_id));
                        $nomFiche = $getNomFiche->fetch()

                        ?>
                        <br><br>
                        <article class="article-fiche-title-photos">
                                <h2 class="ficheTitreModelePhotos"><?= $nomFiche['NOM_FICHE']; ?></h2>
                        </article>
                        <br><br>
                        <br><br>

                        <?php
                        if($photo['IMAGE_URL']!=""){
                        ?>

                                <div class="img">
                                        <a target="_blank" onclick="currentSlide<?= $photo['ID_FICHE']; ?>(1)">
                                        <img src="../../library/voitures/<?= $modele['NOM_MODELE']; ?>/<?= $photo['ID_FICHE']; ?>/<?= $photo['IMAGE_URL']; ?>" alt=<?= $photo['IMAGE_URL']; ?> width="300" height="200">
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

<?php require '../includesHeaderFooter/includeFooter.php'; ?>