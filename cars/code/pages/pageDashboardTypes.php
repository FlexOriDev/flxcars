<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardTypes/actionDashboardTypes.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Types</title>
    <link href="../css/styleDashboardTypes.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="types" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Types</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un type..." class="dashboard-search">
                </div>
                <?php
                $getAllPays = $bdd->prepare('SELECT * FROM types ORDER BY nom');
                $getAllPays->execute();

                ?>
                <form method="POST" action="pageDashboardTypes.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomType" placeholder="Nom du type" class="dashboard-input" name="nom">
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterType" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-types">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiches-count">Fiches Count</th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="typesTable">
                    <?php
                    $getAllTypes = $bdd->query('
                        SELECT types.id, types.nom, COUNT(fiches.id) AS fiches_count
                        FROM types
                        LEFT JOIN fiches ON types.id = fiches.id_type
                        GROUP BY types.id, types.nom
                        ORDER BY types.nom;
                    ');

                    while ($type = $getAllTypes->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($type['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name">' . htmlspecialchars($type['nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($type['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardModeles.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($type['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_types/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_types/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_types/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>