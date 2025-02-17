<?php
require("./includes/connect.php");

if ($conn->connect_error) {
   die("Error en la conexión: " . $conn->connect_error);
}
// end conf

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
  die("Las contraseñas no coinciden.");
}

$db_username = "";
$db_email = "";
$db_telefono = "";

$stmt = $conn->prepare("SELECT username, email, telefono FROM cliente");
$stmt->bind_result($db_username, $db_email, $db_telefono);
$stmt->execute();

$should_die = false;
while ($stmt->fetch()) {
   if ($username == $db_username) {
      $should_die = true;
   }
   if ($email == $db_email) {
      $should_die = true;
   }
   if ($telefono == $db_telefono) {
      $should_die = true;
   }
   if ($should_die) {
      header("Location: login.html");
      die();
   }
}

// Insertar el usuario en la base de datos

// Encriptar la contraseña
$password = password_hash($password, PASSWORD_ARGON2I);

$stmt = $conn->prepare("INSERT INTO cliente (username, nombre, apellido, email, telefono, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $username, $nombre, $apellido, $email, $telefono, $password);

if ($stmt->execute()) {
   echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
} else {
   echo "Registro fallido";
}
$conn->close();
?>
