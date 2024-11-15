<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

function getDBConnection()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$con = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS egyetem";
if ($con->query($sql) === TRUE) {
    echo "Adatbázis létrehozva vagy már létezik.<br>";
} else {
    echo "Hiba az adatbázis létrehozásakor: " . $con->error . "<br>";
}

$con->select_db("egyetem");

$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($con->query($sql_users) === TRUE) {
    echo "Users tábla létrehozva vagy már létezik.<br>";
} else {
    echo "Hiba a users tábla létrehozásakor: " . $con->error . "<br>";
}

$sql_hallgatok = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DOUBLE NOT NULL
)";

if ($con->query($sql_hallgatok) === TRUE) {
    echo "Hallgatok tábla létrehozva vagy már létezik.<br>";
} else {
    echo "Hiba a hallgatok tábla létrehozásakor: " . $con->error . "<br>";
}

$con->close();

?>