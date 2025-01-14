<?php
require("admin_class.php"); 

exec("cd .. && docker-compose up -d");
sleep(10);

$servername = "127.0.0.1";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}


echo "Conexión exitosa a la base de datos '$database'\n";
echo "Inicializando db...\n";
exec("mariadb -h 127.0.0.1 -u asir -pArchTheBest -e 'source ../alamedamotors.sql'");
echo "Base de datos inicializada\n";

$admin = new admin;
$query = "INSERT INTO admin (username, nombre, apellido, email, telefono, password) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
$formated_query = sprintf($query, $admin->username, $admin->nombre, $admin->apellido, $admin->email, $admin->telefono, $admin->password);

$conn->execute_query($formated_query);
echo "Creado usuario administrador por defecto\n";
echo "Configuración finalizada\n";

$conn->close();
?>
