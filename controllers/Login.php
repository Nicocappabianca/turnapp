<?php 
require '../framework/fw.php'; 
require '../views/Login.php'; 
require '../models/Users.php';

session_start();
$loginView = new Login();

if( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    // falta validar

    $usersModel = new Users();
    if( $usersModel->login($email, $password) ) { 
        $loginView->failed_login = false; 
        header('Location: Home.php');
        exit;
    } else { 
        $loginView->failed_login = true; 
    }
}

$loginView->render();
