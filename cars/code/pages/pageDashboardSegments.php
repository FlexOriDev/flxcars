<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardSegments/actionDashboardSegments.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Segments</title>
    <link href="../css/styleDashboardSegments.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="segments" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Segments</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un segment..." class="dashboard-search">
                </div>
                <?php
                $getAllSegments = $bdd->prepare('SELECT * FROM SEGMENT ORDER BY NOM_SEGMENT');
                $getAllSegments->execute();
                ?>
                <!-- Formulaire pour ajouter un segment -->
                <form method="POST" action="pageDashboardSegments.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomSegment" placeholder="Nom du segment" class="dashboard-input" name="nom">
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterSegment" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-segments">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiches-count">Fiches Count
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByCountIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="segmentsTable">
                    <?php
                    $getAllSegments = $bdd->query('
                        SELECT SEGMENT.id, SEGMENT.NOM_SEGMENT, COUNT(FICHE.id) AS fiches_count
                        FROM SEGMENT
                        LEFT JOIN FICHE ON SEGMENT.id = FICHE.id_segment
                        GROUP BY SEGMENT.id, SEGMENT.NOM_SEGMENT
                        ORDER BY SEGMENT.NOM_SEGMENT;
                    ');

                    while ($segment = $getAllSegments->fetch()) {
                        echo '<tr class="dashboard-table-row" data-id="' . htmlspecialchars($segment['id']) . '">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($segment['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name editable" contenteditable="true" data-column="nom">' . htmlspecialchars($segment['NOM_SEGMENT']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($segment['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardSegments.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($segment['id']) . '">';
                        echo '<button type="submit" class="dashboard-delete-btn" name="delete" onclick="return confirmDelete(this);">Supprimer</button>';
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
<script src="../scripts/scriptDashboard/dashboard_segments/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_segments/column_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_segments/modif_tab.js"></script>
<script>
    function confirmDelete(button) {
        const row = button.closest('tr'); // Trouve la ligne correspondante
        const fichesCount = parseInt(row.querySelector('.dashboard-table-fiches-count').textContent); // Récupère la valeur de fiches_count

        if (fichesCount > 0) {
            alert('Vous ne pouvez pas supprimer cette ligne car elle contient des fiches.');
            return false;
        }
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>
