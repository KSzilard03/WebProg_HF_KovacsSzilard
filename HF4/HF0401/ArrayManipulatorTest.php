<?php

include "ArrayManipulator.php";

$array = array(1, 2, 3, 4, 5);
$arrayManipulator = new ArrayManipulator($array);

echo "<strong>The created array:</strong>". "<br>";
echo $arrayManipulator . "<br>";

echo "<br>" . "<strong>Add element 4 to array:</strong>" . "<br>";
$arrayManipulator->addElement(4);
echo "<br>" . $arrayManipulator . "<br>";

echo "<br>" ."<strong>Add element 2:</strong>" . "<br>";
$arrayManipulator->addElement(2);
echo "<br>" . $arrayManipulator . "<br>";

echo "<br>" . "<strong>Delete element 2:</strong>" . "<br>";
try {
    $arrayManipulator->deleteElement(2);
    echo $arrayManipulator . "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Use a non-existent function:</strong>" . "<br>";
try {
    $arrayManipulator->sumListElements();
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "Property tests:<br>";

echo "<br>" . "<strong>Get the array data private property:</strong>" . "<br>";

try {
    print_r($arrayManipulator->data);
    echo "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Get the array non-existent property:</strong>" . "<br>";

try {
    print_r($arrayManipulator->list);
    echo "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Set the array data private property to 5, 6, 7:</strong>" . "<br>";

try {
    $newData = [5, 6, 7];
    $arrayManipulator->data = $newData;
    echo $arrayManipulator . "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Check data property exists:</strong>" . "<br>";

try {
    if (isset($arrayManipulator->data)) {
        echo "Property [data] exists!<br>";
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Unset the data property:</strong>" . "<br>";

try {
    unset($arrayManipulator->data);
    echo "Property [data] has been unset!<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

echo "<br>" . "<strong>Check data property exists after unset:</strong>" . "<br>";
try {
    if (isset($arrayManipulator->data)) {
        echo "Property [data] exists!<br>";
    } else {
        echo "Property [data] does not exist!<br>";
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

?>