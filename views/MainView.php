<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aprendizaje por proyectos</title>
        <meta charset="UTF-8">
        <meta name="title" content="Portal del Modul 3">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <header  class="title">
            <h1> PHP Aprendizaje por proyectos </h1>
            <section id="menu">
                <nav  class="darkstyle">	
                    <div>
                        <a href="UserAccountView.php" class="optmenu">USUARIS</a>
                        <a href="ClientAccountView.php" class="optmenu">CLIENTS</a>
                        <a href="BookAccountView.php" class="optmenu">BOOKS</a>
                        <a href="BlankPage.php" class="optmenu">ORDERS</a>
                    </div>
                </nav>
            </section>
        </header>

        <aside id="leftside">
            <div class="darkstyle">

            </div>
        </aside>

        <aside id="rightside">
            <div class="darkstyle">

            </div>
        </aside>

        <section id="central">
            <a name="principal"></a>
            <h3>BENVINGUT AL PORTAL</h3>
            <article>
                <?php
                $username = filter_input(INPUT_COOKIE, 'username');
                print "<h3>Bienvenido/a $username</h3>";
                /* $level = filter_input(INPUT_COOKIE, 'userlevel');
                print "Nivel: $level";
                $points = filter_input(INPUT_COOKIE, 'userpoints');
                print "<br><br>Puntos: " . (int) $points . "<br><br>"; */
                print "
                <h4>Elige la clase que quieras editar:</h4>
                <a href='ClientAccountView.php' class='optmenu'>CLIENTS</a>
                <a href='BookAccountView.php' class='optmenu'>BOOKS</a>
                <a href='BlankPage.php' class='optmenu'>ORDERS</a>
                ";
                ?> 
            </article>
        </section>

        <footer>
            <div class="darkstyle">  
                <a><b> Autor: Goizane Olañeta</b> </a>  
            </div>			
        </footer>
    </body>
</html>   