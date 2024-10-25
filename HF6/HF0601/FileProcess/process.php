<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = '';
    $terms = '';
    $attend = [];
    $lastName = '';
    $firstName = '';
    $termsError = '';
    $emailError = '';
    $attendError = '';
    $lastNameError = '';
    $firstNameError = '';
    $abstractError = '';
    $abstractFileName = '';

    if (isset($_POST["submit"])) {
        if (empty($_POST["firstName"])) {
            $firstNameError = "First name is required!";
        } else {
            $firstName = htmlspecialchars($_POST["firstName"]);
        }

        if (empty($_POST["lastName"])) {
            $lastNameError = "Last name is required!";
        } else {
            $lastName = htmlspecialchars($_POST["lastName"]);
        }

        if (empty($_POST["email"])) {
            $emailError = "Email is required!";
        } else {
            $email = htmlspecialchars($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format!";
            }
        }

        if (empty($_POST["attend"])) {
            $attendError = "At least one event must be selected!";
        } else {
            $attend = $_POST["attend"];
        }

        if (!isset($_POST["terms"])) {
            $termsError = "You must agree to the terms & conditions!";
        } else {
            $terms = $_POST["terms"];
        }

        if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES["abstract"]["tmp_name"];
            $fileName = $_FILES["abstract"]["name"];
            $fileSize = $_FILES["abstract"]["size"];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            if ($fileSize > 3 * 1024 * 1024) {
                $abstractError = "The abstract file must be less than 3MB!";
            } elseif ($fileType !== 'pdf') {
                $abstractError = "Only PDF files are allowed for the abstract!";
            } else {
                $abstractFileName = htmlspecialchars($fileName);
            }
        } else {
            if ($_FILES["abstract"]["error"] !== UPLOAD_ERR_NO_FILE) {
                $abstractError = "An error occurred during file upload!";
            } else {
                $abstractError = "Abstract upload is required!";
            }
        }

        if (!empty($firstNameError) || !empty($lastNameError) || !empty($emailError) || !empty($attendError) || !empty($termsError) || !empty($abstractError)) {
            $_SESSION['formData'] = [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'attend' => $attend,
                'abstractError' => $abstractError,
                'termsError' => $termsError,
                'firstNameError' => $firstNameError,
                'lastNameError' => $lastNameError,
                'emailError' => $emailError,
                'attendError' => $attendError,
                'terms' => isset($_POST['terms']) ? 1 : 0,
            ];
            header("Location: index.php");
            exit();
        } else {
            echo "<h3 style='color: green;'>Registration Successful!</h3>";
            echo "<p style='font-weight: bold;'>First Name: <span style='font-weight: normal; font-style: italic;'>$firstName</span></p>";
            echo "<p style='font-weight: bold;'>Last Name: <span style='font-weight: normal; font-style: italic;'>$lastName</span></p>";
            echo "<p style='font-weight: bold;'>Email: <span style='font-weight: normal; font-style: italic;'>$email</span></p>";
            echo "<p style='font-weight: bold;'>Attending Events: <span style='font-weight: normal; font-style: italic;'>" . implode(", ", $attend) . "</span></p>";
            echo "<p style='font-weight: bold;'>T-Shirt Size: <span style='font-weight: normal; font-style: italic;'>" . htmlspecialchars($_POST['tshirt']) . "</span></p>";
            echo "<p style='font-weight: bold;'>Abstract File: <span style='font-weight: normal; font-style: italic;'>$abstractFileName</span></p>";
        }

    }

}

?>