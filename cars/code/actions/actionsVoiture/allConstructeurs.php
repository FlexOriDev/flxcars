<?php
require('../actions/database.php');

    $getAllConstructeurs = $bdd->prepare('SELECT * FROM constructeurs ORDER BY id');
    $getAllConstructeurs->execute(array());