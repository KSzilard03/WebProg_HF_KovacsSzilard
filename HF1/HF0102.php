<?php

$masodpercek = 2200;

if (is_int($masodpercek)) {
    $ora = floor($masodpercek / 3600);
    echo "<b>Az átalakított másodpercek órában: {$ora}</b>";
} else {
    echo "A megadott másodpercek nem egész számok!";
}

?>