<?php 
require '../framework/fw.php'; 
require '../views/ShiftsList.php'; 
require '../models/Shifts.php'; 
require '../models/Companies.php'; 

$shiftsModel = new Shifts(); 
$days = $shiftsModel->getAllDays($_GET['companyId']); 

$companiesModel = new Companies(); 
$company = $companiesModel->getCompany($_GET['companyId']);

$shiftsView = new ShiftsList();
$shiftsView->days = $days; 
$shiftsView->companyName = $company['name']; 
$shiftsView->render();
