<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsDashboard/actionsDashboardUtilisateurs/actionDashboardUtilisateurs.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Dashboard - Utilisateurs</title>
    <link href="../css/styleDashboardUtilisateurs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<body class="dashboard-body">
<div class="dashboard-container">
    <?php include '../includesHeaderFooter/includeMenuDashboard.php'; ?>
    <main class="dashboard-main">
        <section id="utilisateurs" class="dashboard-section">
            <div class="dashboard-table-container">
                <div class="dashboard-header">
                    <h3 class="dashboard-subtitle">Utilisateurs</h3>
                    <input type="text" id="searchInput" placeholder="Rechercher un utilisateur..." class="dashboard-search">
                </div>
                <table class="dashboard-table-utilisateurs">
                    <thead>
                    <tr>
                        <th class="dashboard-table-header dashboard-table-id" id="sortById">ID
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByIdIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-pseudo">Pseudo
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByPseudoIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-prenom">Prénom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByPrenomIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-nom">Nom
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByNomIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-mail">E-mail
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByMailIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-role">Role
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByRoleIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-fiches-count">Fiches Count
                            <img src="../../library/iconsDashboard/descendant.png" alt="Ascendant" id="sortByCountIcon" style="width: 16px; height: 16px;">
                        </th>
                        <th class="dashboard-table-header dashboard-table-actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="utilisateursTable">
                    <?php
                    $getAllUtilisateurs = $bdd->query('
                        SELECT utilisateurs.id, utilisateurs.pseudo, utilisateurs.prenom, utilisateurs.nom, utilisateurs.mail, utilisateurs.role, COUNT(fiches.id_user) AS fiches_count
                        FROM users as utilisateurs
                        LEFT JOIN fiches ON utilisateurs.id = fiches.id_user
                        GROUP BY utilisateurs.id
                        ORDER BY utilisateurs.nom
                    ');

                    while ($utilisateur = $getAllUtilisateurs->fetch()) {
                        echo '<tr class="dashboard-table-row">';
                        echo '<td class="dashboard-table-cell dashboard-table-id">' . htmlspecialchars($utilisateur['id']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-pseudo">' . htmlspecialchars($utilisateur['pseudo']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-prenom">' . htmlspecialchars($utilisateur['prenom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-nom">' . htmlspecialchars($utilisateur['nom']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-mail">' . htmlspecialchars($utilisateur['mail']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-role">' . htmlspecialchars($utilisateur['role']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-fiches-count">' . htmlspecialchars($utilisateur['fiches_count']) . '</td>';
                        echo '<td class="dashboard-table-cell dashboard-table-actions">';
                        echo '<form method="POST" action="pageDashboardUtilisateurs.php" onsubmit="return confirmDelete();">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($utilisateur['id']) . '">';
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
<script src="../scripts/scriptDashboard/dashboard_utilisateurs/search_pays_and_group.js"></script>
<script src="../scripts/scriptDashboard/dashboard_utilisateurs/search_filter.js"></script>
<script src="../scripts/scriptDashboard/dashboard_utilisateurs/column_filter.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette ligne ?');
    }
</script>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
</body>
</html>