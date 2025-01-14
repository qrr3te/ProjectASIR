<?php
$servername = "mysql-db";
$username = "YQmGGvcmWG5d";
$password = "gB21bESbbfYU6";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos '$database'";

$conn->close();
?>

