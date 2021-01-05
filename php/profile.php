<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html"); ?>
	<title>Profilo</title>
	<?php
    include 'header.php';
	$page_body = readfile("../html/profile.html");
?>

<main id="content">
	<div id="profile-view">
	<div id='clear_top'></div>
	<div class='customlink'>
		<a href='../php/my_fanart.php'>Le mie <span xml:lang="en" lang="en">fan art</span></a>
	</div>
	<h1>PROFILO</h1>
		<h2>I miei dati utente</h2>
			<label for="email">La mia <span xml:lang="en" lang="en">email</span>:</label>
			<input type="text" id="email" readonly value=
			<?php
				$email = $_SESSION['EMAIL'];
				echo "$email"; 
			?> class="full_width_input"><br />
			<label for="user">Tipo di utenza: </label>
			<input type="text" id="user" readonly value=
			<?php
				$user = $_SESSION['PERMISSION'];
				if($user == 1)	{
					echo "Utente>";
				} else {
					echo "Amministratore>";
					echo "<a href='../php/admin.php' class='leftbutton'>Pannello amministratore</a>";
				} 
			?>
	</div>
	<br /><br /><br /><br />
	<?php
		$email = $_SESSION["EMAIL"];
		echo "<a href='edit_password.php?email=",  urlencode($email), "' class='leftbutton'>Modifica password </a>";
		echo "<a href='delete_account.php?email=", urlencode($email), "' class='rightbutton'>Rimuovi profilo</a>";
	?>
	<div id="clearing_element"></div>
</main>

<?php 
	$page_footer = readfile("../html/footer.html");
?>