<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html");
    include 'header.php';
?>
<title>Profilo</title>

<div id="breadcrumb">
	<p>Ti trovi in: Profilo</p>
</div>

<div id="menu">
	<ul>
		<li xml:lang="en"><a href="../php/index.php">Home</a></li>
		<li><a href="../php/famous.php">Personaggi famosi</a></li>
		<li xml:lang="en"><a href="../php/fanart.php">Fan art</a></li>
		<li xml:lang="en"><a href="../php/fun_facts.php">Fun facts</a></li>
		<li><a href="../php/about_us.php">Chi siamo</a></li>
		<li><a href="../php/rules.php">Regolamento</a></li>
    </ul>
</div>

<div id="content">
	<div id="profile-view">
		<h2>I miei dati utente</h2>
			<dt>La mia <span xml:lang="en">email</span>:</dt>
			<dd><?php
				$email = $_SESSION['EMAIL'];
				echo "$email"; 
			?></dd></br>
			<dt>Tipo di utenza: </dt>
			<?php
				$user = $_SESSION['PERMISSION'];
				if($user == 1)	{
					echo "Utente";
				} else {
					echo "Amministratore";
					echo "<div id='customlink'>";
					echo "<a href='../php/admin.php' id='prevbutton'>Pannello amministratore</a>";
					echo "</div>";
				} 
			?>
		</dl> 
	</div>
	</br></br></br>
	<div id='customlink'>
		<a id='prevbutton' href="../php/modify_pwd.php">Modifica password</a>
		<a id='nextbutton' href="../php/remove_profile.php">Rimuovi profilo</a>
	</div>
</div>

<?php 
	$page_footer = readfile("../html/footer.html");
?>