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
    <?php include("includes/header.php");
    
    require("./includes/connect.php");
    
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }
    
    $query = $conn->query("SELECT nombre, precio, imagen FROM carburante");
    
    if (!$query) {
        die("Error en la consulta: " . $mysqli->error);
    }
    ?>

    <div class="container">
        <h1>Carburantes</h1>
        <div class="grid">
            <?php
            while ($fila = $query->fetch_assoc()) {
                echo '
                <div class="card">
                    <img src="data:image/jpeg;base64,' . ($fila['imagen']) . '" 
                         alt="Imagen de ' . htmlspecialchars($fila['nombre']) . '" />
                    <div class="card-body">
                        <h2 class="card-title">' . htmlspecialchars($fila['nombre']) . '</h2>
                        <p>' . number_format($fila['precio'], 2) . ' €/litro</p>
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