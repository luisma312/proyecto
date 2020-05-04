<?php
include "conexion.php";

$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$contacto=$_POST["contacto"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$cif=$_POST["cif"];
$id=$_POST["id"];

$sql=mysqli_query($conexion,"Update proveedores set nombre='".$nombre."',telefono='".$telefono."',direccion='".$direccion."',CIF='".$cif."',nombreContacto='".$contacto."',email='".$email."' where idProveedor=".$id."");
 mysqli_close($conexion); 

header("Location:secempleado.php#almac");

?>