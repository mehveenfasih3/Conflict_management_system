<?php
session_start();
require 'includes/dbconfig.inc.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conflict_type = $_POST['conflict_type'] ?? '';
    $colorfeed = $_POST['colorfeed'] ?? '';
    $value = $_POST['value'] ?? '';
    $text_feed = $_POST['text_feed'] ?? '';
    $user_id = $_POST['user_id'] ?? null;

    echo $conflict_type . "<br>";  // Debug
    echo $user_id . "<br>";         // Debug

    if (!$user_id) {
        echo "No user ID found.";
        exit;
    }

    // Replace 'details' with your actual table name if different
    $stmt = $conn->prepare("INSERT INTO details (conflict_type, colorfeed, value, text_feed, userid) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ssssi", $conflict_type, $colorfeed, $value, $text_feed, $user_id);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "DB Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
