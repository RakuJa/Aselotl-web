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
		<span role="alert" style="color:#EB0000">
			<?php
			if(isset($_SESSION["error"])){
				$error = $_SESSION["error"];
				echo "ERRORE: $error <br /><br />";
			} ?>
			</span>
			<noscript>
				<div class="msg_box warning_box">
					ATTENZIONE: <span xml:lang="en" lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
					NON ESSERE DISPONIBILI
				</div>
			</noscript> 
			<label for="email" xml:lang="en" lang="en">Email:</label>
			<input type="text" required name="email" id="email" maxlength="50" onkeyup="check_email(), check_all()"/><br />
			<span id="message0"></span><br /><br />
			
			<label for="pwd" xml:lang="en" lang="en">Password:</label>
			
			<div style="float: right;">
			<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
			<label for="show_password">Mostra password</label>
			</div>
			
			<input type="password" required name="pwd" id="pwd" maxlength= "50" onkeyup="check_pwd(), confirm_pwd(), check_all()"/><br />
			<span id="message1"></span><br /><br />
			
			<label for="rpwd" xml:lang="en" lang="en">Ripeti Password:</label>
			<input type="password" required name="rpwd" id="rpwd" maxlength= "50" onkeyup="confirm_pwd(), check_all()"/>
			<span id="message2"></span><br /><br />
			
			<!--<input type="submit" id="register_btn" class="btn" name="Registrati" value="Registrati" tabindex="4" />-->
			<button type="submit" disabled id="register_btn" class="btn" name="Registrati" value="Registrati">Registrati</button>

			<a href="../php/login.php" style="float: right;">Sei già registrato? CLICCA QUI</a>  
		</fieldset>
   </form>
</main>
<?php
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>