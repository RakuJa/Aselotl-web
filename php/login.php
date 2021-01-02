<?php
    session_start();
    $page_header = readfile("../html/head.html");
    include 'header.php';
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (isset($_SESSION['logged']) && $_SESSION['logged']==true) {
			if($url == "http://127.0.0.1/php/login.php") {
				header("location: ../php/index.php");
			}
		}
?>
    
        <div id="breadcrumb">
            <p>Ti trovi in: <span xml:lang="en">Login</span></p>
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
            <form method="post" action="../php/login_check.php" id="login_form" class="vertical_input_form">
                <fieldset>
                   
                    <noscript>
                        <div class="msg_box warning_box">
                            ATTENZIONE: <span xml:lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
                            NON ESSERE DISPONIBILI
                        </div>
                    </noscript> 
                                    
                    <label for="email" xml:lang="en">Email:</label>
                    <input type="text" name="email" id="email" value="daniele.giachetto@studenti.unipd.it" maxlength="50" tabindex="1" class="full_width_input"/>

                    <label for= "pwd" xml:lang="en">Password:</label>
                    
                    <div style="float: right;">
                    <input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
					<label for="show_password">Mostra password</label>
                    </div>
					
                    <input type="password" name="pwd" id="pwd" value="Osi42069" maxlength= "50" tabindex="2" class="full_width_input"/>

					<input type="checkbox" id="remember_me" name="remember_me" %CHECKED%/>
                    <label for="remember_me">Ricordati di me</label>
                    
                    <!--<input type="submit" id="login_btn" class="btn" name="accedi" value="Accedi" tabindex="4" />-->
                    <button type="submit" id="login_btn" class="btn" name="accedi" value="Accedi" tabindex="4">Login</button>


                    <a href="../php/register.php" tabindex="3" style="float: right;">Non sei ancora registrato? CLICCA QUI</a>  
                </fieldset>

                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>  

           </form>
        </div>


<?php
    $page_footer = readfile("../html/footer.html");
    unset($_SESSION["error"]);
?>
<title>Accedi</title>