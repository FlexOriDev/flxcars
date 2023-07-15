<?php
require('../actions/database.php');

    $getAllTypes = $bdd->prepare('SELECT * FROM types ORDER BY nom');
    $getAllTypes->execute(array());