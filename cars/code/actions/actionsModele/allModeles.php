<?php
require('../actions/database.php');

    $getAllModeles = $bdd->prepare('SELECT * FROM modeles ORDER BY nom');
    $getAllModeles->execute(array());