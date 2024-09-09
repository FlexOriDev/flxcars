<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardFiches/actionDashboardFiches.php');
require('../actions/constant/paths.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Fiches</title>
    <link href="../css/styleDashboardFiches.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="fiches" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Fiches</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher une fiche..." class="dashboard-search">
                </div>
                <table class="dashboard-table-fiches">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-modele">Modèle
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByModeleIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-constructeur">Constructeur
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByConstructeurIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-groupe">Groupe
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByGroupeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-type">Type
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByTypeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-segment">Segment
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortBySegmentIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-annee">Année début de production
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByAnneeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-annee-fin">Année fin de production
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByAnneeFinIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-user">Utilisateur
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByUserIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-date">Date
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByDateIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="fichesTable">
                    <?php
                    $getAllFiches = $bdd->query('
    SELECT FICHE.id, 
           FICHE.NOM_FICHE, 
           MODELE.NOM_MODELE AS modele_nom, 
           SEGMENT.NOM_SEGMENT AS segment_nom, 
           annee_debut.NOM_ANNEE AS annee_nom, 
           annee_fin.NOM_ANNEE AS annee_fin_nom, 
           UTILISATEUR.PSEUDO_UTILISATEUR AS user_nom, 
           FICHE.DATE_AJOUT
    FROM FICHE
    JOIN MODELE ON FICHE.ID_MODELE = MODELE.id
    JOIN SEGMENT ON FICHE.ID_SEGMENT = SEGMENT.id
    JOIN ANNEE AS annee_debut ON FICHE.ID_ANNEE_DEBUT = annee_debut.id
    JOIN ANNEE AS annee_fin ON FICHE.ID_ANNEE_FIN = annee_fin.id
    JOIN UTILISATEUR ON FICHE.ID_UTILISATEUR = UTILISATEUR.id
');

                    while ($fiche = $getAllFiches->fetch(PDO::FETCH_ASSOC)) {
                        // Préparer et exécuter la requête pour obtenir les types de la fiche
                        $stmt = $bdd->prepare('
                            SELECT TYPE.NOM_TYPE AS type_nom
                            FROM FICHE_TYPE
                            JOIN TYPE ON FICHE_TYPE.ID_TYPE = TYPE.id
                            WHERE FICHE_TYPE.ID_FICHE = :fiche_id
                        ');
                        $stmt->execute(['fiche_id' => $fiche['id']]);

                        // Récupérer tous les types
                        $types = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        $typesList = implode(', ', $types); // Convertir le tableau en une chaîne

                        // Préparer et exécuter la requête pour obtenir les constructeurs et leurs groupes
                        $stmtConst = $bdd->prepare('
                            SELECT CONSTRUCTEUR.NOM_CONSTRUCTEUR AS constructeur_nom, GROUPE.NOM_GROUPE AS groupe_nom
                            FROM FICHE_CONSTRUCTEUR
                            JOIN CONSTRUCTEUR ON FICHE_CONSTRUCTEUR.ID_CONSTRUCTEUR = CONSTRUCTEUR.ID
                            JOIN GROUPE ON CONSTRUCTEUR.ID_GROUPE = GROUPE.ID
                            WHERE FICHE_CONSTRUCTEUR.ID_FICHE = :fiche_id
                        ');
                        $stmtConst->execute(['fiche_id' => $fiche['id']]);

                        // Récupérer tous les constructeurs et groupes associés
                        $constructeurs = $stmtConst->fetchAll(PDO::FETCH_ASSOC);

                        // Préparer une liste formatée avec les constructeurs et leurs groupes
                        $constructeursList = [];
                        $groupesList = [];
                        foreach ($constructeurs as $constructeur) {
                            $constructeursList[] = $constructeur['constructeur_nom'];
                            $groupesList[] = $constructeur['groupe_nom'];
                        }
                        $constructeursStr = implode(', ', $constructeursList); // Convertir le tableau en une chaîne pour les constructeurs
                        $groupesStr = implode(', ', array_unique($groupesList)); // Convertir le tableau en une chaîne pour les groupes, sans doublons


                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($fiche['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name">' . htmlspecialchars($fiche['NOM_FICHE']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-modele">' . htmlspecialchars($fiche['modele_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-constructeur">' . htmlspecialchars($constructeursStr) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-groupe">' . htmlspecialchars($groupesStr) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-type">' . htmlspecialchars($typesList) . '</td>'; // Afficher les types concaténés
                        echo '<td class="dashboard-table-cell dashboard-table-segment">' . htmlspecialchars($fiche['segment_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-annee">' . htmlspecialchars($fiche['annee_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-annee-fin">' . htmlspecialchars($fiche['annee_fin_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-user">' . htmlspecialchars($fiche['user_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-date">' . htmlspecialchars($fiche['DATE_AJOUT']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardFiches.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($fiche['id']) . '">';
                        echo '<button type="submit" class="dashboard-delete-btn" name="delete">Supprimer</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>

                    </tbody>
                </table>
                <br><br><br><br><br>
            </div>
        </section>
    </main>
</div>
<script src="../scripts/scriptDashboard/dashboard_fiches/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_fiches/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_fiches/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>