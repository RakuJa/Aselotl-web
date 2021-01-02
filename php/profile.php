<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Modifica profilo - Axolotl Society</title>
        <meta name="title" content="Modifica profilo - Axolotl Society" />

        <meta name="description" content="pagina di base del sito" />
        <meta name="keywords" content="axolotl, assolotti, bellissimi, carini" />
        <meta name="author" content="Francesco De Marchi, Daniele Giachetto, Antonio Osele, Vittorio Schiavon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
         
        <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../css/stampa.css" media="print"/>  

        <!-- favicon - realfavicongenerator.net - -->
        <link rel="apple-touch-icon" href="../img/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" href="../img/favicon/favicon-32x32.png" />
        <link rel="manifest" href="../img/favicon/site.webmanifest" />
        <link rel="mask-icon" href="../img/favicon/safari-pinned-tab.svg" />
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" />
        <meta name="msapplication-TileColor" content="#00aba9" />
        <meta name="msapplication-config" content="../img/favicon/browserconfig.xml" />
        <meta name="theme-color" content="#ffffff" />  
    </head>

    <body>
        <div id="header">
            <a href="index.php" class="logo"><img id="logo" src="../img/logo_small.png" alt="Immagine stilizzata della faccia di un axolotl sorridente sorridente" /> <h1>Axolotl Society</h1><br clear="all" /></a>
            <div class="header-right">
				<?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true) { ?>
                    <p> Profilo </p>
                    <a xml:lang="en" href="../php/logout.php" class="colored">Logout</a>
                <?php } else { ?>
                    <a href="../php/login.php" class="colored">Accedi</a>
                    <a href="../php/register.php" class="colored">Registrati</a>
                <?php } ?>
            </div>
          </div>
    
        <div id="breadcrumb">
            <p>Ti trovi in: Profilo</p>
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
            %ERROR%
            <h1 id="page_title">Il mio profilo</h1>
            <img class="img_profilo" id="img_profilo-view" src="../img/imgnotfound.jpg" alt="immagine di profilo"/>
            
            <div id="profile-view">
                <h2 class="profile-view_title">I miei dati utente</h2>
                <dl class="list_profilo">
                    <dt>La mia <span xml:lang="en">Email</span>:</dt>
                    <dd>%EMAIL%</dd>
                    <dt>Tipo di utenza: </dt>
                    <dd>%UTENZA%</dd>
                </dl> 
               
                <h2 class="profile-view_title">I miei dati personali</h2>
                <dl class="list_profilo">
                    <dt>Nome: </dt>
                    <dd>%NOME%</dd>
                    <dt>Cognome: </dt>
                    <dd>%COGNOME%</dd>
                    <dt>Sesso: </dt>
                    <dd>%SESSO%</dd>
                    <dt>Data di Nascita: </dt>
                    <dd>%DATA_NASCITA%</dd>
                    <dt>Partita <abbr title="imposta sul valore aggiunto">IVA</abbr>:</dt>
                    <dd>%PARTITA_IVA%</dd>
                    <dt>Ragione Sociale: </dt>
                    <dd>%RAGIONESOCIALE%</dd>
                </dl>
            </div>
         
            <a class="btn right" href="edit_profile.php">Modifica profilo</a>
            <a class="btn alert_btn right" href="rimuovi_profilo.php">Rimuovi profilo</a>
        </div>
    
        <div id="footer">
            <ul>
                <li><span xml:lang="en">Axolotl</span> - Le salamandre più adorabili</li>
                <li xml:lang="en">axolotl4ever@gmail.com</li>
                <li>049-0000000 - Padova, Via Gattamelata 42</li>
                <li xml:lang="en">Copyright &copy; 2020-2021 all rights reserved</li>
            </ul>

            <a id="scrollBtn" class="hide" href="#header">Torna Su</a>
        </div>
              
        <script type="text/javascript" src="../js/script.js"></script>
    </body>
</html>
