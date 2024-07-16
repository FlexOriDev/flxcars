<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardFiches/actionDashboardFiches.php');
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
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-name">Nom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByNameIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-modele">Modèle
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByModeleIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-constructeur">Constructeur
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByConstructeurIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-groupe">Groupe
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByGroupeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-type">Type
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByTypeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-segment">Segment
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortBySegmentIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-annee">Année début de production
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByAnneeIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-annee-fin">Année fin de production
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByAnneeFinIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-user">Utilisateur
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByUserIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-date">Date
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByDateIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="fichesTable">
                    <?php
                    $getAllFiches = $bdd->query('
                        SELECT fiches.id, 
       fiches.nom, 
       modeles.nom AS modele_nom, 
       constructeurs.nom AS constructeur_nom, 
       groupes_constructeurs.nom AS groupe_nom, 
       types.nom AS type_nom, 
       segments.nom AS segment_nom, 
       annee_debut.nom AS annee_nom, 
       annee_fin.nom AS annee_fin_nom, 
       users.nom AS user_nom, 
       fiches.date
FROM fiches
JOIN modeles ON fiches.id_modele = modeles.id
JOIN constructeurs ON fiches.id_constructeur = constructeurs.id
JOIN groupes AS groupes_constructeurs ON constructeurs.id_groupe = groupes_constructeurs.id
JOIN types ON fiches.id_type = types.id
JOIN segments ON fiches.id_segment = segments.id
JOIN annees AS annee_debut ON fiches.id_annee = annee_debut.id
JOIN annees AS annee_fin ON fiches.id_annee_fin = annee_fin.id
JOIN users ON fiches.id_user = users.id
GROUP BY fiches.id, 
         fiches.nom, 
         modeles.nom, 
         constructeurs.nom, 
         groupes_constructeurs.nom, 
         types.nom, 
         segments.nom, 
         annee_debut.nom, 
         annee_fin.nom, 
         users.nom, 
         fiches.date
ORDER BY fiches.nom;
');

                    while ($fiche = $getAllFiches->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($fiche['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-name">' . htmlspecialchars($fiche['nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-modele">' . htmlspecialchars($fiche['modele_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-constructeur">' . htmlspecialchars($fiche['constructeur_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-groupe">' . htmlspecialchars($fiche['groupe_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-type">' . htmlspecialchars($fiche['type_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-segment">' . htmlspecialchars($fiche['segment_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-annee">' . htmlspecialchars($fiche['annee_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-annee-fin">' . htmlspecialchars($fiche['annee_fin_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-user">' . htmlspecialchars($fiche['user_nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-date">' . htmlspecialchars($fiche['date']) . '</td>';
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
</body>
</html>