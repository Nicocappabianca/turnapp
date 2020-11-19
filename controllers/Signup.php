<?php 
require '../framework/fw.php'; 
require '../views/Signup.php'; 
require '../models/Users.php';

session_start();
$signupView = new Signup();

if( (!empty($_POST['email'])) || (!empty($_POST['password'])) || (!empty($_POST['name'])) || (!empty($_POST['surname']))) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    // falta validar

    $usersModel = new Users();
    if( $usersModel->signup($email, $password, $name, $surname) ) { 
        // $signupView->failed_login = false; 
        header('Location: Login.php');
        exit;
    } else { 
        // $signupView->failed_login = true; 
    }
}

$signupView->render();
