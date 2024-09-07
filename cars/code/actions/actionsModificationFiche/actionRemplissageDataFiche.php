<?php
if (session_id() == '') {
    session_start();
}
// Connexion à la base de données
require('../actions/database.php');

$idHasFiche = false;

// Vérifier si le paramètre id_fiche est passé dans l'URL
if (isset($_GET['id_fiche'])) {
    $idHasFiche = true;

    //-------------------------------FICHE------------------------------------//

    // Récupérer l'id_fiche depuis l'URL
    $idFiche = intval($_GET['id_fiche']); // Convertir en entier pour plus de sécurité

    // Préparer la requête SQL
    $sql = "SELECT * FROM FICHE WHERE ID = :id_fiche";
    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':id_fiche', $idFiche, PDO::PARAM_INT);
    $stmt->execute();

    $fiche = $stmt->fetch(PDO::FETCH_ASSOC);

    //-------------------------------TYPE------------------------------------//

    $sql = "SELECT ID_TYPE FROM fiche_type WHERE ID_FICHE = :id_fiche";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_fiche', $idFiche, PDO::PARAM_INT);
    $stmt->execute();
    $associatedTypeIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Récupérer tous les types disponibles
    $sql = "SELECT * FROM type ORDER BY NOM_TYPE";
    $getAllTypes = $bdd->query($sql);
    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

    //-------------------------------ANNEE_DEBUT------------------------------------//
    // Récupérer toutes les années disponibles
    $sql = "SELECT * FROM ANNEE ORDER BY NOM_ANNEE DESC";
    $getAllAnnees = $bdd->query($sql);
    $annees = $getAllAnnees->fetchAll(PDO::FETCH_ASSOC);

    // Valeur sélectionnée pour l'année
    $selectedAnnee = $fiche['ID_ANNEE_DEBUT']; // Assurez-vous que cette colonne existe dans la table FICHE

    //-------------------------------ANNEE_FIN------------------------------------//
    // Récupérer toutes les années disponibles
    $sql = "SELECT * FROM ANNEE ORDER BY NOM_ANNEE DESC";
    $getAllAnnees = $bdd->query($sql);
    $annees = $getAllAnnees->fetchAll(PDO::FETCH_ASSOC);

    // Valeur sélectionnée pour l'année
    $selectedAnneeFin = $fiche['ID_ANNEE_FIN']; // Assurez-vous que cette colonne existe dans la table FICHE

    //-------------------------------MODELE------------------------------------//
    $sql = "SELECT * FROM MODELE ORDER BY NOM_MODELE";
    $getAllModeles = $bdd->query($sql);
    $modeles = $getAllModeles->fetchAll(PDO::FETCH_ASSOC);

    // Valeur sélectionnée pour le modèle
    $selectedModele = $fiche['ID_MODELE']; // Assurez-vous que cette colonne existe dans la table FICHE

    //-------------------------------SEGMENT------------------------------------//
    $sql = "SELECT * FROM SEGMENT ORDER BY NOM_SEGMENT";
    $getAllSegments = $bdd->query($sql);
    $segments = $getAllSegments->fetchAll(PDO::FETCH_ASSOC);

    // Valeur sélectionnée pour le modèle
    $selectedSegment = $fiche['ID_SEGMENT']; // Assurez-vous que cette colonne existe dans la table FICHE

    //-------------------------------CONSTRUCTEURS------------------------------------//

    $sql = "SELECT ID_CONSTRUCTEUR FROM fiche_CONSTRUCTEUR WHERE ID_FICHE = :id_fiche";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_fiche', $idFiche, PDO::PARAM_INT);
    $stmt->execute();
    $associatedConstructeurIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Récupérer tous les types disponibles
    $sql = "SELECT * FROM constructeur ORDER BY NOM_CONSTRUCTEUR";
    $getAllConstructeurs = $bdd->query($sql);
    $constructeurs = $getAllConstructeurs->fetchAll(PDO::FETCH_ASSOC);

    //-------------------------------GENERATION------------------------------------//
    $sql = "SELECT * FROM GENERATION ORDER BY NOM_GENERATION";
    $getAllGenerations = $bdd->query($sql);
    $generations = $getAllGenerations->fetchAll(PDO::FETCH_ASSOC);

    // Valeur sélectionnée pour le modèle
    $selectedGeneration = $fiche['ID_GENERATION']; // Assurez-vous que cette colonne existe dans la table FICHE

    //-------------------------------VERSIONS------------------------------------//
    $sql = "SELECT * FROM VERSION WHERE ID_FICHE = :id_fiche";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_fiche', $idFiche, PDO::PARAM_INT);
    $stmt->execute();
    $versions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //-------------------------------IMAGES------------------------------------//
    $sqlImages = "SELECT * FROM image WHERE ID_FICHE = :id_fiche ORDER BY ORDRE ASC";
    $stmtImages = $bdd->prepare($sqlImages);
    $stmtImages->bindParam(':id_fiche', $idFiche, PDO::PARAM_INT);
    $stmtImages->execute();
    $images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT NOM_MODELE FROM MODELE WHERE ID = :id_modele";
    $stmtModele = $bdd->prepare($sql);
    $stmtModele->bindParam(':id_modele', $selectedModele, PDO::PARAM_INT);
    $stmtModele->execute();
    $modeleNomResult = $stmtModele->fetch(PDO::FETCH_ASSOC);




}else{
    echo '<p class="modification-pas-de-fiche">Pas de fiche trouvée.</p>';
}

