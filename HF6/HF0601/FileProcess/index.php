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

session_start();
if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];
    $firstName = $formData['firstName'] ?? '';
    $lastName = $formData['lastName'] ?? '';
    $email = $formData['email'] ?? '';
    $attend = $formData['attend'] ?? [];
    $abstractError = $formData['abstractError'] ?? '';
    $termsError = $formData['termsError'] ?? '';
    $firstNameError = $formData['firstNameError'] ?? '';
    $lastNameError = $formData['lastNameError'] ?? '';
    $emailError = $formData['emailError'] ?? '';
    $attendError = $formData['attendError'] ?? '';

    unset($_SESSION['formData']);
}

?>

<h3>Online conference registration</h3>

<form method="post" action="process.php" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
        <span class="error">*<?php echo $firstNameError; ?></span>
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
        <span class="error">* <?php echo $lastNameError; ?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error">* <?php echo $emailError; ?></span>
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1" <?= in_array("Event1", $attend) ? 'checked' : '' ?>>Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?= in_array("Event2", $attend) ? 'checked' : '' ?>>Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?= in_array("Event3", $attend) ? 'checked' : '' ?>>Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4" <?= in_array("Event4", $attend) ? 'checked' : '' ?>>Event 4<br>
        <span class="error">* <?php echo $attendError; ?></span>
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
        <span class="error">* <?php echo $abstractError; ?></span>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="1" <?= isset($formData['terms']) ? 'checked' : '' ?>>I agree to terms & conditions.<br>
    <span class="error">* <?php echo $termsError; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>