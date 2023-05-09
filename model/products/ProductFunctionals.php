<?php

include_once '../products/Libros.php';
include_once '../checks/checker.php';

try {
    $libro = new Libro("109", "El cuento de peter pan", "Peter pan va sobre un niño que nunca crecia y luego le pasan cosas.", 
    "15.2", "Joaquin Pereira", "978-84-376-0494-7", "Anaya", 200, "Español", "Tapa dura", 500, "20x15x2", "09-12-2000" , "16-01-2001", "Fantasia");
    $error = $libro->setName("Como programar PHP");
    if ($error == 0) {
        print "<br><br>El libro tiene los siguiente detalles  "  . $libro->getDetails() . "<br><br>".$libro->getPeriod()."<br><br>";
        
        $l = $libro->getInterval(12);
        foreach($l as $date){
            print "<br>Tiempo transcurido en intervalos es de ". $date. "<br>";
        }
        
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}


/* try {
    $sotfwer=new Software("microsoft SL ", "Anti virus2023", "12.34", "1209831321", "6 meses", "Anti virus", "microsoft 11");

    $error = $sotfwer->setTipoSotfwer("Microsoft 10");
    if ($error == 0) {
        print "<br><br>El Sowtfer tien los siguiente detalles  " . $sotfwer->getDetails() . "<br><br>";
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}


try {
    $Curso=new Curso("Ayoub Addam", "EL mundo bereber", "34.94", "569432934523", "12 meses", "Educativo Batx", 230, "22-09-2023", "03-06-2023");
    $error = $Curso->setAutor("Ayoub Adam");
    if ($error == 0) {
        print "<br><br>El Curso tien los siguiente detalles" . $Curso->getDetails() . "<br><br>";
    } else {
        print ErrorExplain::StringErrorCode($error);
    }
} catch (Exception $ex) {
    print $ex->getMessage();
}



function getStorable(Storable $stake): string {
    return "<br><br>Las dimensiones son  ".$stake->getDimensiones()." El ident/ ISBN es " .$stake->getIsbn() . " El tipo de envase es =" . $stake->getIsFragil();
}

print getStorable($Libro);


function getMarketable(Marketable $stake): string {
    return "<br><br>".$stake->getTipo()." El Nombre es  " .$stake->getNombre() . " El ID  es =" . $stake->getId();
}

print getMarketable($Curso);

print getMarketable($sotfwer); */