<?php 
require '../framework/fw.php'; 
require '../views/Admin.php'; 
require '../models/Reservations.php'; 
require '../models/Companies.php'; 

if(!isset($_SESSION)) session_start();
    
if(!isset($_SESSION['loged'])) {
    header('Location: Login.php');
    exit;
}
if(!isset($_SESSION['isAdmin'])) {
    header('Location: Home.php');
    exit;
}
$reservationsModel = new Reservations(); 
$reservations = $reservationsModel->getAllByCompany($_SESSION['companyId']); 

$adminView = new Admin();
$adminView->reservations = $reservations; 
$adminView->render();
