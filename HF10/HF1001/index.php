<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get User Cart Information</title>
</head>
<body>
<h1>Enter User ID to View Cart</h1>
<form method="POST" action="calculate.php">
    <label for="user_id">Enter User ID:</label>
    <input type="number" id="user_id" name="user_id" required>
    <input type="submit" value="Get Cart Information">
</form>
</body>
</html>