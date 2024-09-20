<?php

$tavasz = [3, 4, 5];
$nyar = [6, 7, 8];
$osz = [9, 10, 11];
$tel = [12, 1, 2];

$honap = 11;

if (in_array($honap, $tavasz)) {
    echo "A megadott hónap alapján tavasz van!";
} else if (in_array($honap, $nyar)) {
    echo "A megadott hónap alapján nyár van!";
} else if (in_array($honap, $osz)) {
    echo "A megadott hónap alapján ősz van!";
} else if (in_array($honap, $tel)) {
    echo "A megadott hónap alapján tél van!";
} else {
    echo "Érvénytelen hónap!";
}

echo "<br>";

switch (true) {

    case in_array($honap, [3, 4, 5]):
        echo "A megadott hónap alapján tavasz van!";
        break;

    case in_array($honap, [6, 7, 8]):
        echo "A megadott hónap alapján nyár van!";
        break;

    case in_array($honap, [9, 10, 11]):
        echo "A megadott hónap alapján ősz van!";
        break;

    case in_array($honap, [12, 1, 2]):
        echo "A megadott hónap alapján tél van!";
        break;

    default:
        echo "Érvénytelen hónap!";
        break;
}

?>