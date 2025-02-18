<?php include("includes/session_start.php");?>
<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carburantes - Alameda Industrial</title>
    <link rel="stylesheet" href="css/servicio.css">
    <style>
html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1;
}

.container-fluid.footer {
    margin-top: auto;
}
</style>
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
$query = $conn->query("SELECT * FROM carburante");
 
//Comprobación de que existen resultados
if (!$query) {
    die("Error en la consulta: " . $mysqli->error);
}
//Ya tenemos los datos, cerramos la etiqueta de php y ahora mostraremos los datos recogidos
?>
 
 <div class="container">
    <h1>Carburantes</h1>
    <div class="grid">
        <?php
        // Generar las tarjetas
        while ($fila = $query->fetch_assoc()) {
            echo '
            <div class="card">
                <img src="data:image/jpeg;base64,' . $fila['imagen'] . '" 
                     alt="Imagen de ' . $fila['nombre'] . '" />
                <div class="card-body">
                    <h2 class="card-title">' . $fila['nombre'] . '</h2>
                    <p>' . $fila['descripcion'] . ' €</p>
                    <a href="' . $fila['url'] . '" class="btn btn-outline">Descubre Más</a>
                </div>
            </div>
            ';
        }
        ?>
    </div>
</div>

 
   
<?php include("includes/footer.php");?>
 
</body>
 
</html>