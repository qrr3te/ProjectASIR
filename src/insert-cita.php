<?php
require("./includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['car_model'];
    $modelo = $_POST['car_year'];
    $fecha = $_POST['date'];
    $hora = $_POST['time'];
    $servicio = implode(", ", $_POST['services']); 
    $comentarios = $_POST['comments'];
    


    session_start();
    $cliente_id = isset($_SESSION['cliente_id']) ? $_SESSION['cliente_id'] : NULL;

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
    } else {
       
        $sql = "INSERT INTO cita (marca, modelo, fecha, hora, servicio_solicitado, cliente_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $marca, $modelo, $fecha, $hora, $servicio, $cliente_id);

        if ($stmt->execute()) {
            echo "<script>alert('Cita registrada exitosamente.'); window.location.href='presupuesto.php';</script>";
        } else {
            echo "<script>alert('Error al registrar la cita: " . $stmt->error . "'); window.history.back();</script>";
        }
        
        $stmt->close();
    }
    
    $conn->close();
}
?>