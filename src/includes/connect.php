<?php
$mysqli_servername = "172.20.0.11";
$mysqli_username = "asir";
$mysqli_password = "ArchTheBest";
$mysqli_database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

//echo "Conexión exitosa a la base de datos '$database'";

//$conn->close();
?>
