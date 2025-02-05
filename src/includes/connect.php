<?php
$servername = "mysql-db";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}



?>

