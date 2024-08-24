<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
?>
<!DOCTYPE html>
<html lang="fr">
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">
    <title>Modifier une fiche</title>
    <link href="../css/styleModifierFiche.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>

<main>
<article id="article-1">
    <h1>Modifier une fiche</h1>
</article>

<br>

<!-- Conteneur pour la barre de recherche et le tableau -->
<div class="container">

    <!-- Barre de recherche -->
    <input type="text" id="searchBar" placeholder="Rechercher une fiche ou un constructeur...">

    <!-- Requete fiches + constructeurs-->
    <?php
    $sql = "SELECT FICHE.ID, FICHE.NOM_FICHE, CONSTRUCTEUR.NOM_CONSTRUCTEUR FROM FICHE JOIN CONSTRUCTEUR ON FICHE.ID_CONSTRUCTEUR = CONSTRUCTEUR.ID";
    $getFiches = $bdd->prepare($sql);
    $getFiches->execute();

    $fiches = $getFiches->fetchAll(PDO::FETCH_ASSOC);

    if ($fiches && count($fiches) > 0) {
        echo '<table id="ficheTable">';  // Ajoutez un id au tableau ici
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nom Fiche</th>';
        echo '<th>Constructeur</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($fiches as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['NOM_FICHE']) . '</td>';
            echo '<td>' . htmlspecialchars($row['NOM_CONSTRUCTEUR']) . '</td>';
            echo '<td><a href="pageModificationFiche.php?id_fiche=' . urlencode($row['ID']) . '" class="btn btn-primary">Modifier</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Aucune fiche trouvée.</p>';
    }
    ?>
</div>
<br><br><br><br><br><br><br>

</main>

<!--------------------------------------------SCRIPTS------------------------------------------------------>
<script src="../scripts/scriptModifierFiche/search.js"></script>

<!--------------------------------------------FOOTER------------------------------------------------------>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
