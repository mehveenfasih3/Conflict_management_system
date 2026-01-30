<?php
session_start();
require 'includes/dbconfig.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['userid'])){
    die("User not logged in");
}

$userid = $_SESSION['userid'];
$conflict = $_POST['conflict'];
$requested_attempt = $_POST['requested_attempt'];

// Check if record already exists
$check = "SELECT id FROM attempts WHERE userid=? AND conflict=?";
$stmt = $conn->prepare($check);

if(!$stmt){
    die("Prepare failed (CHECK): " . $conn->error);
}

$stmt->bind_param("is", $userid, $conflict);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){

    // UPDATE existing row
    $update = "UPDATE attempts 
               SET requested_attempt=? 
               WHERE userid=? AND conflict=?";

    $stmt2 = $conn->prepare($update);

    if(!$stmt2){
        die("Prepare failed (UPDATE): " . $conn->error);
    }

    $stmt2->bind_param("iis", $requested_attempt, $userid, $conflict);
    $stmt2->execute();

}else{

    // INSERT new row
    $insert = "INSERT INTO attempts
        (userid, conflict, allocated_attempts, allocated_time, attempt_used, requested_attempt) 
        VALUES (?, ?, 0, NOW(), 0, ?)";

    $stmt2 = $conn->prepare($insert);

    if(!$stmt2){
        die("Prepare failed (INSERT): " . $conn->error);
    }

    $stmt2->bind_param("isi", $userid, $conflict, $requested_attempt);
    $stmt2->execute();
}

echo "<script>
alert('Request submitted successfully');
window.location.href='indexmain.php';
</script>";

$conn->close();
?>
