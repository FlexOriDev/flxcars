<?php
require('../actions/Database.php');

    $getAllSegments = $bdd->prepare('SELECT * FROM segments ORDER BY nom');
    $getAllSegments->execute(array());