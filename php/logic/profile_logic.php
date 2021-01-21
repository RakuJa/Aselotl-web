<?php
	$email = $_SESSION['EMAIL'];
	echo "<textarea id='email' readonly>$email</textarea>"; 
	echo "<br /><label for='user'>Tipo di utenza: </label>";
	$user = $_SESSION['PERMISSION'];
	if($user == 1)	{
		echo "<textarea id='user' readonly>Utente</textarea>";
	} else {
		echo "<textarea id='user' readonly>Amministratore</textarea>";
		echo "<a href='../php/admin.php' class='leftbutton'>Pannello amministratore</a>";
	} 
	echo "<br /><br /><br /><br />";
	echo "<a href='edit_password.php?email=",  urlencode($email), "' class='leftbutton'>Modifica password </a>";
	echo "<a href='logic/delete_account.php?email=", urlencode($email), "' class='rightbutton'>Rimuovi profilo</a>";
	echo "</fieldset>";
?>