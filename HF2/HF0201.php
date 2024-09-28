<?php

$szin = 'lightblue';

$szorzotabla = function ($n) use ($szin) {

    echo "<table border='1'>";

    for ($i = 1; $i <= $n; $i++) {

        echo "<tr>";

        for ($j = 1; $j <= $n; $j++) {

            $alapSzin = '';
            $ertek = $i * $j;

            if ($i == $j) {
                $alapSzin = $szin;
            }

            echo "<td style='background-color: $alapSzin;'>$ertek</td>";

        }

        echo "</tr>";

    }

    echo "</table>";

};

$szorzotabla(10);

?>