<?php
require("./includes/connect.php");

if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    // Definir las horas disponibles de 9:00 a 17:00
    $horas_disponibles = [
        "09:00", "10:00", "11:00", "12:00",
        "13:00", "14:00", "15:00", "16:00", "17:00"
    ];

    // Obtener las horas ya reservadas para esa fecha
    $sql = "SELECT TIME_FORMAT(hora, '%H:%i') AS hora FROM cita WHERE fecha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $result = $stmt->get_result();

    $horas_ocupadas = [];
    while ($row = $result->fetch_assoc()) {
        $horas_ocupadas[] = $row['hora'];
    }

    // Filtrar las horas disponibles
    $horas_finales = array_diff($horas_disponibles, $horas_ocupadas);

    // Si no hay horas disponibles, mostrar un mensaje
    if (empty($horas_finales)) {
        echo "<option value=''>No hay horarios disponibles</option>";
    } else {
        foreach ($horas_finales as $hora) {
            echo "<option value='$hora'>$hora</option>";
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<option value=''>Error: Fecha no recibida</option>";
}
?>