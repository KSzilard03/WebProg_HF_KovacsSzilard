<?php

session_start();

if (!isset($_COOKIE["random_number"])) {
    $randomNumber = rand(1, 100);
    setcookie("random_number", $randomNumber, time() + 3600);
} else {
    $randomNumber = $_COOKIE["random_number"];
}

if (isset($_POST["tip"])) {
    $tip = $_POST["tip"];

    if (is_numeric($tip)) {
        if ($tip == $randomNumber) {
            echo "Congratulations! The number is: $randomNumber!<br>";
            setcookie("random_number", "", time() - 3600);
        } else {
            if ($tip < $randomNumber) {
                echo "Your tip: $tip. The number is higher! Try again!<br>";
            } else {
                echo "Your tip: $tip. The number is less! Try again!<br>";
            }
        }
    } else {
        echo "Please fill out the input!";
    }
}

?>

<form method="POST" action="">
    <br>Guess a number between 1 and 100:
    <input type="number" name="tip" required>
    <br><input type="submit" value="Submit">
</form>