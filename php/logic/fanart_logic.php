<?php  
	require_once("../php/logic/connessione.php");
    require_once("../php/logic/debugger.php");
    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."Errore di connessione al database";
        $no_error=false;
    }
	//echo "<a href='delete_account.php?email=", urlencode($email), "'>Elimina</a>";
    if (isset($_SESSION['logged']) && $_SESSION['logged']==true){
		echo"<a href='../php/add_fanart.php'>Carica una <span xml:lang='en' lang='en'>fan art</span></a>";
		echo"<a href='../php/my_fanart.php'>Le mie <span xml:lang='en' lang='en'>fan art</span></a>";
	} else {
		echo"<a href='../php/login.php'>Accedi per caricare una <span xml:lang='en' lang='en'>fan art</span></a>";
	}
	$page_body= readfile("../html/searchbar.html");
	
	$keywords = "";
	if (isset($_GET['keywords']) && $_GET['keywords']!="") {
		$keywords = $_GET['keywords'];
		$array_kw = explode(" ",$keywords);
		$counter = 0;
		$query = "";
    	foreach ($array_kw as &$kw) {
    		preg_replace('/\PL/u', '', $kw);
    		if ($counter==0) {
				$query = "
					SELECT A0.PATH,A0.DESCRIPTION,A0.EMAIL FROM (

					SELECT A1.PATH, DESCRIPTION,EMAIL FROM foto AS A1, fotokeyword AS A2 WHERE
						A1.PATH = A2.PATH AND KEYWORD = '$kw') AS A$counter " ;
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
       				$query = $query." ON A$i.PATH = A$x.PATH ";
       				$i = $i+2;
       			}else {
       				$query = $query." = A$i.PATH ";
       				$i = $i+1;
       			}
       		}
       	}
       	$query = $query." ORDER BY A0.PATH DESC";
	}else {
		$query = "SELECT * FROM foto ORDER BY PATH DESC";
	}
	$files = $obj_connection->queryDB($query);
	$lenght = count($files);
	$curr_page = 0;
	$images_per_page = 2;
	$totpages = ceil($lenght/$images_per_page);
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
		if ($page + 1 > $totpages || $page < 0)	{
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = '../php/fanart.php';
			header("Location: http://$host$uri/".$extra);
		}
		for($i = 0; $i < $images_per_page; $i++) {
			$curr_image = $page*$images_per_page+$i;
			if(isset($files[$curr_image]['PATH'])) {
				$img = $files[$curr_image]['PATH'];
				$dsc = $files[$curr_image]['DESCRIPTION'];
				$mail = $files[$curr_image]['EMAIL'];
				$img_name = str_replace('../img/fanart/', '', $img);
				echo "<br />";
				echo "<figure>";
				echo "<img src='$img' alt=''/>";
				echo "<figcaption> $dsc </figcaption>";
				echo "</figure>";
				if (isset($_SESSION['PERMISSION']) && $_SESSION['PERMISSION'] == 0){
					echo "<a href='../php/logic/remove_fanart.php?adm=0&image=",urlencode($img_name), "' class='rightbutton'>Rimuovi</a>";
				}
				echo "<p class='small'>Immagine caricata da $mail</p><br />";
				echo "<hr><br />";
			}
		}
		$nextpage = $page+1;
		$prevpage = $page-1;
		if(isset($files[$nextpage*$images_per_page]['PATH'])  ) {
			echo "<a href='../php/fanart.php?page=$nextpage&keywords=$keywords' class='rightbutton'>Pagina successiva</a>";
		}
		if(isset($files[$prevpage*$images_per_page]['PATH'])  ){
			echo "<a href='../php/fanart.php?page=$prevpage&keywords=$keywords' class='leftbutton'>Pagina precedente</a>";
		}
		echo "<br/><br/>";
		if ($totpages>1) {
		echo "<h2 class='pagenum'>$nextpage / $totpages</h2> ";
		}
	} else {
		$page = 0;
		if(isset($files[$page]['PATH'])){
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = '../php/fanart.php?page=0'."&keywords=".$keywords;
			header("Location: http://$host$uri/".$extra);
		}
	}
?>