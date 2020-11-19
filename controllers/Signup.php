<?php 
require '../framework/fw.php'; 
require '../views/Signup.php'; 
require '../models/Users.php';

if(!isset($_SESSION)) session_start();
$signupView = new Signup();

if( (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['name'])) && (!empty($_POST['surname']))) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $confirmPassword = $_POST['confirm-password'];
    // falta validar


    $usersModel = new Users();

    if ($password != $confirmPassword) {
        $signupView->password_wrong = true;
    } else {
        $password = sha1($password);
        if( $usersModel->signup($email, $password, $name, $surname) ) { 
            header('Location: Login.php');
            exit;
        } else { 
            $signupView->mail_in_use = true; 
        }
    }
}

$signupView->render();
