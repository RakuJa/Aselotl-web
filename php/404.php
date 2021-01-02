<?php
    session_start();
    $page_header = readfile("../html/head.html");
?>

    <body>
        <div id="header">
            <a href="index.php" class="logo"><img id="logo" src="../img/logo_small.png" alt="Immagine stilizzata della faccia di un axolotl sorridente sorridente" /> <h1>Axolotl Society</h1><br clear="all" /></a>
            <div class="header-right">
              <?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true) { ?>
                    <a href="../php/profile.php" class="colored"> Profile </a>
                    <a href="../php/logout.php" class="colored">Logout</a>
                <?php } else { ?>
                    <a href="../php/login.php" class="colored">Accedi</a>
                    <a href="../php/register.php" class="colored">Registrati</a>
                <?php } ?>
            </div>
        </div>

        <?php
            $page_body = readfile("../html/404.html");
            $page_footer = readfile("../html/footer.html");
        ?>
