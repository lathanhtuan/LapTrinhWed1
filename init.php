<?php
//Khi=ởi động session
session_start();

//composer autoload
require_once './vendor/autoload.php';
//Thêm thông báo lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Kết nối csdl
$db = new PDO('mysql:host=localhost:3307;dbname=shop_ping;charset=utf8','root', '');
require_once 'functions.php';
//Lấy thôn tin user đã đăng nhập
$currentUser = getCurrentUser();
//
$c='';
 