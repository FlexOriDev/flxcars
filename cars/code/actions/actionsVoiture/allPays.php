<?php
require('../actions/database.php');

    $getAllPays = $bdd->prepare('SELECT * FROM pays ORDER BY nom');
    $getAllPays->execute(array());