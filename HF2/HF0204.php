<?php

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function atalakit($tomb, $formazas) {

    foreach ($tomb as $kulcs => $ertek) {
        if ($formazas == 'kisbetus') {
            $tomb[$kulcs] = strtolower($ertek);
        } elseif ($formazas == 'nagybetus') {
            $tomb[$kulcs] = strtoupper($ertek);
        }
    }

    return $tomb;
}

$kisBetus = atalakit($szinek, 'kisbetus');
$nagyBetus = atalakit($szinek, 'nagybetus');

echo "Kisbetűs formában függvénnyel: ";
print_r($kisBetus);
echo "<br>";

echo "Nagybetűs formában függvénnyel: ";
print_r($nagyBetus);
echo "<br>";

function atalakit_map($tomb, $formazas)
{
    if ($formazas === "kisbetus") {
        return array_map('strtolower', $tomb);
    } elseif ($formazas === "nagybetus") {
        return array_map('strtoupper', $tomb);
    }

    return $tomb;
}

$kisBetusMap = atalakit_map($szinek, 'kisbetus');
$nagyBetusMap = atalakit_map($szinek, 'nagybetus');

echo "Kisbetűs formában mappal: ";
print_r($kisBetusMap);
echo "<br>";

echo "Nagybetűs formában függvénnyel: ";
print_r($nagyBetusMap);
echo "<br>";

?>