<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #4285f4;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <h2>Admin Page</h2>

    <?php
    include('db.php');

    // Fetch all complaints
    $sql = "SELECT * FROM complaints";
    $result = $conn->query($sql);

    if ($result !== false) {
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Complaint ID</th>
                    <th>Student ID</th>
                    <th>Complaint</th>
                    <th>Status</th>
                    <th>Created At</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['complaint_text'] . "</td>";

                // Check if the keys exist before accessing them
                echo "<td>" . (isset($row['status']) ? $row['status'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['created_at']) ? $row['created_at'] : 'N/A') . "</td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No complaints found.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Logout button -->
    <a href="logout.php">Logout</a>
</body>
</html>
