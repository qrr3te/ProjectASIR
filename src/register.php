<?php
// Configuración de conexión a la base de datos
$servername = "mysql-db"; 
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Validar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $confirm_password = $_POST['confirm_password'];

    // Validaciones básicas
    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    // Prevenir inyecciones SQL
    $username = $conn->real_escape_string($username);
    $nombre = $conn->real_escape_string($nombre);
    $apellido = $conn->real_escape_string($apellido);
    $email = $conn->real_escape_string($email);
    $telefono = $conn->real_escape_string($telefono);
    $password = $conn->real_escape_string($password);

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO cliente (username, nombre, apellido, email, telefono, password) VALUES ('$username', '$nombre', '$apellido', '$email', '$telefono', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
