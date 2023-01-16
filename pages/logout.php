<?php
    require_once('database.php');
    $database->logout();
    header("Location: index.php");

?>