<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
</head>
<body>

<?php
    $Id="";
    $contenido="";
    $tipo="";
       
// LO PRIMERO CONECTAR CON LA BASE DE DATOS
   
$servername = "mysql-db";
$username = "asir";
$password = "ArchTheBest";
$database = "alamedamotors";
    $conexion = mysqli_connect($servername, $username, $password, $database);
        if (!$conexion) {
            die("Connection failed: " . mysqli_connect_error());
        }
    $consulta="SELECT * FROM coche WHERE matricula='3234LOL'";
    $resultado=mysqli_query($conexion,$consulta);
   
    while ($fila=mysqli_fetch_array($resultado)){
         /*ESTO ASI TAL CUAL NO FUNCIONARIA, HAY QUE DECODIFICARLA*/
        //echo "Contenido" . $fila["imagen"] . "<br>". "<br>";
       
       //echo "<img src='data:image/jpg;base64," . base64_encode(fila["imagen"] ) . "'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($fila['imagen']) . "'/>";
  
    }
 
   


 
?>
   

</body>
</html>