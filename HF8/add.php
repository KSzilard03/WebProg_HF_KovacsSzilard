<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('mysql_connect.php');

if (isset($_POST['submit'])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $nev, $szak, $atlag);
    $stmt->execute();

    echo "Köszönjük! Az adatokat elmentettük.<br>";
    echo "<a href='add.php'>Új adat</a><br>";
    echo "<a href='print.php'>Adatok listázása</a><br>";

    $stmt->close();
    $conn->close();
} else {
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Név: <input type="text" name="nev" required><br>
        Szak: <input type="text" name="szak" required><br>
        Átlag: <input type="number" step="0.01" name="atlag" required><br>
        <input type="submit" name="submit" value="Elküld">
    </form>

    <a href="print.php">Vissza</a></p>

    <?php
}

?>