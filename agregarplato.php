<?php 
include "conexion.php";
session_start();
//SUBIDA DE IMAGENES AL SERVIDOR
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION["errorimagen"]="La imagen ya existe";
    $uploadOk = 0;
} 

if ($_FILES["foto"]["size"] > 500000) {
    $_SESSION["errorimagen"]="El tamaño de la imagen es demasiado grande. Menos de 500kb";
    $uploadOk = 0;
} 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "elige imagen ";
    $_SESSION["errorimagen"]="Suba un archivo de imagen";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    header("Location:secempleado.php#cocina");
} else {

    if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){
        header("Location:secempleado.php#cocina");
    }else{
        header("Location:secempleado.php#cocina");
    }
    
}

//ACTUALIZACION BASE DE DATOS

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$foto = $target_file;

mysqli_query($conexion,"insert into platos(nombre,descripcion,precio,foto,estrella) values 
                       ('$nombre','$descripcion','$precio','$foto','0')");

mysqli_close($conexion);
header("Location: secempleado.php#cocina");
?>