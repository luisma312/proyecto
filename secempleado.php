<?php
include_once "conexion.php";
session_start();

?>
<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	
-->
<html>
	<head>
		<title>Empleados</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

						<?php
						if(!isset($_SESSION["perfil"])){
						 
						 ?>
		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="index.php" class="icon solid fa-home"><span>Volver</span></a>
						<!-- <a href="https://twitter.com/ajlkn" class="icon brands fa-twitter"><span>Twitter</span></a> -->
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
					
							<article id="home" class="panel intro">
								<header>
								<form method="POST" action="logeado.php">
									<label for="usuario">Nombre de usuario:</label>
									<input type="text" name="usuario" id="usuario"><br>
									<label for="clave">Contraseña:</label>
									<input type="password" name="clave" id="clave"><br><br>
									<input type="submit" value="entrar">
								</form>
								</header>
								<div class="jumplink pic">
									<img src="images/116-2.jpg" alt="" />
								</div>
							</article>
					</div>

				<!-- Footer -->
					<div id="footer">
						
					</div>

			</div>

			<?php }else{
				
				if($_SESSION["perfil"]=="admin"){
				?>


				
			<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
							<a href="#rechum" class="icon solid fa-user-circle"><span>RRHH</span></a>
							<a href="#almac" class="icon solid fa-boxes"><span>Almacen</span></a>
							<a href="#cocina" class="icon solid  fa-utensils"><span>Cocina</span></a>
							<a href="logout.php" class="icon solid fa-door-open"><span>SALIR</span></a>
						<!-- <a href="https://twitter.com/ajlkn" class="icon brands fa-twitter"><span>Twitter</span></a> -->
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Administracion trabajadores -->
							<article id="rechum" class="panel">
								<header>
									<h1 style="  text-decoration: underline;">Administracion Trabajadores</h1><br>
								</header><header>
									<h2>Alta nuevo camarero</h2></header><br>
									<form action="altacamarero.php" method="post">
										<input type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="^[a-zA-Z]+(([a-zA-Z ])?[a-zA-Z]*)*$" required><br><br>
										<input type="text" name="apellidos" id="apellidos" pattern="^[a-zA-Z]+(([a-zA-Z ])?[a-zA-Z]*)*$" placeholder="Apellidos" required><br><br>
										<input type="text" name="usuario" id="usuario" placeholder="Usuario" pattern="^[a-z0-9_-]{3,16}$" required><br><br>
										<input type="password" name="clave" id="clave" placeholder="Clave" required><br><br>
										
										<input type="submit" value="Registrar">
									</form>
								<header>
									<h2>Baja camrero</h2><br>
								</header>
									<form action="bajacamarero.php" method="post">
									<?php 
									$result=mysqli_query($conexion,"select idUsuario,nombre,apellidos,usuario,fecha_alta from usuarios where perfil='camarero'");
									if($result->num_rows > 0){
										echo "<table class='default' style='background-color:#f4f4f4'>";
										echo "<th>Nombre</th><th>Apellidos</th><th>Usuario</th><th>Fecha de alta</th><th>Seleccion</th>";
										while($row = $result->fetch_assoc()){
											echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellidos"]."</td><td>".$row["usuario"]."</td><td>".$row["fecha_alta"]."</td><td><input type='checkbox' id='chk' onchange='compruebaBaja()' name='cam[]' value='".$row["idUsuario"]."'></td></tr>";
										}
										
									
									}
									?>
									</table>
									
									<input  id="baja" type='submit' value='Dar de baja' disabled>
									</form>
								
														
							</article>

						<!-- Administracion Almacen -->
						<article id="almac" class="panel">
								<header>
									<h1 style="  text-decoration: underline;">Administracion Almacen</h1><br>
								</header>
								<header><h2>Añadir nuevo proveedor</h2></header><br>
							<form method="post" action="agregarproveedor.php" id="formu">
								<input type="text" id="nombre" name="nombre" value="" placeholder="Nombre" required><br><br>
								<input type="text" id="direccion" name="direccion" value="" placeholder="Direccion" required>  <br><br>
								<input type="text" id="cif" name="cif" value="" placeholder="CIF" required>  <br><br>
								<input type="text" id="contacto" name="contacto" value="" required placeholder="Persona de contacto"><br><br>
								<input type="text" id="telefono" name="telefono" value="" placeholder="Telefono" required  pattern="^[9|8|7|6]\d{8}$"><br><br>
								<input type="text" id="email" name="email" placeholder="E-Mail" value="" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" required><br><br>
								<input type="submit" name="submit"  value="Agregar"  id="submit"/>
							</form>
							<header><h2>Modificar proveedor</h2></header>
							<select name="prov" id="prov" onchange="rellenaTabla()"><option value="x">Selecciona un proveedor</option></select><br><br>
							<div id="tablaproveedores"></div>
						</article>

						<!-- Administracion Cocina -->
						<article id="cocina" class="panel">
							<header>
								<h1 style="  text-decoration: underline;">Administracion Cocina</h1><br>
							</header>
							<header><h2>Añadir plato a la carta</h2></header><br>
							<form method="post" action="agregarplato.php" id="fplato" enctype="multipart/form-data">
							<input type="text" name="nombre" placeholder="Nombre del plato" pattern="^[A-Za-záéíóúñ,. ]+$" required><br><br>
							<input type="text" name="descripcion"  placeholder="Descripcion" pattern="^[A-Za-záéíóúñ,. ]+$" required><br><br>
							<input type="text" name="precio" placeholder="Precio del plato" pattern="^[0-9]{1,2}(\.[0-9][0-9]?)?$" required><br><br>
							Foto del plato:<input type="file" name="foto" id="foto"><br><br>
							<p style="color:red"><?php if(isset($_SESSION["errorimagen"])){echo $_SESSION["errorimagen"];unset($_SESSION["errorimagen"]);}?></p>
							<input type="submit" value="Agregar">
							<input type="reset" value="Limpiar campos">
							</form>
							<header><h2>Modificar plato</h2></header><br>
							<select name="listaplatos" id="listaplatos" onchange="modificaPlato()"><option value="x">Selecciona un plato</option>
							<?php
								$result=mysqli_query($conexion,"select idPlato,nombre from platos");
								while($row=$result->fetch_assoc()){
								echo "<option value='".$row["idPlato"]."'>".$row["nombre"]."</option>";
							}
							mysqli_close($conexion);
							?>
							</select>
							<div id="platomod"></div>
						</article>


					</div>

				<!-- Footer -->
					<div id="footer">
						
					</div>

			</div>
					<?php }else{?>
							<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
							<a href="#mesas" class="icon solid fa-table"><span>Mesas</span></a>
							<a href="logout.php" class="icon solid fa-door-open"><span>SALIR</span></a>
						<!-- <a href="https://twitter.com/ajlkn" class="icon brands fa-twitter"><span>Twitter</span></a> -->
						


					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Cobro mesas -->
							<article id="mesas" class="panel">
								<header>
								<?php
								$result=mysqli_query($conexion,'select idMesa,(SELECT usuarios.nombre from usuarios where usuarios.idUsuario=camarero) as cam from mesas where ocupada=1');
									if($result->num_rows > 0){
										echo "<table class='default' style='background-color:#f4f4f4'>";
										echo "<th>Nº Mesa</th><th>Camarero</th><th>Seleccion</th>";
										while($row = $result->fetch_assoc()){
											echo "<tr><td>".$row["idMesa"]."</td><td>".$row["cam"]."</td><td><button>Cobrar</button></td></tr>";
										}
										
									
									}
									?>
								</header>
														
							</article>
					</div>
				<?php	}} ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/javascript.js"></script>
			<script src="assets/js/ajax.js"></script>
			
	</body>
</html>