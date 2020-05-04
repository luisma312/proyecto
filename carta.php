<?php include "conexion.php";

    $tipo = $_POST["tipo"];
    $carta;
    $x=0;
     if($tipo == "todo"){
         $sql=mysqli_query($conexion,"SELECT * FROM platos");
     }else if($tipo == "destac"){
        $sql=mysqli_query($conexion,"SELECT * FROM platos WHERE estrella=1");
     }
    
   
	while($row = $sql->fetch_assoc()){
    $carta[$x]="<div class='col-4 col-6-medium col-12-small'><img class='image fit' src=".$row["foto"]." alt=''><span style='font-size:medium'>".$row["nombre"]."</span></div>,";
    $x++;			
    }
    mysqli_close($conexion); 
    
    for ($x = 0; $x <= (count($carta)-1); $x++) {
        echo $carta[$x];
    }
?>