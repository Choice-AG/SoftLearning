<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Aprenentatge per Projectes</title>
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
                        <a href="../index.html" class="optmenu"> HOME</a>                       
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
            <h3>Usuari o password no valids</h3>

            <article>
                <?php
                print "Usuario no valido vuelva a intentarlo<br><br>";
                print "<p><a href=\"../index.html\">Tornar a la pàgina principal</a></p>\n";
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