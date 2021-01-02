<?php
    require_once('connessione.php');
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
            foreach($files as $file) {
                if($file !== "." && $file !== "..") {
                    echo "<img src='$file[PATH]' alt='$file[DESCRIPTION]' />";
                    echo "<p> <small> Immagine caricata da $file[EMAIL] </small> <br /> $file[DESCRIPTION] </p>";
                    echo "<br />";
                }
            }
        ?>
</div>

<?php
    $page_footer = readfile("../html/footer.html");
?>
