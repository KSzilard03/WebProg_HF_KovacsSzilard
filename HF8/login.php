<?php

session_start();

include('mysql_connect.php');

if (isset($_SESSION['user_id'])) {
    header("Location: print.php");
    exit;
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $conn = getDBConnection();
    $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: print.php");
        exit;
    } else {
        echo "Hibás felhasználónév!";
    }

    $stmt->close();
    $conn->close();
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Felhasználónév: <input type="text" name="username" required><br>
    <input type="submit" name="submit" value="Bejelentkezés">
</form>

<a href="register.php">Regisztráció</a></p>