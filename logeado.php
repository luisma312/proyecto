<?php
    include_once "conexion.php";
    session_start();

    $nick=$_POST['usuario'];
    $contraseña=$_POST['clave'];
    // $contraseña=md5($contraseña);
    
    
  $sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$nick' AND contraseña='$contraseña'");
  $result=mysqli_num_rows($sql);

  if($result>0){
    $data=mysqli_fetch_array($sql);
    $_SESSION["perfil"]=$data[5];
    $_SESSION["nombre"]=$data[1];
    $_SESSION["id"]=$data[0];
    $_SESSION["error"]="";
    mysqli_close($conexion);
    header("Location:secempleado.php");
    }else{
      mysqli_close($conexion);
      header("Location:secempleado.php");
    }
?>