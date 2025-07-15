<?php
require 'dbconfig.inc.php';


echo $password;
// Check connection

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check="DESCRIBE users";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL


    $fname= $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $view = $_POST['view'];
    $reason = $_POST['reason'];
    $position = $_POST['dropdown'];
    $company =  $_POST['company'];
    
    //storing the data in your database
    $sql="INSERT into users(
        name, email, password, view,user_type,approval,reason, position,company) 
        values ('$fname', '$email', '$pass', '$view','user','0','$reason','$position','$company')";



if(mysqli_query($conn,$sql))
{
   

    echo "Your add has been submited, you will be redirected to your account page in 3 seconds";

    header( "Refresh:3; url=../index.html", true, 303);

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
$mail->addAddress($email);   // Add a recipient
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<div>" . $user .",<br><br><p>You will be sent an email confirmation once you hav been approved by the admin<br><br><br></p>Regards,<br> Admin.</div>";


$mail->Subject = 'Registration Confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Please check your email for confirmation.';
}

}
else{
    echo "Insert not successfull.";
    //  header( "Refresh:5; url=conflictmain.php", true, 303);
}
 
 
    }
    
    }
    



if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
      $secret = '6Le3070UAAAAAI-QCCX5sSX9T4j_1j0Pp7aPuapB';
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);
      if($responseData->success)
      {
          $succMsg = 'Your contact request have submitted successfully.';
      }
      else
      {
          $errMsg = 'Robot verification failed, please try again.';
      }
 }

$conn->close();
?>

 
<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>
    <link href="register.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src='https://www.google.com/recaptcha/api.js' async defer >   </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <script>
        window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
   };
    </script>    

<div class="container">

    <div id="login-form">
        <form method="post" autocomplete="off"  onsubmit="return checkForm(this);">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 align="center">Register you account here</h2>
                </div>
                <br>

                <div class="form-group">
                
                </div>

                <?php
                if (isset($errMSG)) {
                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                 <div class="row justify-content-center">
                 <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="fname" class="form-control" style="width:10px;" placeholder="First name" required/>
                    </div>
                </div>
            </div>
                 

                <div class="row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
            </div>

                <div class="row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password"
                               required/>
                    </div>
                </div>
            </div>


                <div class="row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="reason" class="form-control" placeholder="Reason for using the site" required/>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
         
            <label for="select_1" style=margin-left:-1em;>Choose your curren position     <br></label>
                        <select class="form-control" id="select_1" name="dropdown" style=width:18em;>
                        <option value="Null"selected>Click Here</option>
                         <option value="K12"> Instructor K12</option>
                         <option value="Higher Ed"> Instructor Higher Ed</option>
                         <option value="Undergraduate"> Undergraduate Student</option>
                         <option value="Graduate"> Graduate Student</option>
                         <option  value="Other"> Other</option>
                   
           </select>

            </div>

            <br>

                <div class="row justify-content-center">
                <div class="form-group col-md-6 ">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="company" class="form-control" placeholder="Company Name/School Name" required/>
                    </div>
                </div>
            </div>
            

            <div class="row justify-content-center" style=width:61em;>
               <h6 align="left">Select your view         </h6></label>
          
                
                <label class="radio-inline control-label">
                <input type="radio" value="conflict1" name="view" required style="margin-left: 1em"> Conflict 1
                </label>

                <label class="radio-inline control-label">

                <input type="radio" value="conflict2" name="view" style="margin-left:1.2em"> Conflict 2
                </label>

                <label class="radio-inline control-label">

                <input type="radio" value="conflict3" name="view" style="margin-left:1.3em"> Conflict 3
                </label>
            </div>


            <div class="row justify-content-center">
           <div class="g-recaptcha" data-sitekey="6Le3070UAAAAAIK1fdITvCL-4KxXFM-HkpN_4j3e"></div>
           <div>
            </div> 
            </div>


            <div class="row justify-content-center" style=margin:2em;width:78em;margin-left:-7em;>
            <div class="col-5">
                <button type="submit" class="btn    btn-block btn-primary" name="submit" id="submit">Register</button>
             </div>
            </div>

            <div class="form-group">
                 <hr/>
            </div>

            
        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>