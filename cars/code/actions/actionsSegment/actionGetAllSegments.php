<?php
require('../actions/Database.php');

    $getAllSegments = $bdd->prepare('SELECT * FROM SEGMENT ORDER BY NOM_SEGMENT');
    $getAllSegments->execute(array());