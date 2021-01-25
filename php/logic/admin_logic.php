<?php
	require_once("sessione.php");
    require_once('debugger.php');
    require_once('connessione.php');
    $obj_connection = new DBConnection();
    if(!$obj_connection->create_connection()){
        new Debugger("[Errore di connessione al database]");
        $error=$error."<div class=\"msg_box error_box\">Errore di connessione al database</div>";
        $no_error=false;
    }
	if ($_SESSION['logged']==false || $_SESSION['PERMISSION']!=0) {
		header("location: ../401.php");
	}

    $content = "";
    $tempmail = $_SESSION['EMAIL'];
    $sql = "SELECT EMAIL, PERMISSION FROM user WHERE EMAIL<>'$tempmail'";
    $files = $obj_connection->queryDB($sql);
    $lenght = count($files);
    $curr_page = 0;
    $users_per_page = 5;
    $totpages = ceil($lenght/$users_per_page);
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page + 1 > $totpages || $page < 0) {
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = '../php/admin.php';
            header("Location: http://$host$uri/$extra");
        }
        for($i = 0; $i < $users_per_page; $i++){
            $curr_user = $page*$users_per_page+$i;
            if(isset($files[$curr_user]['EMAIL'])) {
                $tempperm = $files[$curr_user]['PERMISSION'];
                if($tempperm == 1)  {
                    $perm = "Utente";
                } else {
                    $perm = "Amministratore";
                }
                $email = $files[$curr_user]['EMAIL'];
                $content .= "<hr>";
                $content .= "<div class='customlink'>";
                $content .= "<h2> $email </h2>";
                $content .= "<a href='logic/delete_account.php?email=". urlencode($email). "'>Elimina</a>";
                $content .= "<a href='edit_password.php?email=". urlencode($email). "'>Modifica <span xml:lang='en' lang='en'> password </span> </a>";
                $content .= "</div>";
                $content .= "<p> Permessi: $perm</p>";
            }
        }
        $nextpage = $page+1;
        $prevpage = $page-1;    
        if(isset($files[$nextpage*$users_per_page]['EMAIL'])  ) {
            $content .= "<a href='../php/admin.php?page=$nextpage' class='rightbutton'>Pagina successiva</a>";
        }
        if(isset($files[$prevpage*$users_per_page]['EMAIL'])  )
        {
            $content .= "<a href='../php/admin.php?page=$prevpage' class='leftbutton'>Pagina precedente</a>";
        }
        $content .= "<br /><br />";
        if ($totpages>1) {
            $content .= "<h2 class='pagenum'>$nextpage / $totpages</h2> ";
        }
    }else {
        $page = 0;
        if(isset($files[$page]['EMAIL'])){
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = '../php/admin.php?page=0';
            header("Location: http://$host$uri/$extra");
        }
    }
    echo $content;
?>