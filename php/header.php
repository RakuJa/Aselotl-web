<?php
	require_once("logic/sessione.php");
	require_once("logic/re_place_holder.php");
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$host  = $_SERVER['HTTP_HOST'];
	$content = "";
	$temp = file_get_contents(__DIR__. "/../html/header.html");
	if($url == $protocol.$_SERVER['HTTP_HOST']."/dgiachet/index.php" || $url == $protocol.$_SERVER['HTTP_HOST']."/dgiachet/"){
		$temp = (new re_place_holder)->page_replace($temp,"%LOGO%","<div xml:lang='en' lang='en' class='logo'><img id='logo' src='../../dgiachet/img/logo_small.png' alt='' /> Axolotl Society </div>");
	}else{
		$temp = (new re_place_holder)->page_replace($temp,"%LOGO%","<a href='../../dgiachet' xml:lang='en' lang='en' class='logo'><img id='logo' src='../../dgiachet/img/logo_small.png' alt='' /> Axolotl Society</a>");
	}
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		if($url == $protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/profile.php") {
				$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<p> Profilo </p>");
			} else {
				$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<a href='../../dgiachet/php/profile.php' class='colored'> Profilo </a>");
			}
		$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<a href='../../dgiachet/php/logic/logout.php' xml:lang='en' lang='en' class='colored'>Logout</a>");
	} else {
		if($url == $protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/login.php") {
			$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<p> Accedi </p>");
		} else {
			$temp = (new re_place_holder)->page_replace($temp,"%PROFILO_LOGIN%","<a href='../../dgiachet/php/login.php' class='colored'> Accedi </a>");
		}
		if($url == $protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/register.php") {
			$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<p> Registrati </p>");
		} else {
			$temp = (new re_place_holder)->page_replace($temp,"%LOGOUT_REGISTRATI%","<a href='../../dgiachet/php/register.php' class='colored'> Registrati </a>");
		}
	}
	$content .= $temp;
	echo($content);
	
?>
