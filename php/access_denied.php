<?php
    session_start();
	header('refresh:5; url= ../php/index.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Accesso negato - Axolotl Society</title>
        <meta name="title" content="Accesso negato - Axolotl Society" />

        <meta name="description" content="Questa è un'area riservata, sembra che tu non abbia i permessi per entrare" />
        <meta name="keywords" content="non consentito, errore, area riservata, accesso, Axolotl, Society" />
        <meta name="author" content="Francesco De Marchi, Daniele Giachetto, Antonio Osele, Vittorio Schiavon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        
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
                    <a href="../php/profile.php" class="colored"> Profilo </a>
                    <a xml:lang="en" href="../php/logout.php" class="colored">Logout</a>
                <?php } else { ?>
                    <a href="../php/login.php" class="colored">Accedi</a>
                    <a href="../php/register.php" class="colored">Registrati</a>
                <?php } ?>
            </div>
          </div>

        <div id="full_content">
            <h1 id="title_404">Ops! Quest'area è riservata</h1>

            <p id="subtitle_404">Non hai i permessi per accedere a questa pagina. 
                Verrai reindirizzato alla <a xml:lang="en" href="index.php">Home</a> tra qualche secondo. </p>
            <img id="img_404" src="../img/access_denied.jpg" alt="Axolotl vestito da personale di sicurezza che fa segno di stop" />
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