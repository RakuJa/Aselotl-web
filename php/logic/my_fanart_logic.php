<?php
	require_once('../php/logic/connessione.php');
    require_once('../php/logic/debugger.php');
	$email = $_SESSION['EMAIL'];
	$sql = "SELECT * FROM foto WHERE EMAIL='$email' ORDER BY PATH DESC";
	$files = $obj_connection->queryDB($sql);
	if ($files) {
		$lenght = count($files);
		$curr_page = 0;
		$images_per_page = 2;
		$totpages = ceil($lenght/$images_per_page);
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
			if ($page + 1 > $totpages || $page < 0)	{
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/my_fanart.php';
				header("Location: http://$host$uri/$extra");;
			}
			for($i = 0; $i < $images_per_page; $i++) {
				$curr_image = $page*$images_per_page+$i;
				if(isset($files[$curr_image]['PATH'])) {
					$img = $files[$curr_image]['PATH'];
					$dsc = $files[$curr_image]['DESCRIPTION'];
					$img_name = str_replace('../img/fanart/', '', $img);
					echo "<br />";
					echo "<figure>";
					echo "<img src='$img' alt=''/>";
					echo "<figcaption> $dsc </figcaption>";
					echo "</figure>";
					echo "<a href='../php/logic/remove_fanart.php?image=",urlencode($img_name), "' class='rightbutton'>Rimuovi</a></p><br /><br />";
					echo "<hr><br />";
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
			echo "<h2 class='pagenum'>$nextpage / $totpages</h2> ";
			}
		}
		else {
			$page = 0;
			if(isset($files[$page]['PATH'])){
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/my_fanart.php?page=0';
				header("Location: http://$host$uri/$extra");
			}
		}
	}
?>