<?php
$mysqli_servername = "mysql-db";
$mysqli_username = "asir";
$mysqli_password = "ArchTheBest";
$mysqli_database = "alamedamotors";

$conn = new mysqli($mysqli_servername, $mysqli_username, $mysqli_password, $mysqli_database);
$conn_root = new mysqli($mysqli_servername, "root", $mysqli_password, $mysqli_database);
?>
