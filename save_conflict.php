<?php
session_start();
require 'includes/dbconfig.inc.php';

// Check if user is logged in
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: login/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get userid from session instead of form
    $userid = $_SESSION['userid'];
    
    
    // Sanitize input
    $conflict_type = mysqli_real_escape_string($conn, $_POST['conflict_type']);

    $sql = "INSERT INTO modselect (userid, conflict_type) VALUES ('$userid', '$conflict_type')";

    if (mysqli_query($conn, $sql)) {
        echo "Conflict saved successfully.";
    } else {
        http_response_code(500);
        echo "Error saving conflict: " . mysqli_error($conn);
    }
}
?>
