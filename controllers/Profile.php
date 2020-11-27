<?php 
require '../framework/fw.php'; 
require '../views/Profile.php'; 
require '../models/Users.php';

if(!isset($_SESSION)) session_start();
if(isset($_SESSION['userId'])) { 
    $usersModel = new Users();
    $user = $usersModel->getUserById($_SESSION['userId']); 

    $profileView = new Profile();
    $profileView->userName = $user['name'];
    $profileView->userSurname = $user['surname'];
    $profileView->userEmail = $user['email']; 
    $profileView->gravatar = md5( strtolower( trim ( $user['email'] ) ) ); 
    
    $profileView->render();
}
