<?php
    session_start();
	if ($_SESSION['logged']==false) {
		header("location: ../php/access_denied.php");
	}
    $page_head = readfile("../html/head.html");
    include 'header.php';
    $email="";
    if (isset($_GET['email'])) {
        $email=$_GET['email'];
    }else {
        $email=$_SESSION['EMAIL'];
    }
?>
<title>Modifica profilo</title>
        <div id="breadcrumb">
            <p>Ti trovi in: <span xml:lang="en">Modifica profilo</span></p>
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
            <noscript>
                <div class="msg_box warning_box">
                    ATTENZIONE: <span xml:lang="en">JAVASCRIPT</span> NON E' ATTIVO, ALCUNE FUNZIONALITA' POTREBBERO 
                    NON ESSERE DISPONIBILI
                </div>
            </noscript>

            <h1>Modifica il mio profilo</h1>            
            <form method="post" action="edit_password_check.php" id="edit_pwd" class="vertical_input_form">
                <fieldset>
                    <legend>Cambio <span xml:lang="en">password</span>:</legend></br>
					
					<label for="email" xml:lang="en">Email:</label>

                    <input type="text" name="email" id="email" maxlength="50" class="full_width_input"
                    <?php echo 'value="'.$email.'"';?>
                    onkeyup="check_empty()"/>
                    <label for="opwd">Vecchia <span lang="en">password</span>:</label>
					
					<div style="float: right;">
                    <input type="checkbox" onclick="show_pass()" id="show_password" name="show_password"/>
					<label for="show_password">Mostra password</label>
                    </div>
					
                    <input type="password" name="opwd" id="opwd" maxlength="50" class="full_width_input" onkeyup="check_edit()"/>

                    <label for="password">Nuova <span lang="en">password</span>:</label>
                    <input type="password" name="pwd" id="pwd" maxlength= "50" class="full_width_input" onkeyup="check_pwd(), confirm_pwd(), check_edit()"/></br>
                    <span id="message1"></span></br></br>
					
                    <label for="rpwd" xml:lang="en">Ripeti Password:</label>
                    <input type="password" name="rpwd" id="rpwd" maxlength= "50" class="full_width_input" onkeyup="confirm_pwd(), check_edit()"/>
                    <span id="message2"></span></br></br>

                    <input type="submit" disabled name="mod_pwd" id="change_psw_btn" value="Cambia password" class="btn"/>
                </fieldset>
            </form>            
        </div>
    
        <?php
            $page_footer = readfile("../html/footer.html");
        ?>
