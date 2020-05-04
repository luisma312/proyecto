<?php 
include_once "conexion.php";

if(!empty($_POST["cam"])){
   $checkbox = implode(",",$_POST["cam"]);
   
   $sql = "delete from usuarios where idUsuario in (".$checkbox.")";
   mysqli_query($conexion,$sql);
   mysqli_close($conexion);
   header("Location:secempleado.php#rechum");
}else{
    mysqli_close($conexion);
    header("Location:secempleado.php#rechum");
}



?>