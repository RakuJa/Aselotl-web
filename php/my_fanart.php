<?php
    require_once('connessione.php');
    require_once('debugger.php');
    session_start();
    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        $no_error=false;
    }
    $page_head = readfile("../html/head.html"); ?>
	<title xml:lang="en" lang="en">Le mie fan art</title>
	<?php
    include 'header.php';
    $page_body = readfile("../html/my_fanart.html");
?>
<main id="content">
	<div class='customlink'>
	<h1>LE MIE <span xml:lang="en" lang="en">FAN ART</span></h1>
		<?php 
			if (isset($_SESSION['logged']) && $_SESSION['logged']==true){
		?>
		<div id='clear_top'></div>
			<a href='add_fanart.php'>Carica una <span xml:lang="en" lang="en">fan art</span></a>
		<?php
		}
		?>
	</div>
	<div id='searchbar'>
	<label for="search">Cerca immagine: </label>
	<input type="text" id="search" name="search" placeholder="Inserisci termini da cercare..." title="Cerca"/>
	<input type="submit" value="Cerca" />
	<br/><br/><br/><br/>
	</div>
	<?php
		$email = $_SESSION['EMAIL'];
		$sql = "SELECT * FROM foto WHERE EMAIL='$email' ORDER BY PATH DESC";
		$files = $obj_connection->queryDB($sql);
		$lenght = count($files);
		$curr_page = 0;
		$images_per_page = 3;
		$totpages = ceil($lenght/$images_per_page);
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
			if ($page + 1 > $totpages || $page < 0)	{
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/my_fanart.php';
				header("Location: http://$host$uri/$extra");;
			}
			for($i = 0; $i < $images_per_page; $i++)
			{
				$curr_image = $page*$images_per_page+$i;
				if(isset($files[$curr_image]['PATH']))
				{
					$img = $files[$curr_image]['PATH'];
					$dsc = $files[$curr_image]['DESCRIPTION'];
					$img_name = str_replace('../img/fanart/', '', $img);
					echo "<hr>";
					echo "<br />";
					echo "<img src='$img' alt='$dsc' />";
					echo "<p> $dsc ";
					echo "<a href='../php/remove_fanart.php?=$img_name' class='rightbutton'>Rimuovi</a></p><br /><br />";
				}
			}
			$nextpage = $page+1;
			$prevpage = $page-1;
			if(isset($files[$nextpage*$images_per_page]['PATH'])  )
			{
				echo "<a href='../php/my_fanart.php?page=$nextpage' class='rightbutton'>Pagina sucessiva</a>";
			}
			if(isset($files[$prevpage*$images_per_page]['PATH'])  )
			{
				echo "<a href='../php/my_fanart.php?page=$prevpage' class='leftbutton'>Pagina precedente</a>";
			}
			echo "<br/><br/>";
			if ($totpages>1) {
			echo "<h2 id='pagenum'>$nextpage / $totpages</h2> ";
			}
		}
		else
		{
			$page = 0;
			if(isset($files[$page]['PATH'])){
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/my_fanart.php?page=0';
				header("Location: http://$host$uri/$extra");
			}
		}
	?>
	<div id="clearing_element"></div>
</main>

<?php
    $page_footer = readfile("../html/footer.html");
?>
