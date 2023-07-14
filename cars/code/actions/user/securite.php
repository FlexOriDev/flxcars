<?php
if(session_id() == '') {
    session_start();
}
if(!isset($_SESSION['auth'])){
    header('Location: login.php');
}