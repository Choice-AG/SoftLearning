<?php

$d = new DateTime();

print $d->format('d-m-y, H:i:s, l j \d\e F \d\e\l Y(L) (z \d\i\a \d\e \l\a W \s\e\m\a\n\a)');

//l = DIA SEMANA (lunes, martes, miercoles...)
//j = DIA (numero)
//F = MES
//Y(L) = AÑO + BISIESTO
//z = DIA DEL AÑO (dias que han pasado desde el inicio del año)
//W = SEMANA DEL AÑO (semanas que han pasado desde el inicio del año)

$fixedDate = new DateTime('23-10-2022 13:58:23');
$relativeDate = new DateTime('first day of next month');
//var_dump($relativeDate);
print "<br><br>";
$datesDiff = $d->diff($relativeDate); //fecha - otraFecha
var_dump($datesDiff);

print "<br><br>";
$fixedDate->add($datesDiff); //fecha + otraFecha
var_dump($fixedDate);

print "<br><br>Campaña mensual<br>";
$interval = new DateInterval('P3D'); //Periodo de 3 dias
$daterange = new DatePeriod($d, $interval, $relativeDate); //inicio, intervalo, fin
foreach ($daterange as $date) {
    echo $date->format("d-m-y") . "<br>";
}

print "<br>Campaña en 3 fases<br>";
$daterange = new DatePeriod($relativeDate, $interval, 2);
foreach ($daterange as $date) {
    echo $date->format("Y-m-d") . "<br>";
}