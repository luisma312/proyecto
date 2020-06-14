<?php
session_start();
if(isset($_SESSION["perfil"])){
	header("Location:secempleado.php");
}
?>
<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	
-->
<html>
	<head>
		<title>INICIO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload" onload="cargaCarta()">

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="#" class="icon solid fa-home"><span>Inicio</span></a>
						<a href="#carta" class="icon solid fa-clipboard-list"><span>Carta</span></a>
						<a href="#posicion" class="icon solid fa-globe"><span>Localizacion</span></a>
						<a href="secempleado.php" class="icon solid fa-users"><span>Empleados</span></a>
						<!-- <a href="https://twitter.com/ajlkn" class="icon brands fa-twitter"><span>Twitter</span></a> -->
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="home" class="panel intro">
								<header>
                                    <h1>Bar Nombre Por Especificar</h1>
								</header>
								<div class="jumplink pic">
									<img src="images/116-2.jpg" alt="" />
								</div>
							</article>
			
						<!-- Work -->
							<article id="carta" class="panel">
								<header>
									<h2>Carta</h2>
								</header>
								<p>
								Productos mostrados:
								<select name="tipo" id="selec" onchange="cargaCarta()">
								<option selected value="todo">Toda la carta</option>
								<option value="destac">Productos destacados</option>
								</select></p>
								
								<section>
									<div class="row" id="rellenaCarta">
									</div>
								</section>
							</article>

							<article id="posicion" class="panel intro">
								<header>
                                    <h1>Bar Nombre Por Especificar</h1>
                                    <p>Ubicado en algun lugar, numero 56 de la localidad INDEFINIDA</p>
								</header>
								
								<div class="jumplink pic">
									<div id="map"></div>
								</div>
							</article>
						<!-- Contact -->
							<article id="contact" class="panel">
								<header>
									<h2>Contact Me</h2>
								</header>
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="col-6 col-12-medium">
												<input type="text" name="name" placeholder="Name" />
											</div>
											<div class="col-6 col-12-medium">
												<input type="text" name="email" placeholder="Email" />
											</div>
											<div class="col-12">
												<input type="text" name="subject" placeholder="Subject" />
											</div>
											<div class="col-12">
												<textarea name="message" placeholder="Message" rows="6"></textarea>
											</div>
											<div class="col-12">
												<input type="submit" value="Send Message" />
											</div>
										</div>
									</div>
								</form>
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/ajax.js"></script>
			<script src="assets/js/javascript.js"></script>
			<script async defer
    		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx42ttqxanDGh0ORtraZ72R131uLuAQwo&callback=initMap">
    		</script>
	</body>
</html>