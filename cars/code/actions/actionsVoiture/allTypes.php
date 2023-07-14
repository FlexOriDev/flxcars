<?php
require('../actions/database.php');

    $getAllTypes = $bdd->prepare('SELECT * FROM types ORDER BY id');
    $getAllTypes->execute(array());