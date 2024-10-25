<?php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] == UPLOAD_ERR_OK) {
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
            if ($_FILES["abstract"]["error"] != UPLOAD_ERR_NO_FILE) {
                $abstractError = "An error occurred during file upload!";
            } else {
                $abstractError = "Abstract upload is required!";
            }
        }

        if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($attendError) && empty($termsError) && empty($abstractError)) {
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

<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $firstName;?>">
        <span class="error">*<?php echo $firstNameError;?></span>
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastName;?>">
        <span class="error">* <?php echo $lastNameError;?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailError; ?></span>
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1" <?= in_array("Event1", $attend) ? 'checked' : '' ?>>Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?= in_array("Event2", $attend) ? 'checked' : '' ?>>Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?= in_array("Event3", $attend) ? 'checked' : '' ?>>Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4" <?= in_array("Event4", $attend) ? 'checked' : '' ?>>Event 4<br>
        <span class="error">* <?php echo $attendError;?></span>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract">
        <span class="error">* <?php echo $abstractError;?></span>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="1" <?= isset($_POST["terms"]) ? 'checked' : '' ?>>I agree to terms & conditions.<br>
    <span class="error">* <?php echo $termsError;?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>