<?php
session_start();
require 'includes/dbconfig.inc.php';

// Get logged in user ID (fallback to 18 for testing)
$userid = $_SESSION['userid'] ?? 18;

// SQL query to fetch counts for red, green, yellow for "conflict 1"
$sql = "
    SELECT
        u.name,
        SUM(CASE WHEN d.colorfeed = 'red' THEN 1 ELSE 0 END) AS red_count,
        SUM(CASE WHEN d.colorfeed = 'green' THEN 1 ELSE 0 END) AS green_count,
        SUM(CASE WHEN d.colorfeed = 'yellow' THEN 1 ELSE 0 END) AS yellow_count
    FROM details d
    JOIN users u ON d.userid = u.userid
    WHERE d.userid = ?
      AND d.conflict_type = 'conflict 1'
    GROUP BY u.name
";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

$stmt->close();
$conn->close();

// Default values if no data found
$name = $userData['name'] ?? 'Unknown';
$redCount = $userData['red_count'] ?? 0;
$yellowCount = $userData['yellow_count'] ?? 0;
$greenCount = $userData['green_count'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conflict Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://tse1.mm.bing.net/th/id/OIP.Aj_BcrA3jnToAhUx7cYr_AHaEK?rs=1&pid=ImgDetMain&o=7&rm=3') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .review-page {
            text-align: center;
        }
        .attempts {
            margin-top: 20px;
        }
        .attempts ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .attempts li {
            display: inline-block;
            margin: 0 10px;
        }
        .red {
            color: #fff;
            background-color: #ff0000;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .yellow {
            color: #000;
            background-color: #ffff00;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .green {
            color: #fff;
            background-color: #00cc00;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .approve {
            background-color: grey;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .view-link {
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .view-link:hover {
            text-decoration: none;
            color: white;
        }
         .back-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            text-decoration: none;
            color: black;
        }
        .back-btn:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <a href="admin_userdetails.php" class="back-btn">← Back</a>
    <div class="container">
        <div class="header">
            <h2>Conflict Management System</h2>
            <p>Name: <?= htmlspecialchars($name); ?></p>
            <button class="approve">
                <a href="userdetails3.php" class="view-link">View</a>
            </button>
        </div>
        <div class="review-page">
            <h3>Review Page</h3>
            <p>No. of Attempts Allocated: 5</p>
            <p>Attempts Remaining: 1</p>
            <div class="attempts">
                <ul>
                    <li><span class="red"><?= $redCount; ?></span></li>
                    <li><span class="yellow"><?= $yellowCount; ?></span></li>
                    <li><span class="green"><?= $greenCount; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
