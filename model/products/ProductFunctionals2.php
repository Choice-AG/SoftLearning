<?php

include_once '../products/Libro.php';
include_once '../checks/checker.php';
include_once '../products/Software.php';
include_once '../products/Curso.php';

try {
    $libro = new Libro("109", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
    "15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "29-12-2022" , "17-01-2023", "Fantasia");
    $error = $libro->setName("Como programar PHP");
    if ($error == 0) {
        print "DETALLES DEL LIBRO: <br>"  . $libro->getDetails() . "<br><br>PERIODO: <br>".$libro->getPeriod()."<br><br>";
        
        print "TIEMPO INTERVALO:<br>";
        $l = $libro->getInterval(17);
        foreach($l as $date){
            print "Tiempo transcurido en intervalos es de ". $date. "<br>";
        }
        
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}

echo "<br><br>";

try {
    $software = new Software("003", "AVG Antivirus 10", "Antivirus de Windows", 19.99, "AVG", "Antivirus", "v1.5.7", "Windows");

    $error = $software->setType("Antimalware");
    if ($error == 0) {
        print "DETALLES DE SOFTWARE: <br>" . $software->getDetails();
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}

echo "<br><br>";

try {
    $Curso = new Curso("109", "Desarrollo Web", "Curso de FrontEnd Web", 250, "Alejandro Salas", 200, "FrontEnd", "09-12-2000", "29-12-2000", "Mañana", "Remoto", "Español");
    $error = $Curso->setAuthor("Goizane Olañeta");
    if ($error == 0) {
        print "DETALLES DEL CURSO: <br>" . $Curso->getDetails() . "<br><br>";
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}



function getStorable(Storable $stake): string {
    return "DIMENSIONES: " . $stake->getDimensions()." ISBN: " .$stake->getIsbn() . " PRECIO: " . $stake->getPrice();
}

print getStorable($libro);

echo "<br><br>";

function getMarketable(Marketable $stake): string {
    return "AUTHOR: ".$stake->getAuthor()." NAME: " .$stake->getName() . " ID:" . $stake->getId();
}
print getMarketable($Curso);

echo "<br><br>";

print getMarketable($software);