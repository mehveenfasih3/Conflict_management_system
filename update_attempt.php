<?php
session_start();
require 'includes/dbconfig.inc.php';

// Check if user is logged in
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: login/login.php");
    exit;
}

$userid = $_SESSION['userid'];
$conflict = $_GET['conflict'] ?? '';

if (empty($conflict)) {
    header("Location: main.php");
    exit;
}

// Update attempt_used (increment by 1) only if user has remaining attempts
$sql = "UPDATE attempts 
        SET attempt_used = attempt_used + 1 
        WHERE userid = ? 
        AND conflict = ? 
        AND (allocated_attempts - attempt_used) > 0";
        
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param("is", $userid, $conflict);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Successfully updated, redirect to conflict page
    $stmt->close();
    $conn->close();
    
    switch($conflict) {
        case 'conflict1':
            header("Location: conflictmain.php?id=" . $userid);
            break;
        case 'conflict2':
            header("Location: conflict2.php?id=" . $userid);
            break;
        case 'conflict3':
            header("Location: conflict3.php?id=" . $userid);
            break;
        default:
            header("Location: main.php");
    }
} else {
    // No attempts left or error
    $stmt->close();
    $conn->close();
    echo "<script>alert('No attempts remaining or access denied!'); window.location.href='main.php';</script>";
}
exit;
?>