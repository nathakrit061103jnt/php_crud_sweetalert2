<?php

// ## server ##
$host = "us-cdbr-east-04.cleardb.com";
$user = "b96f4b30055a5a";
$password = "4d72ff7a";
$database = "heroku_279a59c2954239d";


// ## localhost ##
// $host = "localhost";
// $user = "root";
// $password = "";
// $database = "php_crud_sweetalert2";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($host, $user, $password, $database);

//  $conn = mysqli_connect('db', 'user', 'test', "myDb");

// การทำให้รองรับภาษาไทย
mysqli_set_charset($conn, "utf8");
// การเช็กการเชื่อมต่อฐานข้อมูล
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}