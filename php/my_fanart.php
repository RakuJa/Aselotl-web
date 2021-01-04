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
    $page_head = readfile("../html/head.html");
    include 'header.php';
    $page_body = readfile("../html/my_fanart.html");
?>
<div id="content">
        <?php 
        if (isset($_SESSION['logged']) && $_SESSION['logged']==true){
        ?>
        <div id='clear_top'></div>
        <div id='customlink'>
            <a href='add_fanart.php' id='selectbutton'>Carica una <span xml:lang="en">fan art</span></a>
        </div>
        <?php
        }
        ?>
        <h1>LE MIE <span xml:lang="en">FAN ART</span></h1>
        <label for="search">Cerca immagine: </label>
        <div id='searchbar'>
		<input type="text" id="search" name="search" placeholder="Inserisci termini da cercare..." title="Cerca"/>
        <input type="submit" value="Cerca"></input>
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
                for($i = 0; $i < $images_per_page; $i++)
                {
                    $curr_image = $page*$images_per_page+$i;
                    if(isset($files[$curr_image]['PATH']))
                    {
                        $img = $files[$curr_image]['PATH'];
                        $dsc = $files[$curr_image]['DESCRIPTION'];
                        echo "<hr>";
                        echo "<br />";
                        echo "<img src='$img' alt='$dsc' />";
						echo "<p> $dsc </p>";
                    }
                }
                $nextpage = $page+1;
                $prevpage = $page-1;
                echo "<div id='customlink'>";
                if(isset($files[$nextpage*$images_per_page]['PATH'])  )
                {
                    echo "<a href='../php/my_fanart.php?page=$nextpage' id='nextbutton'>Pagina sucessiva</a>";
                }
                if(isset($files[$prevpage*$images_per_page]['PATH'])  )
                {
                    echo "<a href='../php/my_fanart.php?page=$prevpage' id='prevbutton'>Pagina precedente</a>";
                }
                echo "</div>";
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
</div>

<?php
    $page_footer = readfile("../html/footer.html");
?>
