<?php
session_start();
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    echo "Registration successful! You can now <a href='login.php'>login</a>.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form action="register.php" method="post">
            <label for="register_username">Username:</label>
            <input type="text" id="register_username" name="username" required>
            <br>
            <label for="register_password">Password:</label>
            <input type="password" id="register_password" name="password" required>
            <br>
            <input type="submit" name="register" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
