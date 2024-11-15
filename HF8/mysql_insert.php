<?php

include('mysql_connect.php');

$studentsData = array(
    array('John Doe', 'Informatika', 5.2),
    array('Alice Smith', 'Műszaki Informatika', 7.9),
    array('Bob Johnson', 'Gazdaságinformatika', 8.8),
    array('Eva Wilson', 'Matematika', 9.5),
    array('Mike Brown', 'Fizika', 5.0),
    array('Sarah Davis', 'Kémia', 3.7),
    array('David Lee', 'Biológia', 8.1),
    array('Linda Martinez', 'Informatika', 8.8),
    array('Tom Miller', 'Műszaki Informatika', 5.3),
    array('Karen Wilson', 'Gazdaságinformatika', 6.5)
);

$conn = getDBConnection();

$stmt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $nev, $szak, $atlag);

foreach ($studentsData as $diak) {
    $nev = $diak[0];
    $szak = $diak[1];
    $atlag = $diak[2];
    $stmt->execute();
}

$stmt->close();
$conn->close();

?>