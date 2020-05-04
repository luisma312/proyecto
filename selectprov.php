<?php 
include "conexion.php";

    $sql=mysqli_query($conexion,"select idProveedor,nombre from proveedores");
    $x = 0;
    $prov;
    while($row = $sql->fetch_assoc()){
        $prov[$x]="<option value=".$row["idProveedor"].">".$row["nombre"]."</option>,";
        $x++;			
        }

        mysqli_close($conexion); 


        for ($x = 0; $x <= (count($prov)-1); $x++) {
            echo $prov[$x];
        }
?>