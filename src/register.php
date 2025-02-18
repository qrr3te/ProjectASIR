<?php
require("./includes/connect.php");

if ($conn->connect_error) {
   die("Error en la conexión: " . $conn->connect_error);
}

// Validar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   die();
}

$username = $_POST['username'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$telefono = $_POST['telefono'];
$confirm_password = $_POST['confirm_password'];

// Validaciones básicas
if ($password != $confirm_password) {
  header("Location: login.html?error=password_mismatch");
  exit();
}

$db_username = "";
$db_email = "";
$db_telefono = "";

$stmt = $conn->prepare("SELECT username, email, telefono FROM cliente");
$stmt->bind_result($db_username, $db_email, $db_telefono);
$stmt->execute();

while ($stmt->fetch()) {
   if ($username == $db_username || $email == $db_email || $telefono == $db_telefono) {
      header("Location: login.html?error=1");
      exit();
   }
}

// Encriptar la contraseña
$password = password_hash($password, PASSWORD_ARGON2I);

$stmt = $conn->prepare("INSERT INTO cliente (username, nombre, apellido, email, telefono, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $username, $nombre, $apellido, $email, $telefono, $password);

if ($stmt->execute()) {
   header("Location: login.html?success=1");
   exit();
} else {
   header("Location: login.html?error=2");
   exit();
}

$conn->close();
?>
