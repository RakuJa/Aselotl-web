<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Home - Axolotl Society</title>
        <meta name="title" content="Home - Axolotl Society" />

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
            <p>Ti trovi in: <span xml:lang="en">Home</span></p>
        </div>

        <div id="menu">
        <ul>
            <li xml:lang="en"><p>Home</p></li>
            <li><a href="../php/famous.php">Personaggi famosi</a></li>
            <li xml:lang="en"><a href="../php/fanart.php">Fan art</a></li>
            <li xml:lang="en"><a href="../php/fun_facts.php">Fun facts</a></li>
			<li><a href="../php/about_us.php">Chi siamo</a></li>
			<li><a href="../php/rules.php">Regolamento</a></li>
        </ul>
        </div>

        <div id="content">
            <h1>HOME</h1>
            <h2>Benvenuto su <span xml:lang="en">Axolotl Society</span>, il luogo di celebrazione degli Axolotl!</h2>
            <h3>Cosa (o chi) sono gli Axolotl</h3>
            <p>
                Gli axolotl sono delle salamandre neoteniche e <i>blah blah blah</i>. L'importante è che sono tenere e la gente non le conosce a sufficienza.
                Dotate di sorriso smagliante, teneri cornetti e manine soffici sono pronte ad impossessari del cuore di tutti quanti.
            </p>

            <h3>Non solo salamandre</h3>
            <p>
                Ma sono soltanto salamandre? Assolutamente no. Moltissimi biologi ritengono che possano cambiare forma e assumere sembianze umane.
                Si vocifera che i più grandi essere umani della storia siano stati in realtà degli axolotl camuffati! Date un'occhiata qua per conoscere qualche celebre salamandra: <a href="famous.php">Personaggi famosi</a>
            </p>

            <h3>Vuoi far parte dell'<span xml:lang="en">Axolotl Society</span>?</h3>
            <p>
                Da oggi ti puoi iscrivere sul nostro sito! Potrai condividere con il mondo il tuo amore per gli axolotl.
            </p>

            <h3>Delle creature stupende a rischio estinzione</h3>
            <p>
                L'axolotl è divenuto un organismo modello e animale da compagnia da diversi anni, viene quindi riprodotto con successo in cattività ma in natura è vicino all'estinzione. 
                Nel corso degli anni il numero degli axolotl trovati è risultato essere sempre inferiore. Una recente indagine scientifica, nel 2014, non ha rivelato axolotl,
                anche se gli animali catturati allo stato selvatico si trovano ancora nel mercato locale, il che indica che i pescatori ancora sanno dove trovarli.
                Un tempo veniva consumato come prelibatezza locale finché non lo si considerò a rischio e quindi ne fu proibita la pesca.
            </p>

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
