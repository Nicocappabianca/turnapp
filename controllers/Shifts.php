<?php 
require '../framework/fw.php'; 
require '../views/ShiftsList.php'; 
require '../models/Shifts.php'; 

$shiftsModel = new Shifts(); 
$shifts = $shiftsModel->getAll($_GET['companyId']); 

$shiftsView = new ShiftsList();
$shiftsView->shifts = $shifts; 
$shiftsView->render();
