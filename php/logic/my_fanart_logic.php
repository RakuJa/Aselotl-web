<?php
	require_once("sessione.php");
	require_once('../php/logic/connessione.php');
	require_once('../php/logic/debugger.php');
	require_once("logic/re_place_holder.php");
	$obj_connection = new DBConnection();
	$error = "";
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."Errore di connessione al database<br />";
        $no_error=false;
	}
	$email = $_SESSION['EMAIL'];
	$content="";
	$temp = file_get_contents("../html/searchbar.html");
	$temp = (new re_place_holder)->page_replace($temp,"%LINK%","../php/my_fanart.php");
	$temp = (new re_place_holder)->page_replace($temp,"%PLACEHOLDER%","Inserisci le parole chiave della immagine interessata...");
	$content .= $temp;
	$keywords = "";
	if (isset($_GET['keywords']) && $_GET['keywords']!="") {
		$keywords = $_GET['keywords'];
		$content = (new re_place_holder)->page_replace($content,"%KEYWORDS%", $keywords);
		$content .= "<a href='../php/my_fanart.php' class='rightbutton'>Annulla ricerca</a>";
		$content .= "<br/><br/><br/><br/><br/><br/>";
		$array_kw = explode(" ",$keywords);
		$counter = 0;
		$query = "";
    	foreach ($array_kw as &$kw) {
    		preg_replace('/\PL/u', '', $kw);
    		if ($counter==0) {
				$query = "
					SELECT A0.IMGID,A0.DESCRIPTION,A0.EMAIL FROM (

					SELECT A1.IMGID, DESCRIPTION, EMAIL FROM foto AS A1, fotokeyword AS A2 WHERE
						A1.IMGID = A2.IMGID AND KEYWORD = '$kw') AS A$counter " ;
			} else {
				$query = $query." JOIN (SELECT * FROM fotokeyword WHERE KEYWORD = '$kw') AS A$counter ";
			}
			$counter=$counter+1;
       	}
       	if ($counter>1) {
       		$iterate = true;
       		$i=0;
       		while ($i<$counter) {
       			if ($i==0) {
       				$x = $i+1;
       				$query = $query." ON A$i.IMGID = A$x.IMGID ";
       				$i = $i+2;
       			}else {
       				$query = $query." = A$i.IMGID ";
       				$i = $i+1;
       			}
       		}
       	}
		   $query = $query."WHERE EMAIL = '$email' ORDER BY A0.IMGID DESC";
	}else {
		$query = "SELECT * FROM foto WHERE EMAIL='$email' ORDER BY IMGID DESC";
		$content = (new re_place_holder)->page_replace($content,"%KEYWORDS%", "");
	}
	$files = $obj_connection->queryDB($query);
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
				header("Location: http://$host$uri/".$extra);
			}
			for($i = 0; $i < $images_per_page; $i++) {
				$curr_image = $page*$images_per_page+$i;
				if(isset($files[$curr_image]['IMGID'])) {
					$img = $files[$curr_image]['IMGID'];
					$dsc = $files[$curr_image]['DESCRIPTION'];
					$content .= "<br />";
					$content .= "<figure>";
					$content .= "<img src='../img/fanart/$img' alt=''/>";
					$content .= "<figcaption> $dsc </figcaption>";
					$content .= "</figure>";
					$content .= "<a href='../php/logic/remove_fanart.php?image=".urlencode($img). "' class='rightbutton'>Rimuovi</a></p><br /><br />";
					$content .= "<hr><br />";
				}
			}
			$nextpage = $page+1;
			$prevpage = $page-1;
			if(isset($files[$nextpage*$images_per_page]['IMGID'])  )
			{
				$content .= "<a href='../php/my_fanart.php?page=$nextpage&keywords=$keywords' class='rightbutton'>Pagina sucessiva</a>";
			}
			if(isset($files[$prevpage*$images_per_page]['IMGID'])  )
			{
				$content .= "<a href='../php/my_fanart.php?page=$prevpage&keywords=$keywords' class='leftbutton'>Pagina precedente</a>";
			}
			$content .= "<br/><br/>";
			if ($totpages>1) {
			$content .= "<h2 class='pagenum'>$nextpage / $totpages</h2> ";
			}
		}
		else {
			$page = 0;
			if(isset($files[$page]['IMGID'])){
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/my_fanart.php?page=0'."&keywords=".$keywords;
				header("Location: http://$host$uri/".$extra);
			}
		}
	}
	else {
		if(is_null($files)) {
			$content .= "<p>Nessuna <span xml:lang='en' lang='en'>fan art</span> trovata con queste parole chiave</p>";
		}
		else {
			$content .= "<span id='error' class='error'>ERRORE: Connessione con il database fallita</span>";
		}
	}
	echo $content;
?>