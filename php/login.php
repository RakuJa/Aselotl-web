<?php
    session_start();
    $page_header = readfile("../html/head.html"); ?>
	<title>Accedi</title>
	<?php
    include 'header.php';
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
		header("location: ../php/index.php");
	}
	$page_body = readfile("../html/login.html");
?>
<main id="content">
<h1>ACCEDI</h1>
	<form method="post" action="../php/login_check.php" id="login_form" class="vertical_input_form">
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
			<input type="text" required name="email" id="email" maxlength="50"/>

			<label for= "pwd" xml:lang="en" lang="en">Password:</label>
			
			<div style="float: right;">
			<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
			<label for="show_password">Mostra password</label>
			</div>
			
			<input type="password" required name="pwd" id="pwd" maxlength= "50"/>

			<input type="checkbox" id="remember_me" name="remember_me"/>
			<label for="remember_me">Ricordati di me</label>
			
			<!--<input type="submit" id="login_btn" class="btn" name="accedi" value="Accedi" tabindex="4" />-->
			<button type="submit" id="login_btn" class="btn" name="accedi" value="Accedi">Login</button>


			<a href="../php/register.php" style="float: right;">Non sei ancora registrato? CLICCA QUI</a>  
		</fieldset>
   </form>
</main>


<?php
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>