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
$reservationsAvailable = $reservationsModel->getAllByCompanyAvailable($_SESSION['companyId']); 
$reservationsBusy = $reservationsModel->getAllByCompanyBusy($_SESSION['companyId']); 

$adminView = new Admin();
$adminView->reservationsAvailable = $reservationsAvailable; 
$adminView->reservationsBusy = $reservationsBusy; 
$adminView->render();
