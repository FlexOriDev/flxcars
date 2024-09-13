<!DOCTYPE html>
<html lang="fr">
<?php
require('../actions/constant/paths.php');
?>
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf_8">
    <link href="../css/styleMenuDashboard.css" rel="stylesheet">
    <!-- Code factorisé des tris de colonnes -->
    <script src="../scripts/scriptDashboard/utils/column_function.js"></script>
    <script>
        var iconsDashboardDescendant = "<?= $iconsDashboardDescendant; ?>";
        var iconsDashboardAscendant = "<?= $iconsDashboardAscendant; ?>";
    </script>
</head>

<!--------------------------------------------CONTENT------------------------------------------------------>
<aside class="dashboard-sidebar">
    <nav class="dashboard-nav">
        <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
                <a  class="dashboard-nav-link-head">DASHBOARD</a>
                <ul class="dashboard-submenu">
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboard.php" class="dashboard-nav-link">GRAPHIQUES</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboard.php" class="dashboard-nav-link">INFORMATIONS</a></li>
                </ul>
                <a  class="dashboard-nav-link-head">VOITURES</a>
                <ul class="dashboard-submenu">
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardConstructeurs.php" class="dashboard-nav-link">CONSTRUCTEURS</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardTypes.php" class="dashboard-nav-link">TYPES</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardModeles.php" class="dashboard-nav-link">MODELES</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardSegments.php" class="dashboard-nav-link">SEGMENTS</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardGroupes.php" class="dashboard-nav-link">GROUPES</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardPays.php" class="dashboard-nav-link">PAYS</a></li>
                </ul>
            </li>
            <li class="dashboard-nav-item">
                <a class="dashboard-nav-link-head">FICHE</a>
                <ul class="dashboard-submenu">
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardFiches.php" class="dashboard-nav-link">FICHES</a></li>
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardVersions.php" class="dashboard-nav-link">VERSIONS</a></li>
                </ul>
            </li>
            <li class="dashboard-nav-item">
                <a class="dashboard-nav-link-head">UTILISATEURS</a>
                <ul class="dashboard-submenu">
                    <li class="dashboard-submenu-item"><a href="../pages/pageDashboardUtilisateurs.php" class="dashboard-nav-link">UTILISATEURS</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
