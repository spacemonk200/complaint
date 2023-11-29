<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}

$query = "SELECT * FROM complaints";
$result = mysqli_query($conn, $query);

$complaints = [];
while ($row = mysqli_fetch_assoc($result)) {
    $complaints[] = $row;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Complaints</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin - View Complaints</h1>
        <?php foreach ($complaints as $complaint): ?>
            <div class="complaint">
                <p>User ID: <?php echo $complaint['user_id']; ?></p>
                <p>Complaint: <?php echo $complaint['complaint_text']; ?></p>
                <p>Timestamp: <?php echo $complaint['timestamp']; ?></p>
            </div>
        <?php endforeach; ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
