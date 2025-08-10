<?php
require '../includes/dbconfig.inc.php';

$check="DESCRIBE users";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
    
    $email = mysqli_real_escape_string ($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn , $_POST['pass']);
  //  $view =$_POST['view'];
    
    //storind the data in your database
    $sql="select * from users where email= '$email' AND password='$pass'";
   
   // $sql2 = "select view from users where email ='$email'";

    
    $query = mysqli_query($conn,$sql);
   // $query2 = mysqli_query($conn,$sql2);
   
while ($row = mysqli_fetch_assoc($query)) {
    session_start();
    $user_id = $row['userid'];
    $usertype = $row['reason'];
    $approval = $row['approval'];
    // $view = $row['view']; // Assuming this exists in the fetched data.

    $_SESSION['logged'] = TRUE;
}
echo $user_id;
echo $usertype;
echo $approval;
if ($usertype == 'user' && $approval == '1') {
    $_SESSION['userid'] = $user_id;

    // Redirect with name and id in the query string
    header("Location: ../indexmain.php");
    exit();
}
       
        else if($usertype == 'admin'){

            header( "Location: ../adminmain1.php");
            
        }

    
        else{

        echo"Login Unsucessfull. Please verify your details.  ";
        }


    }
}

?>

<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">


    <div id="login-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 align="center">LOGIN</h2>
                </div>

                <div class="form-group">
                
                </div>
                <br>
                <br>


                <?php
                if (isset($errMSG)) {
                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
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
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group" style= margin-left:22em;>
                   <a href="forgotPass.php" type="text" class=""
                       name="btn-login">Forgot Password?</a>
                       <div>
                </div>
                </div>
                <div>

                <div class="form-group">
                    <hr width="50%" />
                </div>

                <div class="row justify-content-center">
                <div class="form-group col-5">
                    <button type="submit" class="btn btn-block btn-primary" name="submit">Login</button>
                </div>
                </div>

                <div class="form-group ">
                    <hr width="50%"/>
                </div>

                <div class="row justify-content-center">
                <div class="form-group col-6">
                <a href="forgotPass.php" type="text" class=""
                       name="btn-login">Not a registered user?</a>

                       <br>
                    <a href="register.php" type="button"  class="btn btn-block btn-secondary"
                       name="btn-login">Register</a>
                </div>
                </div>

              

            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>


</html>