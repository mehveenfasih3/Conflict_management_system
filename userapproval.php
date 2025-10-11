<?php
// Database connection
session_start();
require 'includes/dbconfig.inc.php';
 if(!$_SESSION['logged']){ 
      header("Location: login/login.php"); 
      exit; 
  }
// Get the logged-in user ID
$userid = $_SESSION['userid'];

// Handle Approve action
if (isset($_GET['approve'])) {
    $userid = intval($_GET['approve']);
    $sql = "UPDATE users SET approval = 1 WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->close();
   
       $allocatedAttempts = 1;
       $attemptsused=0;
    $allocatedDate = date('Y-m-d H:i:s', strtotime('+3 days')); // 3 days from now

    $conflicts = ['conflict 1', 'conflict 2', 'conflict 3'];
    $sqlInsert = "INSERT INTO attempts (userid, conflict, allocated_attempts, allocated_time,attempt_used) VALUES (?, ?, ?, ?,?)";
    $stmtInsert = $conn->prepare($sqlInsert);

    foreach ($conflicts as $conflict) {
        $stmtInsert->bind_param("isisi", $userid, $conflict, $allocatedAttempts, $allocatedDate,$attemptsused);
        $stmtInsert->execute();
    }
    $stmtInsert->close();
     header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle Reject action
if (isset($_GET['reject'])) {
    $userid = intval($_GET['reject']);
    $sql = "DELETE FROM users WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh page
    exit;
}

// Fetch users with approval = 0
$result = $conn->query("SELECT * FROM users WHERE approval = 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Users Approval</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background: #f3f4f6; padding: 40px; }
    .container { max-width: 1000px; margin: auto; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; color: #333; }
    table { width: 100%; border-collapse: collapse; }
    thead { background-color: #374151; color: #fff; }
    th, td { padding: 12px 15px; text-align: center; border-bottom: 1px solid #e5e7eb; }
    tbody tr:hover { background-color: #f9fafb; }
    .actions button { padding: 6px 12px; margin: 2px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; color: white; }
    .approve { background-color: #10b981; }
    .disapprove { background-color: #ef4444; }
    .back-btn { display: inline-block; padding: 6px 12px; background-color: #ccc; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 10px; text-decoration: none; color: black; }
    .back-btn:hover { background-color: #bbb; }
</style>
</head>
<body>
<a href="adminmain1.php" class="back-btn">← Back</a>
<div class="container">
    <h2>Users Approval</h2>
    <table>
        <thead>
            <tr>
                <th>SNo</th>
                <th>Name</th>
                <th>Email</th>
                <th>View1</th>
                <th>View2</th>
                <th>View3</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            $sno = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$sno}</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . (!empty($row['view1']) ? htmlspecialchars($row['view1']) : "-") . "</td>";
                echo "<td>" . (!empty($row['view2']) ? htmlspecialchars($row['view2']) : "-") . "</td>";
                echo "<td>" . (!empty($row['view3']) ? htmlspecialchars($row['view3']) : "-") . "</td>";
                echo "<td class='actions'>
                        <a href='?approve=" . $row['userid'] . "'><button class='approve'>Approve</button></a>
                        <a href='?reject=" . $row['userid'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\"><button class='disapprove'>Reject</button></a>
                      </td>";
                echo "</tr>";
                $sno++;
            }
        } else {
            echo "<tr><td colspan='7'>No pending approvals</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
