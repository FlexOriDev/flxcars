<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardVersions/actionDashboardVersions.php');
require('../actions/constant/paths.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Versions</title>
    <link href="../css/styleDashboardVersions.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="versions" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Versions</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher une version..." class="dashboard-search">
                </div>
                <table class="dashboard-table-versions">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiche">Fiche
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByFicheIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-appellation">Appellation
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByAppellationIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-carburant">Carburant
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCarburantIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-construction">Construction
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByConstructionIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-moteur">Moteur
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByMoteurIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-cylindree">Cylindrée
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCylindreetIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-performance">Performance
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByPerformanceIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-couple">Couple
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCoupleFinIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-zero_to_hundred">0 à 100 km/h
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByZeroToHundredIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-vmax">V-MAX
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByVmaxIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-conso">Consommation
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByConsommationIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-carrosserie">Carrosserie
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCarrosserieIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-marche">Marché
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByMarcheIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="versionsTable">
                    <?php
                    $getAllVersions = $bdd->query('
                        SELECT versions.id, 
                       FICHE.NOM_FICHE as fiche, 
                       versions.id_fiche, 
                       versions.APPELLATION AS appellation, 
                       versions.CARBURANT AS carburant, 
                       versions.CONSTRUCTION_ANNEE AS construction, 
                       versions.NOM_MOTEUR AS moteur,
                       versions.CYLINDREE AS cylindree,
                       versions.PERFORMANCE AS performance,
                       versions.COUPLE AS couple,
                       versions.ZERO_A_100 AS zero_to_hundred,
                       versions.VMAX AS vmax,
                       versions.CONSOMMATION AS conso,
                       versions.CARROSSERIE AS carrosserie,
                       versions.MARCHE_CONTINENT AS marche
                    FROM VERSION as versions
                    JOIN FICHE ON FICHE.id = versions.id_fiche
                    ORDER BY FICHE.NOM_FICHE;
');

                    while ($version = $getAllVersions->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($version['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiche">' . htmlspecialchars($version['fiche']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-appellation">' . htmlspecialchars($version['appellation']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-carburant">' . htmlspecialchars($version['carburant']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-construction">' . htmlspecialchars($version['construction']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-moteur">' . htmlspecialchars($version['moteur']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-cylindree">' . htmlspecialchars($version['cylindree']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-performance">' . htmlspecialchars($version['performance']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-couple">' . htmlspecialchars($version['couple']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-zero_to_hundred">' . htmlspecialchars($version['zero_to_hundred']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-vmax">' . htmlspecialchars($version['vmax']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-conso">' . htmlspecialchars($version['conso']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-carrosserie">' . htmlspecialchars($version['carrosserie']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-marche">' . htmlspecialchars($version['marche']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardVersions.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($version['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_versions/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_versions/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_versions/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>