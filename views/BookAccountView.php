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
            <h3>GESTION DE LIBROS</h3>
            <article>
                <div id="formulario">  
                    <label><b>Find Book</b> </label>
                    <form action="../controllers/getBookByIDController.php" method="POST">
                        <input name="id" placeholder="Introduce el ID del libro a buscar"/><br><br>
                        JSON<input type="checkbox" name="json" /><br>
                        XML<input type="checkbox" name="xml" />
                        <input type="submit" value="GET" id="enviar" /><br><br> 
                    </form> 
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>Change book data</b> </label><br>
                    <form action="../controllers/ChangeBookDataController.php" method="POST">
                        <p><b>Indica el id del libro a cambiar los datos</b></p>
                        <label for="id">Id (obligatorio)</label>
                        <input name="id" placeholder="Id del libro"/><br>
                        <p><b>Datos del libro a cambiar</b></p>
                        <label for="">Nombre</label>
                        <input name="name" placeholder="Nombre"/><br>
                        <label for="">Descripción</label>
                        <input name="description" placeholder="Descripción"/><br>
                        <label for="">Precio</label>
                        <input name="price" placeholder="Precio"/><br>
                        <label for="">Autor</label>
                        <input name="author" placeholder="Autor"/><br>
                        <label for="">Editorial</label>
                        <input name="editorial" placeholder="Editorial"/><br>
                        <label for="">Núm.páginas</label>
                        <input name="pages" placeholder="Núm. páginas"/><br>
                        <label for="">Idioma</label>
                        <input name="language" placeholder="Idioma"/><br>
                        <label for="">Formato</label>
                        <input name="format" placeholder="Formato -> Físico, digital..."/><br>
                        <label for="">Peso</label>
                        <input name="weight" placeholder="Peso"/><br>
                        <label for="">Dimensiones</label>
                        <input name="dimensions" placeholder="Ej: 200mmx100mm"/><br>
                        <label for="">Fecha publicación</label>
                        <input name="publication_date" placeholder="Ej: 2022-12-29"/><br>
                        <label for="">Fecha disponible</label>
                        <input name="available_date" placeholder="Ej: 2023-01-20"/><br>
                        <label for="">Género</label>
                        <input name="genre" placeholder="Género"/><br>
                        <input type="submit" value="CHANGE" id="enviar" /><br><br>
                    </form>
                </div>
            </article>
            <article>
                <div id="formulario">  
                    <label><b>Add new book</b> </label><br>
                    <form action="../controllers/NewBookController.php" method="POST">
                        <p><b>Datos del nuevo libro</b></p>
                        <label for="">Nombre</label>
                        <input name="name" placeholder="Nombre"/><br>
                        <label for="">Descripción</label>
                        <input name="description" placeholder="Descripción"/><br>
                        <label for="">Precio</label>
                        <input name="price" placeholder="Precio"/><br>
                        <label for="">Autor</label>
                        <input name="author" placeholder="Autor"/><br>
                        <label for="">Isbn</label>
                        <input name="isbn" placeholder="Ej: 978-84-376-0494-7"/><br>
                        <label for="">Editorial</label>
                        <input name="editorial" placeholder="Editorial"/><br>
                        <label for="">Núm.páginas</label>
                        <input name="pages" placeholder="Núm. páginas"/><br>
                        <label for="">Idioma</label>
                        <input name="language" placeholder="Idioma"/><br>
                        <label for="">Formato</label>
                        <input name="format" placeholder="Formato -> Físico, digital..."/><br>
                        <label for="">Peso</label>
                        <input name="weight" placeholder="Peso"/><br>
                        <label for="">Dimensiones</label>
                        <input name="dimensions" placeholder="Ej: 200mmx100mm"/><br>
                        <label for="">Fecha publicación</label>
                        <input name="publication_date" placeholder="Ej: 2022-12-29"/><br>
                        <label for="">Fecha disponible</label>
                        <input name="available_date" placeholder="Ej: 2023-01-20"/><br>
                        <label for="">Género</label>
                        <input name="genre" placeholder="Género"/><br>
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

