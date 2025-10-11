<?php
require 'includes/dbconfig.inc.php';

if (isset($_POST['userid'], $_POST['view'], $_POST['conflictValue'])) {
    $userid = $_POST['userid'];
    $view = $_POST['view'];
    $conflictValue = $_POST['conflictValue'];

    $stmt = $conn->prepare("UPDATE users SET $view = ? WHERE userid = ?");
    $stmt->bind_param("si", $conflictValue, $userid);
    $stmt->execute();
    $stmt->close();
    echo "success";
}
$conn->close();
?>
