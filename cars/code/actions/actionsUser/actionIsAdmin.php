<?php
if (!function_exists('isAdmin')) {
    function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
if (!function_exists('redirectIfNotAdmin')) {
    function redirectIfNotAdmin()
    {
        if (!isAdmin()) {
            echo '<script>window.location = "pageIndex.php";</script>';
            exit;
        }
    }
}
?>