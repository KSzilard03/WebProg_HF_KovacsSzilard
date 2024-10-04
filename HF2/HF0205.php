<?php

$bevasarlolista = [
    ["nev" => "Kenyer", "mennyiseg" => 2, "egysegar" => 8.5],
    ["nev" => "Viz", "mennyiseg" => 1, "egysegar" => 2.5]
];

function hozzaad($lista, $nev, $mennyiseg, $egysegar)
{
    $lista[] = [
        "nev" => $nev,
        "mennyiseg" => $mennyiseg,
        "egysegar" => $egysegar
    ];

    return $lista;
}

function eltavolit($lista, $nev)
{
    foreach ($lista as $kulcs => $elem) {
        if ($elem['nev'] === $nev) {
            unset($lista[$kulcs]);
            break;
        }
    }

    return array_values($lista);
}

function kiir($lista)
{
    foreach ($lista as $elem) {
        echo "<br>";
        echo "Termék: " . $elem['nev'] . ", Mennyiség: " . $elem['mennyiseg'] . ", Egységár: " . $elem['egysegar'] . " RON";
    }
}

function osszkoltseg($lista)
{
    $osszeg = 0;

    foreach ($lista as $elem) {
        $osszeg += $elem['mennyiseg'] * $elem['egysegar'];
    }

    return $osszeg;
}

echo "<b> Alap bevásárlólista elemei: </b>" . "<br>";
kiir($bevasarlolista);

echo "<br>";

$osszeg = osszkoltseg($bevasarlolista);
echo "Összköltség: " . $osszeg . " RON";

echo "<br>";

echo "<br>" . "Tej hozzáadása a bevásárlólistához.." . "<br>";

$bevasarlolista = hozzaad($bevasarlolista, "Tej", 3, 4.2);

echo "<br>";

echo "<b> Bevásárlólista elemei a hozzáadás után: </b>" . "<br>";
kiir($bevasarlolista);

echo "<br>";

$osszeg = osszkoltseg($bevasarlolista);
echo "Összköltség: " . $osszeg . " RON";

echo "<br>";

echo "<br>" . "Víz eltávolítása a bevásárlólistából.." . "<br>";

$bevasarlolista = eltavolit($bevasarlolista, "Viz");

echo "<br>";

echo "<b> Bevásárlólista elemei eltávolítás után: </b>" . "<br>";
kiir($bevasarlolista);

echo "<br>";

$osszeg = osszkoltseg($bevasarlolista);
echo "Összköltség eltávolítás után: " . $osszeg . " RON" . "<br>";

?>