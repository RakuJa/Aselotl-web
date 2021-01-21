</head>
<body>
<a id="skipNav" class="hide" href="#content">Vai al contenuto</a>
<div id="header">
	<a href="index.php" xml:lang="en" lang="en" class="logo"><img id="logo" src="../img/logo_small.png" alt="Faccia stilizzata di un axolotl sorridente" /> Axolotl Society</a>
	<div class="header-right">
		<div class="switch">
			<input type="checkbox" id="theme_switch" onclick="toggle_dark()"/>
			<label class="slider" for="theme_switch">Cambia tema</label>
		</div>
		<script src="../js/script.js"></script>
		<script> check_theme(); </script>
		<?php 
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
			if($url == "http://127.0.0.1/php/profile.php") {
				echo'<p> Profilo </p>';
			} else {
				echo'<a href="../php/profile.php" class="colored"> Profilo </a>';
			}
		echo'<a href="../php/logout.php" xml:lang="en" lang="en" class="colored">Logout</a>';
		} else {
			if($url == "http://127.0.0.1/php/login.php") {
				echo'<p> Accedi </p>';
			} else {
				echo'<a href="../php/login.php" class="colored"> Accedi </a>';
			}
			if($url == "http://127.0.0.1/php/register.php") {
				echo'<p> Registrati </p>';
			} else {
				echo'<a href="../php/register.php" class="colored"> Registrati </a>';
			}
        } ?>
	</div>
</div>
