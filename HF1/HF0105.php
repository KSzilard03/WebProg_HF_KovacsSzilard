<?php

$szam1 = 16;
$szam2 = 8;
$operator = "+";

switch ($operator) {

    case '+':

        $eredmeny = $szam1 + $szam2;
        echo "Eredmény: $szam1 + $szam2 = $eredmeny";
        break;

    case '-':

        $eredmeny = $szam1 - $szam2;
        echo "Eredmény: $szam1 - $szam2 = $eredmeny";
        break;

    case '*':

        $eredmeny = $szam1 * $szam2;
        echo "Eredmény: $szam1 * $szam2 = $eredmeny";
        break;

    case '/':

        if ($szam2 == 0) {
            echo "Osztás nullával nem megengedett!";
        } else {
            $eredmeny = $szam1 / $szam2;
            echo "Eredmény: $szam1 / $szam2 = $eredmeny";
        }

        break;

    default:
        echo "Hiba: Érvénytelen műveleti jel!";
        break;

}

?>