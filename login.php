<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('location: complaint.php');
    } else {
        echo "Incorrect username or password";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="login_username">Username:</label>
            <input type="text" id="login_username" name="username" required>
            <br>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="password" required>
            <br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
