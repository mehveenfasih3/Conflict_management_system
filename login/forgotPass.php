
<html>
<head>
    <title>Forgot Credentials</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
<h1 align="center">Forgot Password?</h1>

	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	   <div class="container" style="margin-top:150px;">
   
   <div class="row">
    <div class="col-sm"> </div>
    <div class="col-sm">
    <div class="card  text-center" style="width: 20rem;align:center;">
    <div class="card-body" >
      <div style="font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
    margin:10px;
    font-size : 14px;
    color:#C64934;"></div>
     
      <form>
             <table>
          <tr><td>
		<div><label for="email">Please enter your email id below</label></div>
		<div><input class="form-control input-sm" name="user-email" id="user-email" class="input-field" width=40rem></div>
	</div></td></tr>
          <tr><td align="center"><br/>
		  <div class="form-group">
		<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	</div>	
          </td></tr>
        </table>  
      </form>
</div>
</div>

    </div>
    <div class="col-sm"></div>
  </div>
    
  
</div>


</body>
</html>


<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("localhost", "root", "", "conflict");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " username = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from users " . $condition;
		$result = mysqli_query($conn,$sql);
     //   $user = mysqli_fetch_array($result);
        
        while($row=mysqli_fetch_assoc($result))
    {
		$user = $row['name'];
		$email = $row['email'];
        //  echo $user;
    }
		
		if(!empty($user)) {

require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");
require("../PHPMailer/src/Exception.php");

define("PROJECT_HOME","http://localhost/www/login/");

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'emuemms@gmail.com';          // SMTP username
$mail->Password = 'Sohail12'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('emuemms@gmail.com', 'Yashaswi');
$mail->addReplyTo('emuemms@gmail.com', 'Yashaswi');
$mail->addAddress($email);   // Add a recipient
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<div>" . $user . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "reset-password.php?name=" . $user . "'>" . PROJECT_HOME . "reset-password.php?name=" . $user. "</a><br><br></p>Regards,<br> Admin.</div>";
$mail->Subject = 'Reset Password';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent. Please check your email';
}
		} else {
			$error_message = 'No User Found';
		}
	}
?>


<?php


?>