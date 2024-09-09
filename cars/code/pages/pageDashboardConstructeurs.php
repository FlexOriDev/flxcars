<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardConstructeurs/actionDashboardConstructeurs.php');
require('../actions/constant/paths.php');
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
                $getAllPays = $bdd->prepare('SELECT * FROM PAYS ORDER BY NOM_PAYS');
                $getAllPays->execute();

                $getAllGroupes = $bdd->prepare('SELECT * FROM GROUPE ORDER BY NOM_GROUPE');
                $getAllGroupes->execute();
                ?>
                <form method="POST" action="pageDashboardConstructeurs.php">
                    <div class="dashboard-add-container">
                        <input type="text" id="nomConstructeur" placeholder="Nom du constructeur" class="dashboard-input" name="nom">
                        <select id="paysConstructeur" class="dashboard-select" name="pays">
                            <option value="">Sélectionner un pays</option>
                            <?php foreach ($getAllPays as $pays): ?>
                                <option value="<?= htmlspecialchars($pays['ID']) ?>"><?= htmlspecialchars($pays['NOM_PAYS']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="groupeConstructeur" class="dashboard-select" name="groupe">
                            <option value="">Sélectionner un groupe</option>
                            <?php foreach ($getAllGroupes as $groupe): ?>
                                <option value="<?= htmlspecialchars($groupe['ID']) ?>"><?= htmlspecialchars($groupe['NOM_GROUPE']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Ajouter" class="dashboard-btn" id="ajouterConstructeur" name="validate">
                    </div>
                </form>
                <table class="dashboard-table-constructeurs">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-pays">Pays
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByPaysIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-group">Groupe
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByGroupIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiches-count">Fiches Count
                            <img src="<?= $iconsDashboardDescendant;?>" alt="Ascendant" id="sortByCountIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="constructeursTable">
                    <?php
                    $getAllConstructeurs = $bdd->query('
                        SELECT CONSTRUCTEUR.id, 
                           CONSTRUCTEUR.NOM_CONSTRUCTEUR, 
                           PAYS.NOM_PAYS AS pays_nom, 
                           GROUPE.NOM_GROUPE AS groupe_nom, 
                           COUNT(FICHE.id) AS fiches_count
                        FROM CONSTRUCTEUR
                        -- LEFT JOIN pour récupérer tous les constructeurs, même ceux sans fiche
                        LEFT JOIN FICHE_CONSTRUCTEUR ON CONSTRUCTEUR.ID = FICHE_CONSTRUCTEUR.ID_CONSTRUCTEUR
                        LEFT JOIN FICHE ON FICHE.id = FICHE_CONSTRUCTEUR.ID_FICHE
                        JOIN PAYS ON CONSTRUCTEUR.ID_PAYS = PAYS.id
                        JOIN GROUPE ON CONSTRUCTEUR.id_groupe = GROUPE.id
                        GROUP BY CONSTRUCTEUR.id
                        ORDER BY CONSTRUCTEUR.NOM_CONSTRUCTEUR;
                    ');

                    while ($constructeur = $getAllConstructeurs->fetch()) {
                        echo '<tr class="dashboard-table-row" data-id="' . htmlspecialchars($constructeur['id']) . '">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($constructeur['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name editable" contenteditable="true" data-column="nom">' . htmlspecialchars($constructeur['NOM_CONSTRUCTEUR']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-pays">' . htmlspecialchars($constructeur['pays_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-group">' . htmlspecialchars($constructeur['groupe_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($constructeur['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardConstructeurs.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($constructeur['id']) . '">';
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
<script src="../scripts/constant/paths.js"></script>
<script src="../scripts/scriptDashboard/dashboard_constructeurs/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_constructeurs/column_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_constructeurs/modif_tab.js"></script>
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