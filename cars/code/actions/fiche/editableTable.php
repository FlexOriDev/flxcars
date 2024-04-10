<?php
if(session_id() == '') {
    session_start();
}
require('../actions/database.php');