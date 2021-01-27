<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$content = "";
	$temp = file_get_contents(__DIR__. "/../html/header.html");
	if($_SESSION['current_page'] == 'index.php'){
		$temp = (new re_place_holder)->page_replace($temp,"%LOGO%","<div xml:lang='en' lang='en' class='logo'><img id='logo' src='../img/logo_small.png' alt='' /> Axolotl Society </div>");
	}else{
		$temp = (new re_place_holder)->page_replace($temp,"%LOGO%","<a href='index.php' xml:lang='en' lang='en' class='logo'><img id='logo' src='../img/logo_small.png' alt='' /> Axolotl Society</a>");
	}
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		if($_SESSION['current_page'] == 'profile.php') {
				$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<p> Profilo </p>");
			} else {
				$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<a href='profile.php' class='colored'> Profilo </a>");
			}
		$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<a href='logic/logout.php' xml:lang='en' lang='en' class='colored'>Logout</a>");
	} else {
		if($_SESSION['current_page'] == 'login.php') {
			$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<p> Accedi </p>");
		} else {
			$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<a href='login.php' class='colored'> Accedi </a>");
		}
		if($_SESSION['current_page'] == 'register.php') {
			$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<p> Registrati </p>");
		} else {
			$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<a href='register.php' class='colored'> Registrati </a>");
		}
	}
	$content .= $temp;
	echo($content);
	
?>
