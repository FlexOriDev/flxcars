<?php
require('../actions/database.php');

    $getAllAnnees = $bdd->prepare('SELECT * FROM annees ORDER BY id');
    $getAllAnnees->execute(array());