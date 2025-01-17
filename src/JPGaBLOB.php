<?php
// la imagen q queramos subir debe estar en .jpg
//LaImagen=foper(ruta,permiso)
//Donde pone tamaño iría una función
//BitsArchivo=fread(LaImagen, tamaño)
//función para el tamaño de la imagen
//$TamanioImagen=$_FILES['imagen']['size'];

//echo "el tamaño es $TamanioImagen"


$ruta="C:\Users\trujo\Pictures\AN2.jpg";
// la imagen q queramos subir debe estar en .jpg
//función para el tamaño de la imagen
$TamanioImagen=$_FILES['imagen']['size'];

$LaImagen=fopen("C:\Users\trujo\Pictures\AN2.jpg","r");
//Donde pone tamaño iría una función
$BitsArchivo=fread($LaImagen, $TamanioImagen);
fclose($LaImagen);

echo $BitsArchivo;
echo "el tamaño es $TamanioImagen";
?>