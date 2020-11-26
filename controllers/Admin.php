<?php 
require '../framework/fw.php'; 
require '../views/Admin.php'; 
require '../models/Reservations.php'; 
require '../models/Companies.php'; 

$reservationsModel = new Reservations(); 
$reservations = $reservationsModel->getAllByCompany($_SESSION['companyId']); 
// $reservations = $reservationsModel->getAll(); 

$adminView = new Admin();
$adminView->reservations = $reservations; 
$adminView->render();
