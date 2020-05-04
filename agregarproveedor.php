<?php
include_once "conexion.php";
mysqli_query($conexion,"insert into proveedores(nombre,telefono,direccion,CIF,nombreContacto,email) values 
                       ('$_POST[nombre]','$_POST[telefono]','$_POST[direccion]','$_POST[cif]','$_POST[contacto]','$_POST[email]')");

mysqli_close($conexion);
header("Location: secempleado.php#almac");
?>