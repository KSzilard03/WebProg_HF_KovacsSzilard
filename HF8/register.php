<?php

session_start();

include('mysql_connect.php');

if (isset($_SESSION['user_id'])) {
    header("Location: print.php");
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = "";

    $conn = getDBConnection();
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Sikeres regisztráció! Most bejelentkezhetsz.";
        header("Location: login.php");
        exit;
    } else {
        echo "Hiba történt: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Felhasználónév: <input type="text" name="username" required><br>
    <input type="submit" name="submit" value="Regisztráció">
</form>

<a href="login.php">Bejelentkezés</a></p>