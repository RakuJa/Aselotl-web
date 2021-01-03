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
            $images_per_page = 5;

            if(isset($_GET['pic']))
            {
                $pic = $_GET['pic'];
                if(isset($files[$pic]['PATH']))
                {
                    $img = $files[$pic]['PATH'];
                    $dsc = $files[$pic]['DESCRIPTION'];
                    $mail = $files[$pic]['EMAIL'];
                    echo "<img src='$img' alt='$dsc' />";
                    echo "<p> <small> Immagine caricata da $mail </small> <br /> $dsc </p>";
                    echo "<br />";
                }
                else
                {
                    echo "<p> L'immagine da te richiesta non è stata trovata </p>";
                }
                $nextpic = $pic+1;
                $prevpic = $pic-1;
                if(isset($files[$nextpic]['PATH'])  )
                {
                    echo "<a href='../php/fanart.php?pic=$nextpic'><button> Prossima immagine </button></a>";
                }
                if(isset($files[$prevpic]['PATH'])  )
                {
                    echo "<a href='../php/fanart.php?pic=$prevpic'><button> Immagine scorsa </button></a>";
                }
            }
            else
            {
                $pic = 0;
                if(isset($files[$pic]['PATH'])){
                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = '../php/fanart.php?pic=0';
                    header("Location: http://$host$uri/$extra");
                }
            }
        ?>
</div>

<?php
    $page_footer = readfile("../html/footer.html");
?>
