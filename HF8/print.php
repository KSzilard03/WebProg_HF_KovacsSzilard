<?php

session_start();

include('mysql_connect.php');

$conn = getDBConnection();

$stmt = $conn->prepare("SELECT id, nev, szak, atlag FROM hallgatok");
$stmt->execute();
$result = $stmt->get_result();

echo "<a href='add.php'>Új hallgató hozzáadása</a><br>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nev"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["szak"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["atlag"]) . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a></td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nincsenek hallgatók az adatbázisban!";
}

$stmt->close();
$conn->close();

?>