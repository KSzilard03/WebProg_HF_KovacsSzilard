<?php

$name = '';
$email = '';
$gender = '';
$terms = '';
$dob = '';
$interest = '';
$dobError = '';
$country = '';
$password = '';
$nameError = '';
$genderError = '';
$termsError = '';
$emailError = '';
$countryError = '';
$passwordError = '';
$confirmPassword = '';
$confirmPasswordError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {

        if (empty($_POST["name"])) {
            $nameError = "Name is required!";
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailError = "Email is required!";
        } else {
            $email = htmlspecialchars($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format!";
            }
        }

        if (empty($_POST["password"])) {
            $passwordError = "Password is required!";
        } else {
            $password = htmlspecialchars($_POST["password"]);
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
                $passwordError = "Password must be at least 8 characters long and include 1 uppercase letter, 1 number, and 1 special character.";
            }
        }

        if (empty($_POST["confirmPassword"])) {
            $confirmPasswordError = "Confirm password is required!";
        } else {
            $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
            if ($password !== $confirmPassword) {
                $confirmPasswordError = "Passwords do not match!";
            }
        }

        if (empty($_POST["gender"])) {
            $genderError = "Gender is required";
        } else {
            $gender = htmlspecialchars($_POST["gender"]);
        }

        if (empty($_POST["dob"])) {
            $dobError = "Date of Birth is required!";
        } else {
            $dob = $_POST["dob"];
            $d = DateTime::createFromFormat('Y-m-d', $dob);
            if (!$d || $d->format('Y-m-d') !== $dob) {
                $dobError = "Invalid date format!";
            }
        }

        if (empty($_POST["country"])) {
            $countryError = "Country is required!";
        } else {
            $country = htmlspecialchars($_POST["country"]);
        }

        if (isset($_POST["interests"])) {
            $interests = $_POST["interests"];
        }

        if (!isset($_POST["terms"])) {
            $termsError = "You must agree to the terms & conditions!";
        } else {
            $terms = $_POST["terms"];
        }

        if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError) && empty($genderError) && empty($dobError) && empty($countryError) && empty($termsError)) {
            echo "<h3 style='color: green;'>Registration Successful!</h3>";
            echo "<p style='font-weight: bold;'>Name: <span style='font-weight: normal; font-style: italic;'>$name</span></p>";
            echo "<p style='font-weight: bold;'>Email: <span style='font-weight: normal; font-style: italic;'>$email</span></p>";
            echo "<p style='font-weight: bold;'>Gender: <span style='font-weight: normal; font-style: italic;'>$gender</span></p>";
            echo "<p style='font-weight: bold;'>Date of Birth: <span style='font-weight: normal; font-style: italic;'>$dob</span></p>";
            echo "<p style='font-weight: bold;'>Country: <span style='font-weight: normal; font-style: italic;'>$country</span></p>";
            if (!empty($interests)) {
                echo "<p style='font-weight: bold;'>Areas of Interest: <span style='font-weight: normal; font-style: italic;'>" . implode(", ", $interests) . "</span></p>";
            }
            echo "<p style='font-weight: bold;'>Terms Accepted: <span style='font-weight: normal; font-style: italic;'>" . ($terms ? "Yes" : "No") . "</span></p>";
        }

    }
}

?>

<h3>Registration Form</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="name"> Name:
        <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameError; ?></span>
    </label>
    <br><br>

    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailError; ?></span>
    </label>
    <br><br>

    <label for="password"> Password:
        <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordError; ?></span>
    </label>
    <br><br>

    <label for="confirmPassword"> Confirm Password:
        <input type="password" name="confirmPassword" value="<?php echo $confirmPassword;?>">
        <span class="error">* <?php echo $confirmPasswordError; ?></span>
    </label>
    <br><br>

    <label for="dob"> Date of Birth:
        <input type="date" name="dob" value="<?php echo $dob;?>">
        <span class="error">* <?php echo $dobError; ?></span>
    </label>
    <br><br>

    <label> Gender:<br>
        <input type="radio" name="gender" value="male" <?php if ($gender === 'male') echo 'checked';?>>Male<br>
        <input type="radio" name="gender" value="female" <?php if ($gender === 'female') echo 'checked';?>>Female<br>
        <input type="radio" name="gender" value="other" <?php if ($gender === 'other') echo 'checked';?>>Other<br>
        <span class="error">* <?php echo $genderError; ?></span>
    </label>
    <br><br>

    <label for="country"> Country:
        <select name="country">
            <option value="">Please select</option>
            <option value="Hungary" <?php if ($country === 'Hungary') echo 'selected';?>>Hungary</option>
            <option value="USA" <?php if ($country === 'USA') echo 'selected';?>>USA</option>
            <option value="Germany" <?php if ($country === 'Germany') echo 'selected';?>>Germany</option>
            <option value="UK" <?php if ($country === 'UK') echo 'selected';?>>United Kingdom</option>
        </select>
        <span class="error">* <?php echo $countryError; ?></span>
    </label>
    <br><br>

    <label> Areas of Interest:<br>
        <input type="checkbox" name="interests[]" value="sports">Sports<br>
        <input type="checkbox" name="interests[]" value="art">Art<br>
        <input type="checkbox" name="interests[]" value="science">Science<br>
    </label>
    <br><br>

    <input type="checkbox" name="terms">I agree to terms & conditions.<br>
    <span class="error">* <?php echo $termsError;?></span>
    <br><br>
    <input type="submit" name="submit" value="Register"/>
</form>