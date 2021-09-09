<?php
// Mysql database config
$host = "localhost";
$user = "xss";
$pass = "123456";
$dbname = "xss";

// Admin username and password
$admin_user = "admin";
$admin_pass = "123456";

// 服务端地址
$server_url = "http://127.0.0.1/server.php";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>