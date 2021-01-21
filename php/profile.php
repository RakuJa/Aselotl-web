<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html"); ?>
	<title>Profilo</title>
	<?php
	$page_theme = readfile("../html/toggle_theme.html");
    include '../php/header.php';
	$page_body = readfile("../html/profile.html");
?>

<main id="content">
<div class='customlink'>
<h1>PROFILO</h1>
	<div id="profile-view">
		<a href='../php/add_fanart.php'>Carica una <span xml:lang="en" lang="en">fan art</span></a>
		<a href='../php/my_fanart.php'>Le mie <span xml:lang="en" lang="en">fan art</span></a>
	</div>
</div>
<fieldset class="profile">
	<legend>I miei dati utente</legend>
		<label for="email">La mia <span xml:lang="en" lang="en">email</span>:</label>
		<?php
			$email = $_SESSION['EMAIL'];
			echo "<textarea id='email' readonly>$email</textarea>"; 
		?><br />
		<label for="user">Tipo di utenza: </label>
		<?php
			$user = $_SESSION['PERMISSION'];
			if($user == 1)	{
				echo "<textarea id='user' readonly>Utente</textarea>";
			} else {
				echo "<textarea id='user' readonly>Amministratore</textarea>";
				echo "<a href='../php/admin.php' class='leftbutton'>Pannello amministratore</a>";
			} 
		?>
	<br /><br /><br /><br />
	<?php
		$email = $_SESSION["EMAIL"];
		echo "<a href='edit_password.php?email=",  urlencode($email), "' class='leftbutton'>Modifica password </a>";
		echo "<a href='logic/delete_account.php?email=", urlencode($email), "' class='rightbutton'>Rimuovi profilo</a>";
	?>
</fieldset>
<div id="clearing_element"></div>


<?php 
	$page_footer = readfile("../html/footer.html");
?>