<?php
    session_start();
    $page_header = readfile("../html/head.html");
    include 'header.php';
?>  
        <div id="breadcrumb">
            <p>Ti trovi in: <span xml:lang="en">Registrati</span></p>
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
            <form method="post" action="../php/register_check.php" id="register_form" class="vertical_input_form">
                <fieldset>
                   
                    <noscript>
                        <div class="msg_box warning_box">
                            ATTENZIONE: <span xml:lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
                            NON ESSERE DISPONIBILI
                        </div>
                    </noscript> 
                    <label for="mail" xml:lang="en">Email:</label>
                    <input type="text" name="email" id="email" value="daniele.giachetto@studenti.unipd.it" maxlength="320" tabindex="1" class="full_width_input"/>

                    <label for= "pwd" xml:lang="en">Password:</label>
					
					<div style="float: right;">
                    <input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
					<label for="show_password">Mostra password</label>
                    </div>
					
                    <input type="password" name="pwd" id="pwd" value="Antonio99" maxlength= "15" tabindex="2" class="full_width_input"/>
                    
                    <label for= "pwd" xml:lang="en">Ripeti Password:</label>
                    <input type="password" name="rpwd" id="rpwd" value="Antonio99" maxlength= "15" tabindex="2" class="full_width_input"/>
                    
                    <!--<input type="submit" id="register_btn" class="btn" name="Registrati" value="Registrati" tabindex="4" />-->
                    <button type="submit" id="register_btn" class="btn" name="Registrati" value="Registrati" tabindex="4">Registrati</button>

                    <a href="../php/login.php" tabindex="3" style="float: right;">Sei già registrato? CLICCA QUI</a>  
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
