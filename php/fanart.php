﻿<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Fan art - Axolotl Society</title>
        <meta name="title" content="Fan Art - Axolotl Society" />

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
                    <a href="../php/profile.php" class="colored"> Profilo </a>
                    <a xml:lang="en" href="../php/logout.php" class="colored">Logout</a>
                <?php } else { ?>
                    <a href="../php/login.php" class="colored">Accedi</a>
                    <a href="../php/register.php" class="colored">Registrati</a>
                <?php } ?>
            </div>
          </div>
		
        <div id="breadcrumb">
            <p>Ti trovi in: <span xml:lang="en">Fan art</span></p>
        </div>

        <div id="menu">
            <ul>
                <li xml:lang="en"><a href="../php/index.php">Home</a></li>
                <li><a href="../php/famous.php">Personaggi famosi</a></li>
                <li xml:lang="en"><p>Fan art</p></li>
                <li xml:lang="en"><a href="../php/fun_facts.php">Fun facts</a></li>
                <li><a href="../php/about_us.php">Chi siamo</a></li>
                <li><a href="../php/rules.php">Regolamento</a></li>
            </ul>
        </div>

        <div id="content">
            <h1><span xml:lang="en">FAN ART</span></h1>
            <p><span xml:lang="en">Anche tu sei un amante degli Axolotl? Mandaci una tua creazione! <a href="add_fanart.php">Premi qui</a></span></p>


            <img id="fanart" src="../img/fanart/fanart1.jpg" alt="disegno stilizzato di un axolotl" /><br clear="all" />
            <p id="mittente">Inviato da Roberto.</p>

            <img id="fanart" src="../img/fanart/fanart2.jpg" alt="disegno fantascientifico di un axolotl" /><br clear="all" />
            <p id="mittente">Inviato da Simone.</p>

            <img id="fanart" src="../img/fanart/fanart3.jpg" alt="illustrazione di un axolotl" /><br clear="all" />
            <p id="mittente">Inviato da Samara.</p>


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
