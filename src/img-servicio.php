<?php
// Conexión a la base de datos
require("./includes/connect.php");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


// Sacar la informacion de la imagen guardada en formato BLOB
$ruta="img/Venta-Vehiculo.jpg";
$TamanioImagen=filesize($ruta);

// la imagen q queramos subir debe estar en .jpg
$LaImagen=fopen($ruta,"r");

//Verificar que se abre la imagen correctamente
if ($LaImagen === false) {
    die("No se pudo abrir la imagen.");
}

$imagen_binaria=fread($LaImagen, $TamanioImagen);
//$imagen_binaria=addslashes($imagen_binaria);
fclose($LaImagen); 
//toma Blob niño

// Datos de la imagen
$id = "4";
$nombre = "Venta de Vehiculos";
$descripcion = "Le entregamos el coche en su domicilio personalmente o mediante agencia, usted elige.";


// Preparar la consulta SQL para insertar los datos
$stmt = $conn->prepare("INSERT INTO servicios (id, nombre, imagen, descripcion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $id, $nombre, $imagen_binaria, $descripcion);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Servicio insertado correctamente.";
} else {
    echo "Error al insertar servicio: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>