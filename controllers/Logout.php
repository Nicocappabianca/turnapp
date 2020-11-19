<?php
    if(!isset($_SESSION)) session_start();
    unset($_SESSION['loged']);
    header('Location: Login.php');
?>