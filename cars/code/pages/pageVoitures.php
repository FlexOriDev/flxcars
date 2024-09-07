<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Voitures</title><!--Titre de la page web-->
    <link href="../css/styleVoitures.css" rel="stylesheet">
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->
<?php 
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
?>

<!----------PATH---------->
<div class="global-pathButtons">
        <a href="pageIndex.php" class="global-boutonPath">Accueil</a>
        <a class="global-boutonPathActual">/Voitures</a>
</div>

<!---------------------------------------------MAIN----------------------------------------------------->
<main>

<!-----------------------PARTIE FORMS------------------------>
    <div class="header-voitures">
        <div class="search-container">
            <input type="text" placeholder="Rechercher..." class="search-box" id="searchInput" onkeydown="handleSearch(event)">
            <button class="search-button" onclick="search()">Rechercher</button>
            <script src="../scripts/scriptVoitures/filter_search.js"></script>
            <button class="filters-button" onclick="toggleSideMenu()" id="toggleButton">Plus de filtres</button>
            <button class="clear-filters-button" onclick="clearFilters()" id="clearFiltersButton" title="Effacer tous les filtres">✕</button>
        </div>

        <div class="dropdown" id="dropdown">
            <button onclick="toggleDropdown()" class="tri-button">Trier par</button>
            <div id="dropdown-content-sort" class="dropdown-content-sort">
                <a href="#" onclick="redirectToSortedURL('alphabetique_asc')">ordre alphabétique croissant</a>
                <a href="#" onclick="redirectToSortedURL('alphabetique_desc')">ordre alphabétique décroissant</a>
                <a href="#" onclick="redirectToSortedURL('annee_asc')">année croissante</a>
                <a href="#" onclick="redirectToSortedURL('annee_desc')">année décroissante</a>
            </div>
            <script src="../scripts/scriptVoitures/filter_sort.js"></script>
        </div>

    </div>
    <!-- Menu latéral des filtres -->
    <div class="side-menu" id="sideMenu">
            <div class="filter-section">
            <h2>Filtres</h2>

            <div class="dropdown-checkboxes">
                <button onclick="toggleConstructeurDropdown()" class="dropdown-btn-constructeur">Constructeurs</button>
                <!-- Champ de recherche -->
                <input type="text" id="searchConstructeur" placeholder="Rechercher un constructeur..." onkeyup="filterConstructeurs()">
                <!-- Liste déroulante des constructeurs avec cases à cocher -->
                <div id="constructeurDropdown" class="dropdown-content-constructeurs">
                    <!-- Options pour les constructeurs avec cases à cocher -->
                    <?php
                    $getAllConstructeurs = $bdd->query('SELECT * FROM CONSTRUCTEUR ORDER BY NOM_CONSTRUCTEUR');
                    while ($constructeur = $getAllConstructeurs->fetch(PDO::FETCH_ASSOC)) {
                        echo '<label class="checkbox-label"><input class="input-checkbox-filtres" type="checkbox" value="'.$constructeur['ID'].'"> '.$constructeur['NOM_CONSTRUCTEUR'].'</label>';
                    }
                    ?>
                </div>
            </div>
            <div class="dropdown-checkboxes move-down-constructeur">
                <button onclick="toggleTypeDropdown()" class="dropdown-btn-type">Types</button>
                <!-- Champ de recherche -->
                <input type="text" id="searchType" placeholder="Rechercher un type..." onkeyup="filterTypes()">
                <!-- Liste déroulante des constructeurs avec cases à cocher -->
                <div id="typeDropdown" class="dropdown-content-types">
                    <!-- Options pour les constructeurs avec cases à cocher -->
                    <?php
                    $getAllTypes = $bdd->query('SELECT * FROM TYPE ORDER BY NOM_TYPE');
                    while ($type = $getAllTypes->fetch(PDO::FETCH_ASSOC)) {
                        echo '<label class="checkbox-label">
                                <input class="input-checkbox-filtres" type="checkbox" value="'.$type['ID'].'">
                                '.$type['NOM_TYPE'].'
                              </label>';
                    }
                    ?>
                </div>
            </div>
            <div class="dropdown-checkboxes move-down-constructeur move-down-type">
                <button onclick="toggleModeleDropdown()" class="dropdown-btn-modele">Modèles</button>
                <!-- Champ de recherche -->
                <input type="text" id="searchModele" placeholder="Rechercher un modèle..." onkeyup="filterModeles()">
                <!-- Liste déroulante des constructeurs avec cases à cocher -->
                <div id="modeleDropdown" class="dropdown-content-modeles">
                    <!-- Options pour les constructeurs avec cases à cocher -->
                    <?php
                    $getAllModeles = $bdd->query('SELECT * FROM MODELE ORDER BY NOM_MODELE');
                    while ($modele = $getAllModeles->fetch(PDO::FETCH_ASSOC)) {
                        echo '<label class="checkbox-label"><input class="input-checkbox-filtres"  type="checkbox" value="'.$modele['ID'].'"> '.$modele['NOM_MODELE'].'</label>';
                    }
                    ?>
                </div>
            </div>
            <div class="dropdown-checkboxes move-down-constructeur move-down-type move-down-modele">
                <button onclick="toggleSegmentDropdown()" class="dropdown-btn-segment">Segments</button>
                <!-- Champ de recherche -->
                <input type="text" id="searchSegment" placeholder="Rechercher un segment..." onkeyup="filterSegments()">
                <!-- Liste déroulante des constructeurs avec cases à cocher -->
                <div id="segmentDropdown" class="dropdown-content-segments">
                    <!-- Options pour les constructeurs avec cases à cocher -->
                    <?php
                    $getAllSegments = $bdd->query('SELECT * FROM SEGMENT ORDER BY NOM_SEGMENT');
                    while ($segment = $getAllSegments->fetch(PDO::FETCH_ASSOC)) {
                        echo '<label class="checkbox-label"><input class="input-checkbox-filtres"  type="checkbox" value="'.$segment['ID'].'"> '.$segment['NOM_SEGMENT'].'</label>';
                    }
                    ?>
                </div>
            </div>
            <div class="dropdown-checkboxes move-down-constructeur move-down-type move-down-modele move-down-segment">
                <button onclick="toggleAnneeDropdown()" class="dropdown-btn-annee">Annees</button>
                <!-- Champ de recherche -->
                <input type="text" id="searchAnnee" placeholder="Rechercher une décennie..." onkeyup="filterAnnees()">
                <!-- Liste déroulante des constructeurs avec cases à cocher -->
                <div id="anneeDropdown" class="dropdown-content-annees">
                    <!-- Options pour les constructeurs avec cases à cocher -->
                    <?php
                    $getAllAnnees = $bdd->query('SELECT * FROM ANNEE_TRANCHE ORDER BY NOM_ANNEE_TRANCHE DESC ');
                    while ($annee = $getAllAnnees->fetch(PDO::FETCH_ASSOC)) {
                        echo '<label class="checkbox-label"><input class="input-checkbox-filtres"  type="checkbox" value="'.$annee['ID'].'"> '.$annee['NOM_ANNEE_TRANCHE'].'</label>';
                    }
                    ?>
                </div>
            </div>

            <!-- Bouton pour appliquer les filtres -->
            <button onclick="applyFilters()" class="appliquer_filtres move-down-annee move-down-constructeur move-down-type move-down-modele move-down-segment">Appliquer</button>
        </div>
    </div>

    <script src="../scripts/scriptVoitures/filter_side_menu.js"></script>




    <!-----------------------AFFICHAGE VOITURES------------------------>


<?php
include("../actions/actionsVoiture/actionGetAllFiches.php");
if (isset($error)) {
    echo '<br><p class="aucune-fiche-trouvee">' . $error . '</p>';
}
?>

</main>

<?php require '../includesHeaderFooter/includeFooter.php'; ?>