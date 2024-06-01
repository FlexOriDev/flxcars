<?php
require('../actions/database.php');

    $getAllSegments = $bdd->prepare('SELECT * FROM segments ORDER BY nom');
    $getAllSegments->execute(array());