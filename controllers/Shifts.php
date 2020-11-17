<?php 
require '../framework/fw.php'; 
require '../views/ShiftsList.php'; 
require '../models/Shifts.php'; 

$shiftsModel = new Shifts(); 
$days = $shiftsModel->getAllDays($_GET['companyId']); 

$shiftsView = new ShiftsList();
$shiftsView->days = $days; 
$shiftsView->render();
