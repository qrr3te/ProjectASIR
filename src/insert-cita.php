<?php
require("./includes/connect.php");
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["email"])) {
    echo "<script>alert('Error: No has iniciado sesión.'); window.history.back();</script>";
    exit;
}

// Obtener el email desde la sesión
$email_cliente = $_SESSION["email"];

// Buscar el cliente_id usando el email
$sql_cliente = "SELECT id FROM cliente WHERE email = ?";
$stmt_cliente = $conn->prepare($sql_cliente);
$stmt_cliente->bind_param("s", $email_cliente);
$stmt_cliente->execute();
$stmt_cliente->bind_result($cliente_id);
$stmt_cliente->fetch();
$stmt_cliente->close();

// Si no encuentra el cliente, mostrar error
if (!$cliente_id) {
    echo "<script>alert('Error: No se encontró el cliente.'); window.history.back();</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['name']; 
    $modelo = $_POST['car_model'];
    $fecha = $_POST['date'];
    $hora = $_POST['time'];
    $servicio = implode(", ", $_POST['services']); 
    $comentarios = $_POST['comments'];

    // Verificar si la hora ya está reservada
    $sql_check = "SELECT COUNT(*) FROM cita WHERE fecha = ? AND hora = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $fecha, $hora);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        echo "<script>alert('La hora seleccionada ya está ocupada. Por favor, elija otra.'); window.history.back();</script>";
        exit;
    }

    // Insertar la cita en la base de datos
    $sql = "INSERT INTO cita (marca, modelo, fecha, hora, servicio_solicitado, cliente_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $marca, $modelo, $fecha, $hora, $servicio, $cliente_id);

    if ($stmt->execute()) {
        // Enviar correo con PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP de Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'fjavierlopezpuertas@gmail.com';  
            $mail->Password   = 'bkvg yiki hjts eykh ';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587;

            // Configurar el remitente y destinatario
            $mail->setFrom('alamedamotors@alamedamotors.com', 'Alameda Motor');
            $mail->addAddress($email_cliente);

            // Configurar el contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmacion de cita - Alameda Motor';
            $mail->Body = "
                <html>
                    <head>
                        <title>Detalles de su cita</title>
                    </head>
                    <body>
                        <h2>Estimado cliente,</h2>
                        <p>Gracias por agendar una cita con nosotros. Aquí están los detalles de su cita:</p>
                        <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                            <tr><td><strong>Marca del Vehículo:</strong></td><td>$marca</td></tr>
                            <tr><td><strong>Modelo del Vehículo:</strong></td><td>$modelo</td></tr>
                            <tr><td><strong>Fecha de la Cita:</strong></td><td>$fecha</td></tr>
                            <tr><td><strong>Hora de la Cita:</strong></td><td>$hora</td></tr>
                            <tr><td><strong>Servicios Solicitados:</strong></td><td>$servicio</td></tr>
                            <tr><td><strong>Comentarios:</strong></td><td>$comentarios</td></tr>
                        </table>
                        <p>Nos vemos el <b>$fecha</b> a las <b>$hora</b>.</p>
                        <p>¡Gracias por elegir Alameda Motor!</p>
                    </body>
                </html>
            ";

            // Enviar el correo
            if ($mail->send()) {
                echo "<script>alert('Cita registrada exitosamente. Se ha enviado un correo con los detalles.'); window.location.href='presupuesto.php';</script>";
            } else {
                echo "<script>alert('Cita registrada, pero hubo un error al enviar el correo.'); window.history.back();</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Error al enviar el correo: {$mail->ErrorInfo}'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error al registrar la cita: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
