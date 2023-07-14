<?php
require('../actions/database.php');

    $getAllConstructeurs = $bdd->prepare('SELECT * FROM constructeurs ORDER BY nom');
    $getAllConstructeurs->execute(array());