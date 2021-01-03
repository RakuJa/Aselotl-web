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
    $page_head = readfile("../html/head.html");
    include 'header.php';
    /*$page_body = readfile("../html/admin.html");*/
?>
<title>Pannello amministratore</title>

<div id="breadcrumb">
            <p>Ti trovi in: Pannello amministratore</p>
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
            <h1 id="page_title">Pannello amministratore</h1>
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
                for($i = 0; $i < $users_per_page; $i++)
                {
                    $curr_user = $page*$users_per_page+$i;
                    if(isset($files[$curr_user]['EMAIL']))
                    {
                        $perm = $files[$curr_user]['PERMISSION'];
                        $email = $files[$curr_user]['EMAIL'];
                        echo "<hr>";
                        echo "<div id='customlink'>";
                        echo "<a href=delete_account.php?email=",urlencode($email)," id='selectbutton'>Elimina</a>";
                        echo "<a href=modify_account.php?email=",urlencode($email)," id='selectbutton'>Modifica utente </a>";
                        echo "</div>";
                        echo "<h2> $email </h2>";
                        echo "<p> Permessi: $perm</p>";
                    }
                }
                $nextpage = $page+1;
                $prevpage = $page-1;
                echo "<div id='customlink'>";
                if(isset($files[$nextpage*$users_per_page]['EMAIL'])  )
                {
                    echo "<a href='../php/admin.php?page=$nextpage' id='nextbutton'>Pagina sucessiva</a>";
                }
                if(isset($files[$prevpage*$users_per_page]['EMAIL'])  )
                {
                    echo "<a href='../php/admin.php?page=$prevpage' id='prevbutton'>Pagina precedente</a>";
                }
                echo "</div>";
                echo "<p> $nextpage / $totpages</p>"; /* PARZIALE DA FIXARE */
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
        </div>
<?php
    $page_footer = readfile("../html/footer.html");
?>
