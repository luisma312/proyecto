<?php 
include_once "conexion.php";
$id=$_POST['id'];
$sql = "delete from platos where idPlato=".$id;
unlink($_POST["fotob"]);
mysqli_query($conexion,$sql);
mysqli_close($conexion);
header("Location:secempleado.php#cocina");
?>