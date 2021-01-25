<?php
	require_once("sessione.php");
    setcookie("user_email","",time()-3600,'/');
    setcookie("user_pwd","",time()-3600,'/');
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$tmp = array_shift(explode('?', $_SESSION['prev_page']));
	if($_SESSION['prev_page'] == 'index.php' || $_SESSION['prev_page'] == 'dgiachet' || $_SESSION['prev_page'] == 'profile.php' || $tmp == 'admin.php' || $tmp == 'my_fanart.php' || $tmp == 'add_fanart.php' || $tmp == 'edit_password.php') {
		header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/");
	} else {
		header("location: ".$protocol.$_SERVER['HTTP_HOST']."/dgiachet/php/".$_SESSION['prev_page']);
	}
    session_unset();
?>
