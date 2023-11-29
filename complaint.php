<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

if (isset($_POST['submit_complaint'])) {
    $user_id = $_SESSION['user_id'];
    $complaint_text = $_POST['complaint_text'];

    $query = "INSERT INTO complaints (user_id, complaint_text) VALUES ($user_id, '$complaint_text')";
    mysqli_query($conn, $query);

    echo "Complaint submitted successfully!";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Submit Complaint</h1>
        <form action="complaint.php" method="post">
            <label for="complaint_text">Complaint:</label>
            <textarea id="complaint_text" name="complaint_text" rows="4" required></textarea>
            <br>
            <input type="submit" name="submit_complaint" value="Submit Complaint">
        </form>
        <a href="admin.php">View All Complaints</a>
    </div>
</body>
</html>
