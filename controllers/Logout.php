<?php
    if(!isset($_SESSION)) session_start();
    unset($_SESSION['loged']);
    unset($_SESSION['userName']);
    unset($_SESSION['userId']);
    unset($_SESSION['isAdmin']);
    unset($_SESSION['companyName']);
    unset($_SESSION['companyId']);
    unset($_SESSION['companyImg']);
    header('Location: iniciar-sesion');
?>