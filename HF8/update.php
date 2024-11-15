<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('mysql_connect.php');

$conn = getDBConnection();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $stmt = $conn->prepare("UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? WHERE id = ?");
    $stmt->bind_param("ssdi", $nev, $szak, $atlag, $id);
    $stmt->execute();

    header("Location: print.php");
    exit();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT id, nev, szak, atlag FROM hallgatok WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
    }
}

$conn->close();

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="nev">Név:</label>
    <input type="text" name="nev" value="<?php echo htmlspecialchars($row['nev']); ?>" required><br>

    <label for="szak">Szak:</label>
    <input type="text" name="szak" value="<?php echo htmlspecialchars($row['szak']); ?>" required><br>

    <label for="atlag">Átlag:</label>
    <input type="number" step="0.01" name="atlag" value="<?php echo htmlspecialchars($row['atlag']); ?>" required><br>

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    <input type="submit" name="submit" value="Módosítás">
</form>

<a href="print.php">Vissza</a></p>