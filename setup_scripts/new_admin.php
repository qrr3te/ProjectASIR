<?php 
require("./admin_class.php");

$servername = "127.0.0.1";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$admin = new admin;
$admin->ask_values();

$query = "INSERT INTO admin (username, nombre, apellido, email, telefono, password) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
$formated_query = sprintf($query, $admin->username, $admin->nombre, $admin->apellido, $admin->email, $admin->telefono, $admin->password);

$conn->execute_query($formated_query);
echo "Nuevo administrador creado.\n"; 

$conn->close();
?>
