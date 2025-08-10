<?php
session_start();
require 'includes/dbconfig.inc.php';
$userid = $_GET['userid'] ?? 18;  // Example: dashboard.php?userid=5

// Fetch user info
$sql = "SELECT name, email FROM users WHERE userid = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['name'] ?? 'Unknown';
$email = $user['email'] ?? 'Not Available';

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('https://tse1.mm.bing.net/th/id/OIP.Aj_BcrA3jnToAhUx7cYr_AHaEK?rs=1&pid=ImgDetMain&o=7&rm=3') no-repeat center center fixed;
      background-size: cover;
      color: black;
    }

    .dashboard {
      max-width: 800px;
      margin: 60px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      text-align: center;
      color: black;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #111;
    }

    .user-info {
      font-size: 18px;
      margin-bottom: 25px;
    }

    .user-info p {
      margin: 5px 0;
    }

    .conflict-image img {
      width: 100%;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      margin: 25px 0;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 14px 24px;
      border-radius: 30px;
      border: none;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .approve {
      background-color: #007bff;
    }

    .approve:hover {
      box-shadow: 0 0 12px #007bff;
    }

    .reject {
      background-color: #fd7e14;
    }

    .reject:hover {
      box-shadow: 0 0 12px #fd7e14;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Welcome to Admin Dashboard</h1>
     <div class="user-info">
      <p><strong>User Name:</strong> <?php echo htmlspecialchars($name); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>

    <div class="conflict-image">
      <img src="https://tse4.mm.bing.net/th/id/OIP.dGIcdWcKbYnaOAH3-4bvZwAAAA?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Conflict Management">
    </div>

   <div class="actions">
    <button class="btn approve" onclick="window.location.href='userapproval.php'">
        User Registration Approval
    </button>
    <button class="btn reject" onclick="window.location.href='admin_userdetails.php'">
        User Detail
    </button>
</div>
  </div>
</body>
</html>
