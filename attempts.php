<?php
require 'includes/dbconfig.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']);

    // Increment attempt by 1 for this user
    $sql = "UPDATE details SET attempt = attempt + 1 WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "Attempt incremented successfully.";
    } else {
        echo "Error updating attempt: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
