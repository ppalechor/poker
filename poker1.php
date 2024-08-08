<?php
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
function repartirCartas($mazo, $cantidad) {
    $mano = array_slice($mazo, 0, $cantidad);
    return $mano;


}
function evaluarMano($mano) {
    $cartas = array_column($mano, 'carta');
    $mazos = array_column($mano, 'mazo');
    $esPoker = count(array_unique($cartas)) === 1;
    $esColor = count(array_unique($mazos)) === 1;
    if ($esPoker || $esColor) {
        return 'Póker de color';
    } elseif ($esPoker) {
        return 'Póker';
    } elseif ($esColor) {
        return 'Color';
    } else {
        return 'Mano alta';
    }
}




echo "Ingrese el número de jugadores: ";
$numJugadores = trim(fgets(STDIN));
$jugadores = array();
for ($i = 0; $i < $numJugadores; $i++) {
    echo "Ingrese el nombre del jugador " . ($i + 1) . ": ";
    $jugadores[] = trim(fgets(STDIN));
}




$mazo = barajarMazo();



$manos = array();
$mazo = barajarMazo();
for ($i = 0; $i < $numJugadores; $i++) {
    $manos[] = array_slice($mazo, 0,5);
    $mazo = array_slice($mazo, 5);

}



for ($i = 0; $i < $numJugadores; $i++) {
    echo "\nHola " . $jugadores[$i] . ", tu mano es: \n";
    foreach ($manos[$i] as $carta) {
        echo $carta['carta'] . " de " . $carta['mazo'] . "\n";

    }

    echo "\ntu mano es: " . evaluarMano($manos[$i]) . "\n";
    
}

?>
