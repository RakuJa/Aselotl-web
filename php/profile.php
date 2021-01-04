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
	<div id='clear_top'></div>
	<div id='customlink'>
		<a href='../php/my_fanart.php' id='selectbutton'>Le mie <span xml:lang="en">fan art</span></a>
	</div>
	<h1>PROFILO</h1>
		<h2>I miei dati utente</h2>
			<dt>La mia <span xml:lang="en">email</span>:</dt>
			<dd>
			<input type="text" id="email" readonly value=
			<?php
				$email = $_SESSION['EMAIL'];
				echo "$email"; 
			?> class="full_width_input">
			</dd></br>
			<dt>Tipo di utenza: </dt>
			<dd>
			<input type="text" id="email" readonly value=
			<?php
				$user = $_SESSION['PERMISSION'];
				if($user == 1)	{
					echo "Utente ";
				} else {
					echo "Amministratore>";
					echo "<div id='customlink'>";
					echo "<a href='../php/admin.php' id='prevbutton'>Pannello amministratore</a>";
					echo "</div>";
				} 
			?>
			</dd>
		</dl> 
	</div>
	</br></br></br></br>
	<div id='customlink'>
		<?php
			$email = $_SESSION["EMAIL"];
			echo "<a href=edit_password.php?email=",urlencode($email)," id='prevbutton'>Modifica password </a>";
			echo "<a href=delete_account.php?email=",urlencode($email)," id='nextbutton'>Rimuovi profilo</a>";
			?>
	</div>
	<div id="clearing_element"></div>
</div>

<?php 
	$page_footer = readfile("../html/footer.html");
?>