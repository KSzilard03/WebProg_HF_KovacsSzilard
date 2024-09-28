<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

$kiemeltNapok = array("K", "Cs", "Szo", "Tu", "Th", "Sa", "Di", "Do", "Sa");

foreach ($napok as $nyelv => $nyelvNapok) {

    echo "$nyelv: ";

    foreach ($nyelvNapok as $nap) {

        if (in_array($nap, $kiemeltNapok)) {
            echo "<b>$nap</b>, ";
        } else {
            echo "$nap, ";
        }

    }
    print "<br>";
}

?>