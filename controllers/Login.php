<?php 
require '../framework/fw.php'; 
require '../views/Login.php'; 
require '../models/Users.php';

session_start();

if( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
    // Validaciones
    $email = $_POST['email'];
    $password = $_POST['password'];
    // falta validar

    $userModel = new Users();
    $user =  $userModel->getUser($email, $password); 

    if (mysqli_num_rows($user) == 1) {
        $_SESSION['loged'] = true;
        $fila = mysqli_fetch_assoc($user);
        $_SESSION['name'] = $fila['name'];
        header('Location: Home.php');
        exit;
    }
}

$loginView = new Login();
$loginView->render();
