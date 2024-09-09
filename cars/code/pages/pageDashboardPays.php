<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardPays/actionDashboardPays.php');
require('../actions/constant/paths.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Pays</title>
    <link href="../css/styleDashboardPays.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="pays" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Pays</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un pays..." class="dashboard-search">
                </div>
                <?php
                $getAllPays = $bdd->prepare('SELECT * FROM PAYS ORDER BY NOM_PAYS');
                $getAllPays->execute();

                ?>
                <form method="POST" action="pageDashboardPays.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomPays" placeholder="Nom du pays" class="dashboard-input" name="nom">
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterPays" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-pays">
                    <thead>
                    <th class="dashboard-table-header dashboard-table-id">
                        ID
                        <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                    </th>
                    <th class="dashboard-table-header dashboard-table-name">
                        Nom
                        <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                    </th>
                    <th class="dashboard-table-header dashboard-table-fiches-count">
                        Fiches Count
                        <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCountIcon" style="width: 16px; height: 16px;">
                    </th>

                    </thead>
                    <tbody id="paysTable">
                    <?php
                    $getAllPays = $bdd->query('
                        SELECT PAYS.id, PAYS.NOM_PAYS, COUNT(DISTINCT FICHE_CONSTRUCTEUR.ID_FICHE) AS fiches_count
                        FROM PAYS
                        LEFT JOIN CONSTRUCTEUR ON PAYS.id = CONSTRUCTEUR.ID_PAYS
                        LEFT JOIN FICHE_CONSTRUCTEUR ON CONSTRUCTEUR.id = FICHE_CONSTRUCTEUR.ID_CONSTRUCTEUR
                        GROUP BY PAYS.id, PAYS.NOM_PAYS
                        ORDER BY PAYS.NOM_PAYS;
                    ');


                    while ($pays = $getAllPays->fetch()) {
                        echo '<tr class="dashboard-table-row" data-id="' . htmlspecialchars($pays['id']) . '">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($pays['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name editable" contenteditable="true" data-column="nom">' . htmlspecialchars($pays['NOM_PAYS']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($pays['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardPays.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($pays['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_pays/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_pays/column_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_pays/modif_tab.js"></script>
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