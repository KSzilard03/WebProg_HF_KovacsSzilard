<?php

$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest", "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");

foreach ($orszagok as $x => $y) {
    echo "<p>$x fővárosa: <span style='color: red;'>$y</span></p>";
};

?>