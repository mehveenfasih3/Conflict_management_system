<?php
session_start();
require 'includes/dbconfig.inc.php';

header('Content-Type: application/json');

if (!isset($_SESSION['logged']) || !$_SESSION['logged']) {
    echo json_encode(['success' => false, 'message' => 'Not authorized']);
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$userid = (int)($_POST['userid'] ?? $_GET['userid'] ?? 0);
$conflict = trim($_POST['conflict'] ?? $_GET['conflict'] ?? '');

if ($userid <= 0 || $conflict === '') {
    echo json_encode(['success' => false, 'message' => 'Invalid userid or conflict']);
    exit;
}

if ($action === 'get') {
    $sql = "SELECT a.id, a.allocated_attempts, a.attempt_used, a.requested_attempt, u.name
            FROM attempts a
            INNER JOIN users u ON a.userid = u.userid
            WHERE a.userid = ? AND a.conflict = ?
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $userid, $conflict);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            'success' => true,
            'exists' => true,
            'id' => (int)$row['id'],
            'name' => $row['name'],
            'conflict' => $conflict,
            'allocated_attempts' => (int)$row['allocated_attempts'],
            'attempt_used' => (int)$row['attempt_used'],
            'requested_attempt' => (int)$row['requested_attempt']
        ]);
    } else {
        // No attempts row yet — still return user name
        $nameSql = "SELECT name FROM users WHERE userid = ? LIMIT 1";
        $nameStmt = $conn->prepare($nameSql);
        $nameStmt->bind_param("i", $userid);
        $nameStmt->execute();
        $nameResult = $nameStmt->get_result();
        $nameRow = $nameResult->fetch_assoc();
        $nameStmt->close();

        echo json_encode([
            'success' => true,
            'exists' => false,
            'id' => 0,
            'name' => $nameRow['name'] ?? 'Unknown',
            'conflict' => $conflict,
            'allocated_attempts' => 0,
            'attempt_used' => 0,
            'requested_attempt' => 0
        ]);
    }

    $stmt->close();
    $conn->close();
    exit;
}

if ($action === 'set') {
    $allocated = max(0, (int)($_POST['allocated_attempts'] ?? 0));

    $check = $conn->prepare("SELECT id FROM attempts WHERE userid = ? AND conflict = ? LIMIT 1");
    $check->bind_param("is", $userid, $conflict);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        $id = (int)$row['id'];
        $update = $conn->prepare("UPDATE attempts SET allocated_attempts = ? WHERE id = ?");
        $update->bind_param("ii", $allocated, $id);
        $ok = $update->execute();
        $update->close();
    } else {
        $insert = $conn->prepare(
            "INSERT INTO attempts (userid, conflict, allocated_attempts, allocated_time, attempt_used, requested_attempt)
             VALUES (?, ?, ?, NOW(), 0, 0)"
        );
        $insert->bind_param("isi", $userid, $conflict, $allocated);
        $ok = $insert->execute();
        $insert->close();
    }
    $check->close();

    if ($ok) {
        echo json_encode(['success' => true, 'message' => 'Attempts updated', 'allocated_attempts' => $allocated]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update attempts']);
    }

    $conn->close();
    exit;
}

if ($action === 'add') {
    $amount = max(0, (int)($_POST['add_amount'] ?? 0));

    $check = $conn->prepare("SELECT id, allocated_attempts FROM attempts WHERE userid = ? AND conflict = ? LIMIT 1");
    $check->bind_param("is", $userid, $conflict);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        $id = (int)$row['id'];
        $newVal = (int)$row['allocated_attempts'] + $amount;
        $update = $conn->prepare("UPDATE attempts SET allocated_attempts = ? WHERE id = ?");
        $update->bind_param("ii", $newVal, $id);
        $ok = $update->execute();
        $update->close();
    } else {
        $newVal = $amount;
        $insert = $conn->prepare(
            "INSERT INTO attempts (userid, conflict, allocated_attempts, allocated_time, attempt_used, requested_attempt)
             VALUES (?, ?, ?, NOW(), 0, 0)"
        );
        $insert->bind_param("isi", $userid, $conflict, $newVal);
        $ok = $insert->execute();
        $insert->close();
    }
    $check->close();

    if ($ok) {
        echo json_encode(['success' => true, 'message' => 'Attempts added', 'allocated_attempts' => $newVal]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add attempts']);
    }

    $conn->close();
    exit;
}

echo json_encode(['success' => false, 'message' => 'Unknown action']);
$conn->close();
?>
