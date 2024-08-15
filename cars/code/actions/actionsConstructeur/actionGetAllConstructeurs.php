<?php
require('../actions/Database.php');

// Initialisation des variables d'erreur
$error = '';

// Recherche par constructeur automobile
if (isset($_GET['id_constructeur']) && !empty($_GET['id_constructeur']) &&
    !isset($_GET['id_pays']) && empty($_GET['id_pays']) &&
    !isset($_GET['id_groupe']) && empty($_GET['id_groupe']) &&
    !isset($_GET['id_annee']) && empty($_GET['id_annee'])) {

    $ids_constructeur = explode(",", $_GET['id_constructeur']);
    $cpt = 0;

    foreach ($ids_constructeur as $id) {
        $getAllFichesConstructeurs = $bdd->prepare('SELECT * FROM CONSTRUCTEUR WHERE ID_CONSTRUCTEUR = ? ORDER BY NOM_CONSTRUCTEUR');
        $getAllFichesConstructeurs->execute(array($id));

        if ($getAllFichesConstructeurs->rowCount() > 0) {
            $cpt++;
        }

        if (isset($error)) {
            echo '<p>' . $error . '</p>';
        }

        while ($ficheConstructeur = $getAllFichesConstructeurs->fetch()) {
            // Récupération du pays
            $getPays = $bdd->prepare('SELECT NOM_PAYS FROM PAYS WHERE ID_PAYS = ?');
            $getPays->execute(array($ficheConstructeur['ID_PAYS']));
            $pays = $getPays->fetch();

            // Récupération du groupe
            $getGroupe = $bdd->prepare('SELECT NOM_GROUPE FROM GROUPE WHERE ID_GROUPE = ?');
            $getGroupe->execute(array($ficheConstructeur['ID_GROUPE']));
            $groupe = $getGroupe->fetch();
            ?>

            <div class="column">
                <a href="pageVoitures.php?id_constructeur=<?= $ficheConstructeur['ID_CONSTRUCTEUR']; ?>">
                    <input type="image" class="voitures" src="../../library/img/<?= $ficheConstructeur['IMAGE_CONSTRUCTEUR']; ?>" />
                </a>
                <div class="text">
                    <p class="nomWidgetFiche">
                        <span class="spanNomConstructeur"><?= $pays['NOM_PAYS']; ?> </span> <?= $ficheConstructeur['NOM_CONSTRUCTEUR']; ?>
                        <span class="spanNomAnnee"><?= $groupe['NOM_GROUPE']; ?> </span>
                    </p>
                </div>
            </div>

            <?php
        }
    }

    if ($cpt == 0) {
        $error = "Aucune annonce n'a été trouvée.";
    }
} else {
    $getAllConstructeurs = $bdd->prepare('SELECT * FROM CONSTRUCTEUR ORDER BY NOM_CONSTRUCTEUR');
    $getAllConstructeurs->execute();
}
?>
