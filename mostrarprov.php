<?php 
include "conexion.php";

$id = $_POST["id"];

if($id!="x"){
$sql=mysqli_query($conexion,"select * from proveedores where idProveedor=".$id."");
 mysqli_close($conexion); 
if($sql->num_rows > 0){
    while($row = $sql->fetch_assoc()){
        echo "<form method='post' id='formularioproveedor' action='modificarprov.php'>
            <table>
                <tr><td style='text-align:right'>Nombre:</td><td><input style='border:1px solid #686868' type='text' name='nombre' value='".$row["nombre"]."'></td></tr>
                <tr><td style='text-align:right'>Telefono:</td><td><input style='border:1px solid #686868' type='text' name='telefono' value='".$row["telefono"]."' pattern='[0-9]{9}'></td></tr>
                <tr><td style='text-align:right'>Contacto:</td><td><input style='border:1px solid #686868' type='text' name='contacto' value='".$row["nombreContacto"]."'></td></tr>
                <tr><td style='text-align:right'>Direccion:</td><td><input style='border:1px solid #686868' type='text' name='direccion' value='".$row["direccion"]."'></td></tr>
                <tr><td style='text-align:right'>Email:</td><td><input style='border:1px solid #686868' type='text' name='email' value='".$row["email"]."'></td></tr>
                <tr><td style='text-align:right'>CIF:</td><td><input style='border:1px solid #686868' type='text' name='cif' value='".$row["CIF"]."'></td></tr>
                <tr><td><input type='hidden' name='id' value='".$id."'></td><td style='text-align:left'><input type='submit' value='Modificar'></td></tr>
            </table>
        </form>";
    }
}
}
?>