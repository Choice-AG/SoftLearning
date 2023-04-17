<?php

// Dissenyem una funció que controla els paràmetres d’entrada per evitar errors de funcionament
function div(int $number, int $div): float {
    if ($div === 0) { //Comprova que no ha rebut un 0, únic cas que no pot executar
        throw new Exception("Division by Zero"); // llença la excepció informant del motiu
    }
    return $number / $div; // Si ha superat la comprovació executa la operació i retorna resultat
}


// Al provar la funció, hem de protegir el codi susceptible de presentar excepcions dins d’un bloc try
try {
    echo div(56, 0); //Si els paràmetres son correctes presenta resultat
} catch (Exception $ex) { //Si la funció retorna una excepció la capturem i la presentem
    echo $ex->getMessage();
}