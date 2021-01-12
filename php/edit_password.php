<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html"); ?>
	<title>Modifica password</title>
	<?php
    include 'header.php';
    $email="";
    if (isset($_GET['email'])) {
        $email=$_GET['email'];
    }else {
        $email=$_SESSION['EMAIL'];
    }
	$page_body = readfile("../html/edit_password.html");
?>

<main id="content">
	<noscript>
		<div class="error">
			ATTENZIONE: <span xml:lang="en" lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
			NON ESSERE DISPONIBILI
		</div>
	</noscript>
<h1>MODIFICA <span xml:lang="en" lang="en">PASSWORD</span></h1>
	<form method="post" action="edit_password_check.php" id="edit_pwd" class="vertical_input_form">
		<fieldset>
			<legend>Inserisci dati:</legend><br />
			
			<label for="email" xml:lang="en" lang="en">Email:</label>

			<input type="text" required name="email" id="email" maxlength="50" class="full_width_input" readonly
			<?php echo 'value="'.$email.'"';?>><br /><br />
			<label for="pwd">Nuova <span xml:lang="en" lang="en">password</span>:</label>
			
			<div class="right">
			<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
			<label for="show_password">Mostra password</label>
			</div>

			<input type="password" required name="pwd" id="pwd" maxlength= "50" class="full_width_input" onkeyup="check_pwd(), confirm_pwd(), check_edit()"/><br />
			<span id="message1"></span><br /><br />
			
			<label for="rpwd" xml:lang="en" lang="en">Ripeti Password:</label>
			<input type="password" required name="rpwd" id="rpwd" maxlength= "50" class="full_width_input" onkeyup="confirm_pwd(), check_edit()"/>
			<span id="message2"></span><br /><br />

			<input type="submit" disabled name="mod_pwd" id="change_psw_btn" value="Cambia password" class="btn"/>
		</fieldset>
	</form>            
    
<?php
	$page_footer = readfile("../html/footer.html");
?>
