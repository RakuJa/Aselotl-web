<?php
    session_start();
    $page_head = readfile("../html/head.html");
    include 'header.php';
?>  
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
            %ERROR%
            <form method="post" action="" enctype="multipart/form-data" id="edit_foto_profilo" class="vertical_input_form">
                <fieldset>
                    <legend>Foto Profilo</legend>
                    
                    %IMG_ERROR% 

                    <img class="img_profilo" id="img_profilo-modify" src="../img/imgnotfound.jpg" alt="immagine di profilo"/>
		   		    <label for="new_foto_profilo">Seleziona nuova foto: </label>
                    <input type="file" accept="image/*" id="new_foto_profilo" name="new_foto_profilo" tabindex="1"/>

                    <input type="submit" name="mod_foto" value="Modifica foto profilo" id="change_photo" tabindex="2" class="btn right"/>
                </fieldset>
            </form>
            
            <form method="post" action="modifica_profilo.php" id="edit_psw_data" class="vertical_input_form">
                <fieldset>
                    <legend>Cambio <span xml:lang="en">Password</span></legend>
                        
                    %PASSWORD_ERROR% 

                    <label for="old_password">Vecchia <span lang="en">password</span>:</label>
					
					<label for="show_password" style="float: right;">Mostra password</label>
					<input type="checkbox" onclick="show_pass()" id="show_password" name="show_password" style="float: right;" %CHECKED%/>
					
                    <input type="password" name="opwd" id="opwd" tabindex="3" maxlength="15" class="full_width_input"/>

                    <label for="password">Nuova <span lang="en">password</span>:</label>
                    <input type="password" name="pwd" id="pwd" tabindex="4" maxlength="15" class="full_width_input"/>
                    
                    <label for="rpwd" id="repeat_pw_lbl">Ripeti <span lang="en">password</span>:</label>
                    <input type="password" name="rpwd" id="rpwd" tabindex="5" maxlength="15" class="full_width_input"/>

                    <input type="submit" name="mod_pwd" id="change_psw_btn" value="Cambia password" tabindex="6" class="btn right"/>
                </fieldset>
            </form>
         

            <form method="post" action="" class="vertical_input_form" id="edit_personal_data">
                <fieldset>
                    <legend>I miei dati personali</legend>
                    %DATI_ERROR% 
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="%NOME%" tabindex="7" class="full_width_input"/>
                    
                    <label for="cognome">Cognome:</label>
                    <input type="text" name="cognome" id="cognome" value="%COGNOME%" tabindex="8" class="full_width_input"/>
                    
                    <label for="sesso">Sesso:</label>
                    <select name="sesso" id="sesso" tabindex="9" class="full_width_input">
                        <option value="ns" selected="%SEL_NS%">Non Specificato</option>
                        <option value="Uomo" selected="%SEL_UOMO%">Uomo</option>
                        <option value="Donna" selected="%SEL_DONNA%">Donna</option>
                        <option value="Altro" selected="%SEL_ALTRO%">Altro</option>
                    </select>
                    
                    <label id="piva_l" for="piva">Partita <abbr title="Imposta su Valore Aggiunto">IVA:</abbr></label>
                    <input id="piva" type="text" name="piva" value="%P_IVA%" tabindex="10" class="full_width_input"/>
                    
                    <label id="rsoc_l" for="rsoc">Ragione sociale:</label>
                    <input id="rsoc" type="text" name="rsoc" value="%R_SOC%" tabindex="11" class="full_width_input"/>

                    <input type="reset" value="Resetta form" tabindex="12" class="btn right"/>
                    <input type="submit" name="mod_prof" id="modify_profile_btn" value="Applica modifiche" tabindex="13" class="btn right"/>
                </fieldset>
            </form>            
        </div>
    
        <?php
            $page_footer = readfile("../html/footer.html");
        ?>