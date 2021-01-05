<?php
//Khoi dong session
session_start();

//Composer autoload
require_once 'vendor/autoload.php';

//Cai dat hien thi error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Lien ket DB
$db = new PDO('mysql:host=localhost;dbname=babyshop;charset=utf8', 'root', '');
//lien ket voi file Function
require_once 'functions.php';

//Lay User hien tai
$currentUser = getCurrentUser();



?>
