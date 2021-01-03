﻿<?php
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
    $page_body = readfile("../html/fanart.html");
?>
<div id="content">
        <h1><span xml:lang="en">FAN ART</span></h1>
        <p><span xml:lang="en">Anche tu sei un amante degli Axolotl? Mandaci una tua creazione! <a href="add_fanart.php">Premi qui</a></span></p>
        <?php
            $sql = "SELECT * FROM foto";
            $files = $obj_connection->queryDB($sql);
            $lenght = count($files);
            $curr_page = 0;
            $images_per_page = 3;
            $totpages = $lenght/$images_per_page;

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
                        $mail = $files[$curr_image]['EMAIL'];
                        echo "<hr>";
                        echo "<br />";
                        echo "<img src='$img' alt='$dsc' />";
                        echo "<p> <small> Immagine caricata da $mail </small> <br /> $dsc </p>";
                    }
                }
                $nextpage = $page+1;
                $prevpage = $page-1;
                echo "<div id='customlink'>";
                if(isset($files[$nextpage*$images_per_page]['PATH'])  )
                {
                    echo "<a href='../php/fanart.php?page=$nextpage' id='nextbutton'>Pagina sucessiva</a>";
                }
                if(isset($files[$prevpage*$images_per_page]['PATH'])  )
                {
                    echo "<a href='../php/fanart.php?page=$prevpage' id='prevbutton'>Pagina precedente</a>";
                }
                echo "</div>";
                echo "<p> $nextpage / $totpages</p>"; /* PARZIALE DA FIXARE */
            }
            else
            {
                $page = 0;
                if(isset($files[$page]['PATH'])){
                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = '../php/fanart.php?page=0';
                    header("Location: http://$host$uri/$extra");
                }
            }
        ?>

        <div id="clearing_element"></div>
</div>

<?php
    $page_footer = readfile("../html/footer.html");
?>
