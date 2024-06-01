<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardModeles/actionDashboardModeles.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Modèles</title>
    <link href="../css/styleDashboardModeles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="modeles" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Modeles</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un modèle..." class="dashboard-search">
                </div>
                <?php
                $getAllConstructeurs = $bdd->prepare('SELECT * FROM constructeurs ORDER BY nom');
                $getAllConstructeurs->execute();

                ?>
                <form method="POST" action="pageDashboardModeles.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomModele" placeholder="Nom du modèle" class="dashboard-input" name="nom">
                        <select id="constructeurType" class="dashboard-select" name="constructeur">
                            <option value="">Sélectionner un constructeur</option>
                            <?php foreach ($getAllConstructeurs as $constructeur): ?>
                                <option value="<?= htmlspecialchars($constructeur['id']) ?>"><?= htmlspecialchars($constructeur['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterModele" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-modeles">
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
                    <tbody id="modelesTable">
                    <?php
                    $getAllModeles = $bdd->query('
                        SELECT modeles.id, modeles.nom, COUNT(fiches.id) AS fiches_count
                        FROM modeles
                        LEFT JOIN fiches ON modeles.id = fiches.id_modele
                        GROUP BY modeles.id, modeles.nom
                        ORDER BY modeles.nom;
                    ');

                    while ($modele = $getAllModeles->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($modele['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name">' . htmlspecialchars($modele['nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($modele['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardModeles.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($modele['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_modeles/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_modeles/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_modeles/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>