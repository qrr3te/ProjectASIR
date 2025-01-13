<?php
// Configuración de conexión a la base de datos
// require("./connect.php");
//
// conf manual
$servername = "mysql-db"; // Cambia si usas otro host
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
// end conf

// Validar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   die();
}

$post_username = $_POST['username'];
$post_password = $_POST['password'];

// Prevenir inyecciones SQL
$stmt = $conn->prepare("SELECT username, password FROM cliente WHERE username = ?");
$stmt->bind_param("s", $post_username);

$username = "";
$password = "";

$stmt->bind_result($username, $password);
$stmt->execute();
$stmt->fetch();
$conn->close();

if ($username == "") {
   die();
}

// debug 
// echo $username . " - " . $password . " - " . $post_password;
// die();

if ( password_verify($post_password, $password)) {
   echo "sesión iniciada como $username";
} else {
   echo "inicio de sesión fallido";
}
?>
