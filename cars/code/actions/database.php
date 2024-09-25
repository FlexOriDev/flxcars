<?php
$host = 'sql103.infinityfree.com';  // Hôte fourni par InfinityFree
$db = 'if0_37380984_XXX';   // Nom de la base de données
$user = 'if0_37380984';    // Nom d'utilisateur MySQL
$pass = 'fUi8Xk5rhOgm';   // Mot de passe MySQL
$port = 3306;  // Port MySQL (facultatif)

try {
    // Connexion PDO avec host, dbname, charset et port
    $bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8;port=$port", $user, $pass);
    // Paramétrer PDO pour afficher les erreurs
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie !';  // Si la connexion fonctionne
} catch (Exception $e) {
    // Gestion des erreurs
    die('Erreur : ' . $e->getMessage());
}
?>
