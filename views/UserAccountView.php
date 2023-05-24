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
                        <a href="MainView.php" class="optmenu"> HOME</a>                       
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
            <h3>GESTIO D'USUARIS</h3>
            <article>
                <div id="formulario">  
                    <label><b>Find User</b> </label>
                    <form action="../controllers/getUserByIDController.php" method="POST">                      
                        <input name="id" placeholder="Introdueix el ID de l'usuari"/>
                        <input type="submit" value="GET" id="enviar" /><br>
                    </form>
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>Change Password</b> </label>
                    <form action="../controllers/ChangeUserPasswordController.php" method="POST">                  
                        <input name="currentpswd" placeholder="Introdueix contrassenya actual"/><br>
                        <input name="newpswd" placeholder="Introdueix nova contrassenya"/><br>
                        <input name="retrypswd" placeholder="Repeteix la nova contrassenya"/> 
                        <input type="submit" value="CHANGE" id="enviar" /><br>
                    </form>
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>New User (Level 3 Required for this action)</b> </label><br>
                    <form action="../controllers/NewUserController.php" method="POST">
                        <input name="name" placeholder="Introdueix nom d'usuari"/><br>
                        <input name="pswd" placeholder="Introdueix contrasenya"/><br>
                        <i>Nivell Inicial = 1, Punts d'inici = 0</i><br>               
                        <input type="submit" value="ADD" id="enviar" /><br><br>
                    </form>
                </div>
            </article>
        </section>

        <footer>
            <div class="darkstyle">   
                <a><b> Autor: Goizane Olañeta</b> </a>  
            </div>

        </footer>
    </body>
</html>         

