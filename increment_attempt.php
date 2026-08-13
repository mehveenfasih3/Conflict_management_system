<?php
session_start();
require 'includes/dbconfig.inc.php';

// Check if user is logged in
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$userid = $_SESSION['userid'];
$conflict = $_POST['conflict'] ?? '';

if (empty($conflict)) {
    echo json_encode(['success' => false, 'message' => 'No conflict specified']);
    exit;
}

// Check if user has remaining attempts
$check_sql = "SELECT allocated_attempts, attempt_used 
              FROM attempts 
              WHERE userid = ? AND conflict = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("is", $userid, $conflict);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $remaining = $row['allocated_attempts'] - $row['attempt_used'];
    
    if ($remaining > 0) {
        // Increment attempt_used
        $update_sql = "UPDATE attempts 
                      SET attempt_used = attempt_used + 1 
                      WHERE userid = ? AND conflict = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("is", $userid, $conflict);
        
        if ($update_stmt->execute()) {
            echo json_encode([
                'success' => true, 
                'message' => 'Attempt recorded',
                'remaining' => $remaining - 1
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update']);
        }
        $update_stmt->close();
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'No remaining attempts for this conflict'
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Conflict not found']);
}

$stmt->close();
$conn->close();
?>