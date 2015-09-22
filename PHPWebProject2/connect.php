<?php
header("Content-Type:text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "member";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query('SET NAMES "UTF8"');
?>