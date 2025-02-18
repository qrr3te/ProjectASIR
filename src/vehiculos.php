<?php include("includes/session_start.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos - Alameda Industrial</title>
    <link rel="stylesheet" href="css/vehiculos.css">
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
                        <button class="btn btn-outline add-to-cart" 
                                data-marca="'.$fila['marca'].'"
                                data-modelo="'.$fila['modelo'].'"
                                data-precio="'.$fila['precio'].'">
                            Añadir al carrito
                        </button>
                        <a href="#" class="btn btn-highlight">Solicita tu Oferta</a>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    
<?php include("includes/footer.php");?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Actualizar contador del carrito
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const total = cart.reduce((sum, item) => sum + item.cantidad, 0);
        document.getElementById('cart-count').textContent = total;
    }

    // Manejar clic en botones "Añadir al carrito"
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const marca = this.dataset.marca;
            const modelo = this.dataset.modelo;
            const precio = parseFloat(this.dataset.precio);

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Buscar si el item ya está en el carrito
            const existingItem = cart.find(item => 
                item.marca === marca && 
                item.modelo === modelo
            );

            if (existingItem) {
                existingItem.cantidad++;
            } else {
                cart.push({
                    marca: marca,
                    modelo: modelo,
                    precio: precio,
                    cantidad: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            alert(`✅ ${marca} ${modelo} añadido al carrito`);
        });
    });

    // Actualizar contador al cargar la página
    updateCartCount();
});
</script>
</body>

</html>
