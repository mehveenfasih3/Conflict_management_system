<?php

 //$conn = mysqli_connect("achbe001.mysql.guardedhost.com", "achbe001_conflict", "Ttdm73dtC$5a", "achbe001_conflict");
 
 require 'dbconfig.inc.php';

$test=$_POST['test'];

$option = $_POST['option'];

if($option == 'Accept')
{
    $query = "update users set approval ='1' where email='$test'"; 


    $sql = "Select * from users " ;
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
        {
            $user = $row['name'];
            //  echo $user;
        }

require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");
require("../PHPMailer/src/Exception.php");

define("PROJECT_HOME","http://localhost/www/login/");

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'emuemms@gmail.com';      // SMTP username   emuemms@gmail.com
$mail->Password = 'Sohail12';               // SMTP password   Sohail12
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('emuemms@gmail.com', 'ConflictManagement');
$mail->addReplyTo('emuemms@gmail.com', 'ConflictManagement');
$mail->addAddress($test);   // Add a recipient
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<div>" . $user .",<br><br><p>You have been approved.Please click the link to login<br><a href='" . PROJECT_HOME . "login.php?name=" . $user . "'>" . PROJECT_HOME . "login.php?name=" . $user. "</a><br><br></p>Regards,<br> Admin.</div>";


$mail->Subject = 'Registration Confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email confirmation sent.';
}

}



else{
    $query = "update users set approval ='0' where email='$test'"; 
}

$result = mysqli_query($conn,$query);
?>


