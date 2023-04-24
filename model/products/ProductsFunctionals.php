<?php

include_once 'Product.php';
include_once 'Libros.php';
include_once 'Cursos.php';
include_once 'Software.php';
include_once '../../exceptions/BuildException.php';
include_once 'interface/Marketable.php';
include_once 'interface/Storable.php';

//Crear Libro
$libro = new Libro(
  "109",
  "El cuento de peter pan",
  "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.",
  15.2,
  "Joaquin Pereira",
  "978-84-376-0494-7",
  "Anaya",
  200,
  "Español",
  "Tapa dura",
  500,
  "20x15x2",
  "09-12-2000",
  "Fantasia"
);

//Comprobar que se ha creado correctamente
echo $libro->getAuthor() . ";" . $libro->getIsbn() . ";" . $libro->getEditorial() . ";" . $libro->getPages() . ";" . $libro->getLanguage() . ";" .
  $libro->getFormat() . ";" . $libro->getWeight() . "g;" . $libro->getDimensions() . ";" . $libro->getPublicationDate() . ";" . $libro->getGenre();

//Comprobar que no se puede crear un libro con un isbn y dimensiones incorrecto
try {
  $libro2 = new Libro(
    "109",
    "El cuento de peter pan",
    "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.",
    15.2,
    "Joaquin Pereira",
    "978-84",
    "Anaya",
    200,
    "Español",
    "Tapa dura",
    500,
    "20x",
    "09-12-2000",
    "Fantasia"
  );
} catch (BuildException $ex) {
  echo "<br>Mensaje de error de libro2: " . $ex->getMessage() . "<br><br>";
}

//------------------------------------------------------------------

//Crear Curso
$curso = new Cursos(
  "109",
  "El cuento de peter pan",
  "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.",
  15.2,
  "Joaquin Pereira",
  200,
  "Fantasia",
  "09-12-2000",
  "09-12-2000",
  "Mañana",
  "Remoto",
  "Español"
);

//Comprobar que se ha creado correctamente
echo $curso->getAuthor() . ";" . $curso->getDuration() . ";" . $curso->getCategory() . ";" . $curso->getEndDate() . ";" . $curso->getStartDate() . ";" .
  $curso->getSchedule() . ";" . $curso->getIsRemote() . ";" . $curso->getLanguage();


//Comprobar que no se puede crear un curso con una fecha de inicio y fin incorrecta
try {
  $curso2 = new Cursos(
    "109",
    "El cuento de peter pan",
    "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.",
    15.2,
    "Joaquin Pereira",
    200,
    "Fantasia",
    "",
    "",
    "Mañana",
    "Remoto",
    "Español"
  );
} catch (BuildException $ex) {
  echo "<br>Mensaje de error de curso2: " . $ex->getMessage() . "<br><br>";
}

//------------------------------------------------------------------

//Crear Software
$software = new Software("003", "AVG", "Antivirus de Windows", 19.99, "AVG", "Antivirus", "v1.5.7", "Windows");

//Comprobar que se ha creado correctamente
echo $software->getAuthor() . ";" . $software->getType() . ";" . $software->getVersion() . ";" . $software->getOs();

//Comprobar que no se puede crear un software con un tipo y version incorrecto
try {
  $software2 = new Software("003", "AVG", "Antivirus de Windows", 19.99, "AVG", "", "v1.5.7", "Windows");
} catch (BuildException $ex) {
  echo "<br>Mensaje de error de software2: " . $ex->getMessage() . "";
}

//Metodos de getDetails
echo "<br><br>Detalles del libro: " . $libro->getDetails();
echo "<br><br>Detalles del curso: " . $curso->getDetails();
echo "<br><br>Detalles del software: " . $software->getDetails();

//------------------------------------------------------------------

//Crear funcion para recibir datos de Storable
function getDataStorable(Storable $storable): string
{
  return "Name:" . $storable->getName() . ";Id:" . $storable->getId() . ";Price:" . $storable->getPrice() . ";Details:" . $storable->getDetails();
}

//Crear funcion para recibir datos de Marketable
function getDataMarketable(Marketable $marketable): string
{
  return "Name:" . $marketable->getName() . ";Id:" . $marketable->getId() . ";Price:" . $marketable->getPrice() . ";Author:" . $marketable->getAuthor() 
        . ";Details" . $marketable->getDetails();
}

print "<br><br>Software:<br>" . getDataMarketable($software);
print "<br><br>Libro:<br>" . getDataStorable($libro);