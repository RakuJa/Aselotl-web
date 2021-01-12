<?php
    session_start();
    $page_header = readfile("../html/head.html"); ?>
	<title>Registrati</title>
	<?php
    include 'header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: ../php/index.php");
	}
	$page_body = readfile("../html/register.html");
?>  

<main id="content">
<h1>REGISTRATI</h1>
	<form method="post" action="../php/register_check.php" id="register_form" class="vertical_input_form">
		<fieldset>
		<legend>Inserisci dati:</legend><br />
		<span id="error" class="error">
			<?php
			if(isset($_SESSION["error"])){
				$error = $_SESSION["error"];
				echo "ERRORE:<br />$error<br /><br />";
			} ?>
			</span>
			<noscript>
				<div class="msg_box warning_box">
					ATTENZIONE: <span xml:lang="en" lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
					NON ESSERE DISPONIBILI
				</div>
			</noscript> 
			<label for="email" xml:lang="en" lang="en">Email:</label>
			<input type="text" required name="email" id="email" maxlength="50" onkeyup="check_email(), check_all(), remove_error()"/><br />
			<span id="message0"></span><br /><br />
			
			<label for="pwd" xml:lang="en" lang="en">Password:</label>
			
			<div class="right">
			<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
			<label for="show_password">Mostra password</label>
			</div>
			
			<input type="password" required name="pwd" id="pwd" maxlength= "50" onkeyup="check_pwd(), confirm_pwd(), check_all(), remove_error()"/><br />
			<span id="message1"></span><br /><br />
			
			<label for="rpwd" xml:lang="en" lang="en">Ripeti Password:</label>
			<input type="password" required name="rpwd" id="rpwd" maxlength= "50" onkeyup="confirm_pwd(), check_all(), remove_error()"/>
			<span id="message2"></span><br /><br />
			
			<button type="submit" disabled id="register_btn" class="btn" name="Registrati" value="Registrati" aria-describedby="error">Registrati</button>

			<a href="../php/login.php" class="right">Sei già registrato? CLICCA QUI</a>  
		</fieldset>
   </form>

<?php
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>