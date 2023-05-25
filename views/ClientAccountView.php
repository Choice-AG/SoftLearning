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
            <h3>GESTION DE CLIENTES</h3>
            <article>
                <div id="formulario">  
                    <label><b>Find Client</b> </label>
                    <form action="../controllers/getClientByIDController.php" method="POST">
                        <input name="id" placeholder="Introduce el ID del cliente a buscar"/><br>
                        <p><b>Format</b></p>
                        JSON<input type="checkbox" name="json" /><br>
                        XML<input type="checkbox" name="xml" />
                        <input type="submit" value="GET" id="enviar" /><br><br> 
                    </form> 
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>Change client data</b> </label><br>
                    <form action="../controllers/ChangeClientDataController.php" method="POST">
                        <p><b>Indica el id del cliente a cambiar los datos</b></p>
                        <label for="client_id">Id (obligatorio)</label>
                        <input name="client_id" placeholder="Id del cliente"/><br>
                        <p><b>Datos del cliente a cambiar</b></p>
                        <label for="">Nombre</label>
                        <input name="name" placeholder="Nombre"/><br>
                        <label for="">Teléfono</label>
                        <input name="phone" placeholder="Teléfono"/><br>
                        <label for="">Email</label>
                        <input name="email" placeholder="Email"/><br>
                        <label for="">Dirección</label>
                        <input name="address" placeholder="Dirección"/><br>
                        <input type="submit" value="CHANGE" id="enviar" /><br><br>
                    </form>
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>Add new client</b> </label><br>
                    <form action="../controllers/NewClientController.php" method="POST">
                        <p><b>Datos de lnuevo cliente</b></p>
                        <label for="">Nombre</label>
                        <input name="name" placeholder="Nombre"/><br>
                        <label for="">DNI</label>
                        <input name="ident" placeholder="DNI"/><br>
                        <label for="">Teléfono</label>
                        <input name="phone" placeholder="Teléfono"/><br>
                        <label for="">Email</label>
                        <input name="email" placeholder="Email"/><br>
                        <label for="">Dirección</label>
                        <input name="address" placeholder="Dirección"/><br>
                        <label for="">Fecha nacimiento</label>
                        <input type="date" name="birthday" id="birthday">
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

