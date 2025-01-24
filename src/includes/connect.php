<?php
$servername = "mysql-db";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);
$conn_root = new mysqli($servername, "root", $password, $database);
?>
