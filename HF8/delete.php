<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('mysql_connect.php');

$conn = getDBConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM hallgatok WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: print.php");
    exit();
}

$conn->close();

?>