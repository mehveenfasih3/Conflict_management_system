<?php
require 'includes/dbconfig.inc.php';

if (isset($_POST['userid'], $_POST['view'])) {
    $userid = $_POST['userid'];
    $view = $_POST['view'];

    $stmt = $conn->prepare("UPDATE users SET $view = NULL WHERE userid = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->close();
    echo "deleted";
}
$conn->close();
?>
