<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos - Alameda Industrial</title>
    <link rel="stylesheet" href="css/vehiculos.css">

</head>

<body>
<!--//Conectar a la base de datillos-->
<?php include("includes/header.php"); 

require("./includes/connect.php");
//Verificacion de la conexión
if ($conn->connect_error) {
   die("Error en la conexión: " . $conn->connect_error);
}

//Realización de la consulta para extraer los datos
$query = $conn->query("SELECT marca, modelo, precio, imagen FROM coche");

//Comprobación de que existen resultados
if (!$query) {
    die("Error en la consulta: " . $mysqli->error);
}
//Ya tenemos los datos, cerramos la etiqueta de php y ahora mostraremos los datos recogidos
?>

<div class="container">
        <h1>Gama de Turismos</h1>
        <div class="grid">
            <?php
            // Array dinámico de vehículos
            

            // Generar las tarjetas
            while ($fila = $query->fetch_assoc()) {
                echo '
                <div class="card">
                    
                    <img src="data:image/jpeg;base64,' . $fila['imagen'] . '" alt="Imagen de ' . $fila['marca'] . ' ' . $fila['modelo'] . '">
                    <div class="card-body">
                        <h2 class="card-title">'.$fila['marca'].' '.$fila['modelo'].'</h2>
                        <p>Precio: '.$fila['precio'].' €</p>
                        <a href="#" class="btn btn-outline">Comprar</a>
                        <a href="#" class="btn btn-highlight">Solicita tu Oferta</a>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    
<footer class="footer">
    <div class="bottom-bar">
    <div class="contact-info">
            <span>Lun - Vie: 09:00am a 06:00pm</span>
            <span> | </span>
            <span>+34 123456789</span>
            <span> | </span>
            <span>support@alamedaindustrial.com</span>
    </div>
    <div class="social-icons">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
    </div>
    <div class="copyright">
        <p>&copy; 2024 Alameda Industrial. Todos los derechos reservados.</p>
    </div>
</footer>

</body>

</html>
