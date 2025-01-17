<?php
// Conexión a la base de datos
require("./includes/connect.php");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


// Sacar la informacion de la imagen guardada en formato BLOB
$ruta="corvette.jpg";
$TamanioImagen=filesize($ruta);
// la imagen q queramos subir debe estar en .jpg
$LaImagen=fopen($ruta,"r");
$BitsArchivo=fread($LaImagen, $TamanioImagen);
fclose($LaImagen); 

$imagen_binaria = $BitsArchivo;
//toma Blob niño

// Datos del coche
$matricula = "1312ACB";
$marca = "Chevrolet";
$modelo = "Impala";
$precio = 8000.0;

// Preparar la consulta SQL para insertar los datos
$stmt = $conn->prepare("INSERT INTO coche (matricula, marca, modelo, precio, imagen) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdsb", $matricula, $marca, $modelo, $precio, $imagen_binaria);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Coche insertado correctamente.";
} else {
    echo "Error al insertar coche: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
