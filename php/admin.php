<?php
    session_start();
    require_once('debugger.php');
    require_once('connessione.php');
    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        $no_error=false;
    }
	if ($_SESSION['logged']==false || $_SESSION['PERMISSION']!=0) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html"); ?>
	<title>Pannello amministratore</title>
	<?php
    include 'header.php';
	$page_body = readfile("../html/admin.html");
?>

<main id="content">
    <h1 id="page_title">PANNELLO AMMINISTRATORE</h1>
    <?php
        $tempmail = $_SESSION['EMAIL'];
        $sql = "SELECT EMAIL, PERMISSION FROM user WHERE EMAIL<>'$tempmail'";
        $files = $obj_connection->queryDB($sql);
        $lenght = count($files);
        $curr_page = 0;
        $users_per_page = 5;
        $totpages = ceil($lenght/$users_per_page);
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
			if ($page + 1 > $totpages || $page < 0)	{
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../php/admin.php';
				header("Location: http://$host$uri/$extra");;
			}
            for($i = 0; $i < $users_per_page; $i++)
            {
                $curr_user = $page*$users_per_page+$i;
                if(isset($files[$curr_user]['EMAIL']))
                {
                    $tempperm = $files[$curr_user]['PERMISSION'];
					if($tempperm == 1)	{
						$perm = "Utente";
					} else {
						$perm = "Amministratore";
					}
                    $email = $files[$curr_user]['EMAIL'];
                    echo "<hr>";
                    echo "<div class='customlink'>";
                    echo "<a href='delete_account.php?email=", urlencode($email), "'>Elimina</a>";
                    echo "<a href='edit_password.php?email=", urlencode($email), "'>Modifica <span xml:lang='en' lang='en'> password </span> </a>";
                    echo "</div>";
                    echo "<h2> $email </h2>";
                    echo "<p> Permessi: $perm</p>";
                }
            }
            $nextpage = $page+1;
            $prevpage = $page-1;    
            if(isset($files[$nextpage*$users_per_page]['EMAIL'])  )
            {
                echo "<a href='../php/admin.php?page=$nextpage' class='rightbutton'>Pagina successiva</a>";
            }
            if(isset($files[$prevpage*$users_per_page]['EMAIL'])  )
            {
                echo "<a href='../php/admin.php?page=$prevpage' class='leftbutton'>Pagina precedente</a>";
            }
            echo "<br /><br />";
			if ($totpages>1) {
            echo "<h2 id='pagenum'>$nextpage / $totpages</h2> ";
			}
        }
        else
        {
            $page = 0;
            if(isset($files[$page]['EMAIL'])){
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = '../php/admin.php?page=0';
                header("Location: http://$host$uri/$extra");
            }
        }
    ?>
    <div id="clearing_element"> </div>
</main>
<?php
    $page_footer = readfile("../html/footer.html");
?>
