<?php
    if(!isset($_SESSION)) session_start();
    unset($_SESSION['loged']);
    unset($_SESSION['userId']);
    header('Location: Login.php');
?>