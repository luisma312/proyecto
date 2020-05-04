<?php 
include "conexion.php";

$id = $_POST["id"];

if($id!="x"){
    $sql=mysqli_query($conexion,"select * from platos where idPlato=".$id."");
     mysqli_close($conexion); 
     if($sql->num_rows > 0){
        while($row = $sql->fetch_assoc()){
            if($row["estrella"]==1){
                $chk="checked";
            }else{
               $chk="";
            }
            echo "<form method='post'  action='modificarplato.php' enctype='multipart/form-data' id='platitos'>
                    Nombre:<input style='border:1px solid #686868' type='text' name='nombre' value='".$row["nombre"]."' pattern='^[A-Za-záéíóúñ,. ]+$'>
                    Descripcion:<input style='border:1px solid #686868' type='text' name='descripcion' value='".$row["descripcion"]."' pattern='^[A-Za-záéíóúñ,. ]+$'>
                    Precio:<input style='border:1px solid #686868' type='text' name='precio' value='".$row["precio"]."' pattern='^[0-9]{1,2}(\.[0-9][0-9]?)?$'><br><br>
                    Destacado <input type='checkbox' name='estrella' id='estrella' ".$chk." value='si'><br>
                    <img src='".$row["foto"]."' width='25%' heigh='25%'><br>
                    <input type='file' name='foto' id='foto'><br><br>
                    <input type='hidden' name='id' value='".$id."'><input type='hidden' name='fotob' value='".$row["foto"]."'><input type='submit' value='Modificar'>
                    <input type='submit' value='Eliminar' formaction='borraplato.php' style='background-color:#b30000'>
            </form>";
        }
    }
}
?>