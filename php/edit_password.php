<?php
    require_once("logic/sessione.php");
    require_once("logic/re_place_holder.php");
	if ($_SESSION['logged']==false) {
		header("location: 401.php");
	}
	$page_head = (new re_place_holder)->replace("../html/head.html","%TITLE%","<title>Modifica password</title>");
	echo $page_head;
    include '../php/header.php';
    $email="";
    if (isset($_GET['email'])) {
        $email=$_GET['email'];
    }else {
        $email=$_SESSION['EMAIL'];
    }
	if($email!=""){
		$page_body = (new re_place_holder)->replace("../html/edit_password.html","%EMAIL%",$email);
	}else{
		$page_body = (new re_place_holder)->replace("../html/edit_password.html","%EMAIL%","");
    }
    echo $page_body;
	$page_footer = readfile("../html/footer.html");
?>
