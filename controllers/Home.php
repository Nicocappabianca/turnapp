<?php
require '../framework/fw.php';
require '../models/Company.php';  
require '../views/Home.php'; 
require '../models/Companies.php'; 

$companiesModel = new Companies(); 
$companies = $companiesModel->getAll(); 

$homeView = new Home();
$homeView->companies = $allCompanies; 
$homeView->render(); 