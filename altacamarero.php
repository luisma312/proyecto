<?php 
session_start();
if(!isset($_SESSION["perfil"])){
	header("Location:index.php");
}else{
    if($_SESSION["perfil"]!="admin"){
        header("Location:secempleado.php");
    }else{
        include_once "conexion.php";
        
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $usuario=$_POST["usuario"];
        $clave=$_POST["clave"];
        $fecha=date("Y-m-d");

        mysqli_query($conexion,"insert into usuarios(nombre,apellidos,usuario,contraseña,perfil,fecha_alta) values 
                       ('$nombre','$apellidos','$usuario','$clave','camarero','$fecha')")or die("Problemas en el select".mysqli_error($conexion));

        mysqli_close($conexion);

        header("Location:secempleado.php#rechum");
    }
}

?>