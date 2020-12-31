<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Login - Axolotl Society</title>
        <meta name="title" content="Login - Axolotl Society" />

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
        <a href="../html/index.html"><img id="logo" src="../img/logo_small.png" alt="Immagine stilizzata della faccia di un axolotl sorridente sorridente"/></a>
        <h1 xml:lang="en">Axolotl Society</h1>
        <h2 xml:lang="it">"Le salamandre più adorabili"</h2>
        <p xml:lang="en">
            <a >Login</a> <br /> 
            <a href="../php/register.php">Registrati</a> </p>
		</div>
    
        <div id="breadcrumb">
            <p>Ti trovi in: <span xml:lang="en">Login</span></p>
        </div>

        <div id="menu">
            <ul>
                <li xml:lang="en"><a href="../html/index.html">Home</a></li>
                <li><a href="famous.html">Personaggi famosi</a></li>
                <li xml:lang="en"><a href="fanart.html">Fan art</a></li>
                <li xml:lang="en"><a href="fun_facts.html">Fun facts</a></li>
                <li><a href="about_us.html">Chi siamo</a></li>
                <li><a href="rules.html">Regolamento</a></li>
            </ul>
        </div>

        <div id="content">
            <form method="post" action="../php/login_check.php" id="login_form" class="vertical_input_form">
                <fieldset>
                   
                    <noscript>
                        <div class="msg_box warning_box">
                            ATTENZIONE: <span xml:lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
                            NON ESSERE DISPONIBILI
                        </div>
                    </noscript> 
                                    
                    <label for="email" xml:lang="en">Email:</label>
                    <input type="text" name="email" id="email" value="daniele.giachetto@studenti.unipd.it" maxlength="30" tabindex="1" class="full_width_input"/>

                    <label for= "pwd" xml:lang="en">Password:</label>
					
					<label for="show_password" style="float: right;">Mostra password</label>
					<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password" style="float: right;" %CHECKED%/>
					
                    <input type="password" name="pwd" id="pwd" value="osi" maxlength= "15" tabindex="2" class="full_width_input"/>
					
					<input type="checkbox" id="remember_me" name="remember_me" %CHECKED%/>
                    <label for="remember_me">Ricordati di me</label>
                    
                    <!--<input type="submit" id="login_btn" class="btn" name="accedi" value="Accedi" tabindex="4" />-->
                    <button type="submit" id="login_btn" class="btn" name="accedi" value="Accedi" tabindex="4">Login</button>


                    <a href="register.php" tabindex="3" style="float: right;">Non sei ancora registrato? CLICCA QUI</a>  
                </fieldset>

                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>  

           </form>
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


<?php
    unset($_SESSION["error"]);
?>
