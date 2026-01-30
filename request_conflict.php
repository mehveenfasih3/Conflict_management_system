<?php
session_start();
require 'includes/dbconfig.inc.php';

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$userid = $_SESSION['userid'];
$conflict = $_POST['conflict'] ?? '';
$attempts = (int)($_POST['attempts'] ?? 0);

// Validate input
if (empty($conflict) || $attempts <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid input. Please select both conflict and attempts.']);
    exit;
}

// Check if request already exists
$checkSql = "SELECT id, requested_attempt FROM attempts WHERE userid = ? AND conflict = ?";
$checkStmt = $conn->prepare($checkSql);

if ($checkStmt === false) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

$checkStmt->bind_param("is", $userid, $conflict);
$checkStmt->execute();
$result = $checkStmt->get_result();

if ($result->num_rows > 0) {
    // Update existing request
    $row = $result->fetch_assoc();
    $newRequested = $row['requested_attempt'] + $attempts;
    
    $updateSql = "UPDATE attempts SET requested_attempt = ? WHERE userid = ? AND conflict = ?";
    $updateStmt = $conn->prepare($updateSql);
    
    if ($updateStmt === false) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        $checkStmt->close();
        exit;
    }
    
    $updateStmt->bind_param("iis", $newRequested, $userid, $conflict);
    
    if ($updateStmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Request updated successfully! Total requested: ' . $newRequested . ' attempts'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update request']);
    }
    $updateStmt->close();
} else {
    // Insert new request
    $insertSql = "INSERT INTO attempts (userid, conflict, allocated_attempts, allocated_time, attempt_used, requested_attempt, created_at) 
                  VALUES (?, ?, 0, NULL, 0, ?, NOW())";
    $insertStmt = $conn->prepare($insertSql);
    
    if ($insertStmt === false) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
        $checkStmt->close();
        exit;
    }
    
    $insertStmt->bind_param("isi", $userid, $conflict, $attempts);
    
    if ($insertStmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Request submitted successfully! Requested: ' . $attempts . ' attempts. Wait for admin approval.'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to submit request']);
    }
    $insertStmt->close();
}

$checkStmt->close();
$conn->close();
?>