﻿<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Personaggi famosi - Axolotl Society</title>
        <meta name="title" content="Personaggi famosi - Axolotl Society" />

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
            <p>Ti trovi in: Personaggi famosi</p>
        </div>

        <div id="menu">
            <ul>
                <li xml:lang="en"><a href="../php/index.php">Home</a></li>
                <li><p>Personaggi famosi</p></li>
                <li xml:lang="en"><a href="../php/fanart.php">Fan art</a></li>
                <li xml:lang="en"><a href="../php/fun_facts.php">Fun facts</a></li>
                <li><a href="../php/about_us.php">Chi siamo</a></li>
                <li><a href="../php/rules.php">Regolamento</a></li>
            </ul>
        </div>

        <div id="content">
            <h1>PERSONAGGI FAMOSI</h1>
            <h2>Abrahalotl Axolincoln</h2>
            <img id="personaggio" src="../img/lincoln.jpg" alt="Abraham Lincoln con la faccia di un axolotl" /><br clear="all" />
            <p>Nato nel 1809, Abrahalotl Axolincoln divenne il primo presidente salamandra della storia.</p>

            <h2>Mohamedlotl Alitl</h2>
            <img id="personaggio" src="../img/ali.jpg" alt="Mohamed Ali vittorioso sul ring con la faccia di un axolotl" /><br clear="all" />
            <p>Uno dei migliori pugili della storia, Mohamedlotl Alitl sfruttò la sua tenerezza per sconfiggere tutti gli avversari.</p>

            <h2>La Giocondotl</h2>
            <img id="personaggio" src="../img/gioconda.jpg" alt="dipinto della Gioconda con la faccia di un axolotl" /><br clear="all" />
            <p>La Giocondotl cela molti segreti al suo interno. Come fa a seguirti con lo sguardo? E quel sorriso criptico cosa nasconde? Lo scopriremo dopo la pubblicità.</p>

            <h2>Il mostro di Lotlness</h2>
            <img id="personaggio" src="../img/lochness.jpg" alt="sagoma sfocata di un Axolotl immerso in un lago in bianco e nero" /><br clear="all" />
            <p>Avvistato per la prima volta nel 1680 avanti Axolotl divenne subito leggenda. Molti studiosi dicono che un lago così piccolo non potrebbe mai contenere cotanta tenerezza.</p>

            <h2>Papaxlotl</h2>
            <img id="personaggio" src="../img/papa.jpg" alt="un papa con la faccia di un axolotl" /><br clear="all" />
            <p>Nella lista delle salamandre famose non poteva mancare lui. Il santo pontefice. Habemus Papaxlotl</p>

            <h2>Il primo selfixlotl</h2>
            <img id="personaggio" src="../img/selfie.jpg" alt="autoscatto di attori famosi insieme ad un axolotl" /><br clear="all" />
            <p>Pensavate veramente che non ci fossero gli animali più carini del mondo dietro all'autoscatto più famoso della storia? Vi sbagliavate.</p>

            <h2>Urlotl</h2>
            <img id="personaggio" src="../img/urlo.jpg" alt="un papa con la faccia di un axolotl" /><br clear="all" />
            <p>Persone da tutto il mondo compiono centinaia di migliaia di kilometri per ammirare questo fantastico capolavoro: l'Urlotl. </p>
        </div>
		
        <div id="footer">
            <ul>
                <li xml:lang="en">axolotl4ever@gmail.com</li>
                <li>049-0000000 - Padova, Via Gattamelata 42</li>
                <li xml:lang="en">Copyright &copy; 2020-2021 all rights reserved</li>
            </ul>

            <a id="scrollBtn" class="hide" href="#header">Torna Su</a>
        </div>
              
        <script type="text/javascript" src="../js/script.js"></script>
    </body>
</html>
