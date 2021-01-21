<?php 
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		if($url == "http://127.0.0.1/php/profile.php") {
			echo'<p> Profilo </p>';
		} else {
			echo'<a href="../php/profile.php" class="colored"> Profilo </a>';
		}
	echo'<a href="../php/logic/logout.php" xml:lang="en" lang="en" class="colored">Logout</a>';
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
