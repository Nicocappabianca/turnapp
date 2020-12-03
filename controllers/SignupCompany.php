<?php 
require '../framework/fw.php'; 
require '../views/SignupCompany.php'; 
require '../models/Companies.php';

if(!isset($_SESSION)) session_start();
$signupCompanyView = new SignupCompany();

if( (!empty($_POST['name'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['description'])) && (!empty($_POST['url_image'])) && (!empty($_POST['address']))) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $description = $_POST['description'];
    $url_image = $_POST['url_image'];
    $address = $_POST['address'];
    $confirmPassword = $_POST['confirm-password'];
    
    $companiesModel = new Companies();

    if ($password != $confirmPassword) {
        $signupCompanyView->password_wrong = true;
    } else {
        $password = sha1($password);
        if( $companiesModel->signup($name, $email, $password, $description, $url_image, $address) ) { 
            header('Location: iniciar-sesion');
            exit;
        } else { 
            $signupCompanyView->mail_in_use = true; 
        }
    }
}

$signupCompanyView->render();
