<?php 
require '../framework/fw.php'; 
require '../views/Login.php'; 

// $userModel = new Users();
// $user =  $userModel->getUser(); 

$loginView = new Login();
$loginView->render();
