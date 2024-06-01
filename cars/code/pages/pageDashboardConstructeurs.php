<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardConstructeurs/actionDashboardConstructeurs.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Constructeurs</title>
    <link href="../css/styleDashboardConstructeurs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="constructeurs" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Constructeurs</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un constructeur..." class="dashboard-search">
                </div>
                <?php
                $getAllPays = $bdd->prepare('SELECT * FROM pays ORDER BY nom');
                $getAllPays->execute();

                $getAllGroupes = $bdd->prepare('SELECT * FROM groupes ORDER BY nom');
                $getAllGroupes->execute();
                ?>
                <form method="POST" action="pageDashboardConstructeurs.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomConstructeur" placeholder="Nom du constructeur" class="dashboard-input" name="nom">
                        <select id="paysConstructeur" class="dashboard-select" name="pays">
                            <option value="">Sélectionner un pays</option>
                            <?php foreach ($getAllPays as $pays): ?>
                                <option value="<?= htmlspecialchars($pays['id']) ?>"><?= htmlspecialchars($pays['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="groupeConstructeur" class="dashboard-select" name="groupe">
                            <option value="">Sélectionner un groupe</option>
                            <?php foreach ($getAllGroupes as $groupe): ?>
                                <option value="<?= htmlspecialchars($groupe['id']) ?>"><?= htmlspecialchars($groupe['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterConstructeur" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-constructeurs">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-pays">Pays
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByPaysIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-group">Groupe
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByGroupIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiches-count">Fiches Count</th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="constructeursTable">
                    <?php
                    $getAllConstructeurs = $bdd->query('
                        SELECT constructeurs.id, constructeurs.nom, pays.nom AS pays_nom, groupes.nom AS groupe_nom, COUNT(fiches.id) AS fiches_count
                        FROM constructeurs
                        JOIN pays ON constructeurs.id_pays = pays.id
                        JOIN groupes ON constructeurs.id_groupe = groupes.id
                        LEFT JOIN fiches ON constructeurs.id = fiches.id_constructeur
                        GROUP BY constructeurs.id
                        ORDER BY constructeurs.nom
                    ');

                    while ($constructeur = $getAllConstructeurs->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($constructeur['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name">' . htmlspecialchars($constructeur['nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-pays">' . htmlspecialchars($constructeur['pays_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-group">' . htmlspecialchars($constructeur['groupe_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($constructeur['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardConstructeurs.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($constructeur['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_constructeurs/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_constructeurs/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_constructeurs/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>