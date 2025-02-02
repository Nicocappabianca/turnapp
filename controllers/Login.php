<?php 
require '../framework/fw.php'; 
require '../views/Login.php'; 
require '../models/Users.php';
require '../models/Companies.php';

if(!isset($_SESSION)) session_start();
$loginView = new Login();

if( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // Login for companies 
    if(isset($_POST['isCompany'])) { 
        $companiesModel = new Companies();
        if( $companiesModel->login($email, $password) ) { 
            $loginView->failed_login = false; 
            header('Location: home');
            exit;
        } else { 
            $loginView->failed_login = true; 
        }
    } else {     
        $usersModel = new Users();
        if( $usersModel->login($email, $password) ) { 
            $loginView->failed_login = false; 
            header('Location: home');
            exit;
        } else { 
            $loginView->failed_login = true; 
        }
    }
}

$loginView->render();
