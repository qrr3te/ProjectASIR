<?php
require("admin_class.php"); 

function try_connection($server, $username, $password, $database) {
   try {
      $conn = new mysqli($server, $username, $password, $database);
      return $conn;
   } catch(Exception $e) {
      echo $e->getMessage() . "\n";
      return false;
   }
}

exec("cd .. && docker-compose up -d");

$server = "172.20.0.11";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";
$conn = false;

while (true) {
   $conn = try_connection($server, $username, $password, $database);
   if ($conn) {
      break; 
   }
   echo "Intento de conexión fallido.... Reintentando\n";
   sleep(1);
}

echo "Conexión exitosa a la base de datos '$database'\n";
echo "Inicializando db...\n";
exec("mariadb -h 172.20.0.11 -u asir -pArchTheBest -e 'source ../alamedamotors.sql'");
echo "Base de datos inicializada\n";

$admin = new admin;
$administrators = sizeof($conn->execute_query("SELECT * FROM admin")->fetch_all());

if ($administrators > 0) {
   echo "Configuración finalizada\n";
   die();
}

$query = "INSERT INTO admin (username, nombre, apellido, email, telefono, password) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
$formated_query = sprintf($query, $admin->username, $admin->nombre, $admin->apellido, $admin->email, $admin->telefono, $admin->password);

$conn->execute_query($formated_query);
echo "Creado usuario administrador por defecto\n";
echo "Configuración finalizada\n";

$conn->close();
?>
