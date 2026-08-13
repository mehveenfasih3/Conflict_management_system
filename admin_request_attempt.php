<?php
session_start();
require 'includes/dbconfig.inc.php';

if (!$_SESSION['logged']) {
  header("Location: login/login.php");
  exit;
}

$message = null;
$message_type = null;

// Handle approve/reject/update actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $attempt_id = (int)($_POST['attempt_id'] ?? 0);

    if ($action === 'approve') {
        $requested = max(0, (int)($_POST['requested_attempt'] ?? 0));

        $sql = "UPDATE attempts 
                SET allocated_attempts = allocated_attempts + ?, 
                    requested_attempt = 0 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $requested, $attempt_id);

        if ($stmt->execute()) {
            $message = "Request approved successfully! Added {$requested} attempt(s).";
            $message_type = "success";
        } else {
            $message = "Error approving request: " . $conn->error;
            $message_type = "error";
        }
        $stmt->close();

    } elseif ($action === 'reject') {
        $sql = "UPDATE attempts SET requested_attempt = 0 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $attempt_id);

        if ($stmt->execute()) {
            $message = "Request rejected successfully!";
            $message_type = "success";
        } else {
            $message = "Error rejecting request: " . $conn->error;
            $message_type = "error";
        }
        $stmt->close();

    } elseif ($action === 'update_requested') {
        $requested = max(0, (int)($_POST['requested_attempt'] ?? 0));
        $sql = "UPDATE attempts SET requested_attempt = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $requested, $attempt_id);

        if ($stmt->execute()) {
            $message = "Requested attempts updated to {$requested}.";
            $message_type = "success";
        } else {
            $message = "Error updating requested attempts: " . $conn->error;
            $message_type = "error";
        }
        $stmt->close();
    }
}

// Fetch all records where requested_attempt > 0
$sql = "SELECT a.id, a.userid, a.conflict, a.allocated_attempts, a.attempt_used, 
               a.requested_attempt, u.name 
        FROM attempts a 
        INNER JOIN users u ON a.userid = u.userid 
        WHERE a.requested_attempt > 0 
        ORDER BY a.id ASC";

$result = $conn->query($sql);
$rows = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Attempts - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: bold;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .btn.approve {
            background-color: #4CAF50;
            color: white;
        }

        .btn.approve:hover {
            background-color: #45a049;
        }

        .btn.reject {
            background-color: #f44336;
            color: white;
        }

        .btn.reject:hover {
            background-color: #da190b;
        }

        .btn.back {
            background-color: #2196F3;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn.back:hover {
            background-color: #0b7dda;
        }

        .action-wrap {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .no-records {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 16px;
        }

        .stepper {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff8e1;
            border: 1px solid #ffc107;
            border-radius: 20px;
            padding: 4px 8px;
        }

        .stepper button {
            width: 26px;
            height: 26px;
            border: none;
            border-radius: 50%;
            background: #ffc107;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .stepper button:hover {
            background: #ffb300;
        }

        .stepper input {
            width: 48px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: bold;
            font-size: 14px;
            color: #000;
        }

        .stepper input:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="btn back" onclick="window.location.href='adminmain1.php'">← Back</button>
        
        <h1>Requested Attempts</h1>
        <p class="subtitle">Review and manage user requests for additional attempts</p>

        <?php if ($message): ?>
            <div class="message <?php echo htmlspecialchars($message_type); ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <?php if (count($rows) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Conflict Name</th>
                        <th>Current Attempts</th>
                        <th>Used Attempts</th>
                        <th>Requested Attempts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['conflict']); ?></td>
                            <td><?php echo htmlspecialchars($row['allocated_attempts']); ?></td>
                            <td><?php echo htmlspecialchars($row['attempt_used']); ?></td>
                            <td>
                                <div class="stepper">
                                    <button type="button" onclick="adjustRequested(<?php echo (int)$row['id']; ?>, -1)">−</button>
                                    <input
                                        type="number"
                                        id="req-input-<?php echo (int)$row['id']; ?>"
                                        value="<?php echo (int)$row['requested_attempt']; ?>"
                                        min="0"
                                    >
                                    <button type="button" onclick="adjustRequested(<?php echo (int)$row['id']; ?>, 1)">+</button>
                                </div>
                            </td>
                            <td>
                                <div class="action-wrap">
                                    <form method="POST" style="display: inline;" id="approve-form-<?php echo (int)$row['id']; ?>">
                                        <input type="hidden" name="attempt_id" value="<?php echo (int)$row['id']; ?>">
                                        <input type="hidden" name="requested_attempt" id="approve-req-<?php echo (int)$row['id']; ?>" value="<?php echo (int)$row['requested_attempt']; ?>">
                                        <button type="submit" name="action" value="approve" class="btn approve"
                                                onclick="return submitApprove(<?php echo (int)$row['id']; ?>)">
                                            Approve
                                        </button>
                                        <button type="submit" name="action" value="reject" class="btn reject"
                                                onclick="return confirm('Reject this request? The requested attempts will be reset to 0.')">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-records">
                <p>No pending requests found.</p>
                <p style="margin-top: 10px; font-size: 14px;">All attempt requests have been processed.</p>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function adjustRequested(id, delta) {
            const input = document.getElementById('req-input-' + id);
            let val = parseInt(input.value, 10) || 0;
            val = Math.max(0, val + delta);
            input.value = val;

            const approveHidden = document.getElementById('approve-req-' + id);
            if (approveHidden) approveHidden.value = val;
        }

        function submitApprove(id) {
            const input = document.getElementById('req-input-' + id);
            const val = parseInt(input.value, 10) || 0;
            document.getElementById('approve-req-' + id).value = val;
            return confirm('Approve this request? This will add ' + val + ' attempt(s) to the current allocation.');
        }

        document.querySelectorAll('[id^="req-input-"]').forEach(function (input) {
            input.addEventListener('input', function () {
                const id = this.id.replace('req-input-', '');
                const approveHidden = document.getElementById('approve-req-' + id);
                if (approveHidden) {
                    approveHidden.value = Math.max(0, parseInt(this.value, 10) || 0);
                }
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
