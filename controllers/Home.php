<?php
require '../framework/fw.php';
require '../models/Company.php';  
require '../views/Home.php'; 

$Company = new Company(); 
$allCompanies = $Company->getAll(); 

$homeView = new Home();
$homeView->companies = $allCompanies; 
$homeView->render(); 
