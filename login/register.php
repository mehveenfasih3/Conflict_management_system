<?php
require '../includes/dbconfig.inc.php';

$check="DESCRIBE users";
if(mysqli_query($conn,$check)){
if (isset($_POST['submit'])) {

    // Fetch and sanitize inputs
    $fname = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];  // hash it!
    $reason = trim($_POST['reason']);
    $position = $_POST['dropdown'];
    $company = trim($_POST['company']);
    
    $selectedViews = isset($_POST['views']) ? $_POST['views'] : [];

    $view1 = '';
    $view2 = '';
    $view3 = '';

    foreach ($selectedViews as $view) {
        if ($view === 'conflict1' && $view1 === '') {
            $view1 = 'conflict1';
        } elseif ($view === 'conflict2' && $view2 === '') {
            $view2 = 'conflict2';
        } elseif ($view === 'conflict3' && $view3 === '') {
            $view3 = 'conflict3';
        }
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $user_type = 'user';
    $approval = '0';

    $sql = "INSERT INTO users 
            (name, email, password, view1, view2, view3, user_type, approval, reason, position, company) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param(
        "sssssssssss",
        $fname,
        $email,
        $pass,
        $view1,
        $view2,
        $view3,
        $user_type,
        $approval,
        $reason,
        $position,
        $company
    );

    if ($stmt->execute()) {
        // Success message + redirect
        echo "Your registration has been submitted. Redirecting...";

        // You may want to use output buffering or avoid echo before header for redirect
        header("Refresh:3; url=../index.html");

        // Sending mail
        require("../PHPMailer/src/PHPMailer.php");
        require("../PHPMailer/src/SMTP.php");
        require("../PHPMailer/src/Exception.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'emuemms@gmail.com';
        $mail->Password = 'Sohail12';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('emuemms@gmail.com', 'ConflictManagement');
        $mail->addReplyTo('emuemms@gmail.com', 'ConflictManagement');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $bodyContent = "<div>" . htmlspecialchars($fname) . ",<br><br><p>You will be sent an email confirmation once you have been approved by the admin.<br><br><br></p>Regards,<br> Admin.</div>";

        $mail->Subject = 'Registration Confirmation';
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Please check your email for confirmation.';
        }

    } else {
        echo "Insert not successful: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}
}
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
          
                
               <label class="checkbox-inline control-label">
  <input type="checkbox" name="views[]" value="conflict1" style="margin-left: 1em"> Conflict 1
</label>

<label class="checkbox-inline control-label">
  <input type="checkbox" name="views[]" value="conflict2" style="margin-left:1.2em"> Conflict 2
</label>

<label class="checkbox-inline control-label">
  <input type="checkbox" name="views[]" value="conflict3" style="margin-left:1.3em"> Conflict 3
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