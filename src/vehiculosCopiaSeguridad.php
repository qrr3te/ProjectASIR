<!DOCTYPE html 
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos - Alameda Industrial</title>
    <link rel="stylesheet" href="css/vehiculos.css">

</head>

<body>
<?php include("includes/header.php"); 

require("./includes/connect.php");

if ($conn->connect_error) {
   die("Error en la conexión: " . $conn->connect_error);
}
// end conf
?>
<div class="container">
        <h1>Gama de Turismos</h1>
        <div class="grid">
            <?php
            // Array de vehículos
            $vehiculos = [
                [
                    "nombre" => "Vehículo 1",
                    "imagen" => "bety3.jpg",
                    "url_descubre" => "#",
                    "url_oferta" => "#"
                ],
                [
                    "nombre" => "Vehículo 2",
                    "imagen" => "bety2.jpg",
                    "url_descubre" => "#",
                    "url_oferta" => "#"
                ],
                [
                    "nombre" => "Vehículo 3",
                    "imagen" => "bety3.jpg",
                    "url_descubre" => "#",
                    "url_oferta" => "#"
                ],
                // Agrega más vehículos aquí
            ];

            // Generar las tarjetas
            foreach ($vehiculos as $vehiculo) {
                echo '
                <div class="card">
                    <img src="'.$vehiculo['imagen'].'" alt="'.$vehiculo['nombre'].'">
                    <div class="card-body">
                        <h2 class="card-title">'.$vehiculo['nombre'].'</h2>
                        <a href="'.$vehiculo['url_descubre'].'" class="btn btn-outline">Descubre Más</a>
                        <a href="'.$vehiculo['url_oferta'].'" class="btn btn-highlight">Solicita tu Oferta</a>
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