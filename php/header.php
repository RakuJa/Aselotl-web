</head>
<body>
<a id="skipNav" class="hide" href="#content">Vai al contenuto</a>
<div id="header">
	<a href="index.php" xml:lang="en" lang="en" class="logo"><img id="logo" src="../img/logo_small.png" alt="Faccia stilizzata di un axolotl sorridente" /> Axolotl Society</a>
	<div class="header-right">
		<label class="switch">
		<input type="checkbox" onclick="toggle_dark()">
		<span class="slider round"></span>
		</label>
		<?php 
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
			if($url == "http://127.0.0.1/php/profile.php") { ?>
				<p> Profilo </p>
			<?php } else { ?>
				<a href="../php/profile.php" class="colored"> Profilo </a>
			<?php } ?>
		<a href="../php/logout.php" xml:lang="en" lang="en" class="colored">Logout</a>
		<?php } else {
			if($url == "http://127.0.0.1/php/login.php") { ?>
				<p> Accedi </p>
			<?php } else { ?>
				<a href="../php/login.php" class="colored"> Accedi </a>
			<?php }
			if($url == "http://127.0.0.1/php/register.php") { ?>
				<p> Registrati </p>
			<?php } else { ?>
				<a href="../php/register.php" class="colored"> Registrati </a>
			<?php } ?>
        <?php } ?>
	</div>
</div>
