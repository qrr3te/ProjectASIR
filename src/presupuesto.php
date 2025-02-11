<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto - Alameda Motor</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Estilos comunes */
        body,
        html {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .logo h1 {
            color: #ff7300;
            font-size: 24px;
        }

        .nav-menu {
            display: flex;
            gap: 15px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        /* Formulario */
        .form-section {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .appointment-form label {
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .appointment-form input,
        .appointment-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 95%;
        }

        .services-checkboxes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Dos columnas iguales */
            gap: 15px;
            margin-bottom: 20px;
        }

        .services-checkboxes label {
            display: flex;
            align-items: center;
            /* Alinea verticalmente checkbox y texto */
            gap: 10px;
            font-size: 16px;
        }

        .services-checkboxes input {
            width: auto;
            /* Restablece el tamaño natural del checkbox */
            height: auto;
        }


        .appointment-form button {
            margin-top: 20px;
            background-color: #ff7300;
            color: #fff;
            padding: 10px 15px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .appointment-form button:hover {
            background-color: #ce6a17;
        }

        /* Footer */
        .footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
     <script>
        function cargarHorasDisponibles() {
            var fecha = document.getElementById("date").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "obtener_horas.php?fecha=" + fecha, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("time").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>

<body>
    <?php include("includes/header.php"); ?>
    <main>
        <section class="form-section">
            <h2>Solicitar Presupuesto</h2>
            <p>Por favor, complete el siguiente formulario para agendar su cita.</p>
            <form action="insert-cita.php" method="POST" class="appointment-form">

                <label for="marca">Marca del vehículo</label>
                <input type="text" id="name" name="name" placeholder="Ej. BMW" required>


                <label for="car-model">Modelo del coche:</label>
                <input type="text" id="car-model" name="car_model" placeholder="Ej. Toyota Corolla" required>

                <label for="car-year">Año del coche:</label>
                <input type="number" id="car-year" name="car_year" placeholder="Ej. 2020" min="1900" max="2024"
                    required>

                <!-- Fecha y hora preferida -->
                <label for="date">Fecha:</label>
                <input type="date" id="date" name="date" required onchange="cargarHorasDisponibles()">

                <label for="time">Hora:</label>
                <select id="time" name="time" required>
                    <option value="">Seleccione una fecha primero</option>
                </select>
                <br>
                <!-- Servicios solicitados -->
                <label for="services">Servicios Solicitados:</label>
                <div id="services" class="services-checkboxes">
                    <label>
                        <input type="checkbox" name="services[]" value="oil_change"> Cambio de aceite
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="tire_change"> Cambio de neumáticos
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="battery_check"> Revisión de batería
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="brakes_check"> Revisión de frenos
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="engine_diagnostics"> Diagnóstico del motor
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="general_service"> Mantenimiento general
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="ac_repair"> Reparación de aire acondicionado
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="wheel_alignment"> Alineación de ruedas
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="suspension_check"> Revisión de suspensión
                    </label>
                    <label>
                        <input type="checkbox" name="services[]" value="transmission_service"> Servicio de transmisión
                    </label>
                </div>

                <!-- Comentarios adicionales -->
                <label for="comments">Comentarios adicionales:</label>
                <textarea id="comments" name="comments" placeholder="Escriba aquí cualquier detalle adicional..."
                    rows="4"></textarea>

                <!-- Botón de envío -->
                <button type="submit" class="submit-btn">Enviar Solicitud</button>
            </form>
        </section>
    </main>

    <?php include("includes/footer.php"); ?>
       
</body>

</html>
