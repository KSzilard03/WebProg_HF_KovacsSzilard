<?php

$tomb = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

for ($i = 0; $i < count($tomb); $i++) {

    echo gettype($tomb[$i]). " - ";

    if (is_numeric($tomb[$i])) {
        echo "Igen";
    } else {
        echo "Nem";
    }

    echo "<br></br>";

}

?>