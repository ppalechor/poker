<?php

// Función para barajar el mazo
function barajarMazo() {
    $mazos = array('Corazones', 'Diamantes', 'Tréboles', 'Picas');
    $cartas = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');
    $mazo = array();

    foreach ($mazos as $tipocarta) {
        foreach ($cartas as $valorcarta) {
            $mazo[] = array('mazo' => $tipocarta, 'carta' => $valorcarta);
        }
    }

    shuffle($mazo);
    return $mazo;
}

// Función para repartir cartas
function repartirCartas($mazo, $cantidad) {
    $mano = array_slice($mazo, 0, $cantidad);
    return $mano;
}

// Pedimos el nombre del usuario
echo "Ingrese su nombre: ";
$nombre = trim(fgets(STDIN));

// Barajamos el mazo
$mazo = barajarMazo();

// Repartimos 5 cartas
$mano = repartirCartas($mazo, 5);

// Mostramos la mano
echo "\nHola " . $nombre . ", tu mano es: \n";
foreach ($mano as $carta) {
    echo $carta['carta'] . " de " . $carta['mazo'] . "\n";
}

?>
