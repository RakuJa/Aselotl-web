<div id="header">
	<a href="index.php" class="logo"><img id="logo" src="../img/logo_small.png" alt="Immagine stilizzata della faccia di un axolotl sorridente sorridente" /> Axolotl Society</a>
	<div class="header-right">
		<?php 
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
			if($url == "http://127.0.0.1/php/profile.php") { ?>
				<p> Profilo </p>
			<?php } else { ?>
				<a href="../php/profile.php" class="colored"> Profilo </a>
			<?php } ?>
		<a href="../php/logout.php" class="colored">Logout</a>
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
