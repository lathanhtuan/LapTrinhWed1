<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new PDO('mysql:host=localhost;dbname=taikhoan;charset=utf8','root', '');
require_once 'functions.php';
$currentUser = getCurrentUser();
 