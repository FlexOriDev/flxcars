<?php
require('../actions/database.php');

    $getAllAnnees = $bdd->prepare('SELECT * FROM annees ORDER BY nom DESC');
    $getAllAnnees->execute(array());