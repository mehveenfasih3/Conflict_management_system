<?php
session_start();
require 'includes/dbconfig.inc.php';

// Important: No whitespace before this line
header('Content-Type: application/json');

$userid = isset($_POST['userid']) ? intval($_POST['userid']) : 0;
$conflict = isset($_POST['conflictType']) ? $_POST['conflictType'] : '';

if ($userid <= 0 || empty($conflict)) {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

if (!isset($_SESSION['userid']) || $_SESSION['userid'] !== $userid) {
     http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Fetch current attempts
$sql = "SELECT allocated_attempts FROM attempts WHERE userid = ? AND conflict = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}
$stmt->bind_param("is", $userid, $conflict);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $allocated_attempts = (int)$row['allocated_attempts'];

    if ($allocated_attempts > 0) {
        // Decrement attempts
        $updateSql = "UPDATE attempts SET allocated_attempts = allocated_attempts - 1 WHERE userid = ? AND conflict = ?";
        $updateStmt = $conn->prepare($updateSql);
        if (!$updateStmt) {
            echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
            exit;
        }
        $updateStmt->bind_param("is", $userid, $conflict);
        $updateStmt->execute();

        // Re-fetch updated attempts count
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $new_attempts = $row ? (int)$row['allocated_attempts'] : 0;

        echo json_encode(['success' => true, 'allocated_attempts' => $new_attempts]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No attempts left']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No record found']);
}
exit;
