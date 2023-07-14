<?php
require('../actions/database.php');

    $getAllGroupes = $bdd->prepare('SELECT * FROM groupes ORDER BY nom');
    $getAllGroupes->execute(array());