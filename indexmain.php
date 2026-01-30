<?php
session_start();
require 'includes/dbconfig.inc.php';

// Check if user is logged in
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: login/login.php");
    exit;
}

$userid = $_SESSION['userid'];
$name = $_GET['name'] ?? 'User';

// Optional redirect if not logged in
if (!$userid) {
    echo "<script>alert('User not found. Please login.'); window.location.href = 'login/login.php';</script>";
    exit();
}
$sql = "SELECT view1, view2, view3 FROM users WHERE userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$permissions = $result->fetch_assoc();

$view1 = $permissions['view1'] ?? '';
$view2 = $permissions['view2'] ?? '';
$view3 = $permissions['view3'] ?? '';


$attemptData = [];

// get attempts for this user
$sql = "SELECT conflict, allocated_attempts, attempt_used 
        FROM attempts 
        WHERE userid = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $attemptData[$row['conflict']] = $row;
}

$stmt->close();
$conn->close();




?>

<!DOCTYPE html>
<head>
    <title>Conflict Management</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">


    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body>
    <div class="main-container">
        <nav class="main-nav">
            <div id="logo" class="left"><a href="#">Conflict Management</a></div>
            <ul class="nav right center-text">
                <!-- <li class="btn"><a href="login/login.php">Login</a></li>
                <li class="btn"><a href="login/register.php">Register</a></li> -->
                <li class="btn"><a href="index.html">Home</a></li>
                <li class="btn"><a href="background.html">Conflict Basics</a></li>
                <li class="btn"><a href="login/login.php">Logout</a></li>
              

            </ul>
            <header style="float: left;margin-left: 22px;">
             <!--- <h1 class="" >Conflicts</h1> -->
                <h2 class="" >Here is the case study that discuss conflict in order to learn Conflict Management. </h2>
         
            <br><br><br> <button id="requestBtn" class="request-btn"> Request for New Attempts </button>
    <div id="requestForm" class="modal">

    <div class="modal-content">

        <!-- LEFT IMAGE -->
        <div class="modal-image">
            <img src="data:image/jpeg;base64,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" alt="Conflict Image">
        </div>

        <!-- RIGHT FORM -->
        <div class="modal-form">

          

            <form method="POST" action="request_attempt.php">

                <label>Choose Conflict</label>
                <select name="conflict" required>
                    <option value="">-- Select --</option>
                    <option value="conflict 1">Conflict 1</option>
                    <option value="conflict 2">Conflict 2</option>
                    <option value="conflict 3">Conflict 3</option>
                </select>

                <label>Requested Attempts</label>
                <input type="number" name="requested_attempt" min="1" required>

                <div class="btn-group">
                    <button type="submit" class="submit-btn">Submit</button>
                    <button type="button" id="closeBtn" class="cancel-btn">Cancel</button>
                </div>

            </form>

        </div>

    </div>
</div>
   </header>
        </nav>
       

        <div class="content-container">            
            <div>
                <div id="portfolio-content" class="center-text">
                    <div class="portfolio-group">
                        <a class="portfolio-item">


                            <video autoplay="1" class="header-video" id="first_video" preload="1" controls="controls">
                                <source src="videos/main/movs/RCI01.mp4" width="320" height="240" autoplay>
                            </video>


                            <div class="detail">

                                <h3>Conflict 1</h3>
                                <p>Conflict with the manager. Click on view to ask questions and to resolve the conflict</p>




                            </div>


                        </a>



                    </div>
                    
                    <div class="portfolio-group">
                        <a class="portfolio-item">
                            <video class="header-video" id="second_video" preload="1" controls="controls">
                                <source src="videos/main/movs/RCI02.mp4" width="320" height="240" autoplay>
                            </video>

                            <div class="detail">
                                <h3>Conflict 2</h3>
                                <p>Conflict between two employees. Click on view to ask questions and to resolve the conflict</p>

                            </div>
                        </a>				
                    </div>
                    <div class="portfolio-group">
                        <a class="portfolio-item">
                            <video class="header-video" id="third_video" preload="1" controls="controls">
                                <source src="videos/main/movs/RCI03.mp4" width="320" height="240" autoplay>
                            </video>
                           

                            <div class="detail">
                                <h3>Conflict 3</h3>
                                <p>Conflict between three employees. Click on view to ask questions and to resolve the conflict</p>		

                            </div>
                        </a>				
                    </div>
                   
                    <div class="portfolio-group">
                        <a class="portfolio-item ">
                            
                            <video id="fourth_video" width="320" height="240" controls="controls">
                                <source src="videos/main/movs/RCI04.mp4"  type="video/mp4">
                            </video>
                       
                            <div class="detail">
                                <h3>Conflict 4</h3>
                                <p>Conflict with the boss. Click on view to ask questions and to resolve the conflict</p>

                        
                        </a>				
                    </div>
                </div>
                
<!-- 
                    <nav class="main-nav">

                        <ul class="nav right center-text">
                            <li class="btn"><a href="conflictmain.php ">Conflict b/w managers</a></li>

                        </ul>
                    </nav>

                    <nav class="main-nav">
                        <ul class="nav right center-text">
                            <li class="btn"><a href="conflict2.php">Conflict b/w coworkers</a></li>
                        </ul>
                    </nav>

                    <nav class="main-nav">
                        <ul class="nav right center-text">
                            <li class="btn"><a href="conflict3.php">Conflict b/w peers</a></li>
                        </ul>
                    </nav>
                    

                    <nav class="main-nav">
                        <ul class="nav right center-text">
                              <li class="btn" ><a >Message from the CEO</a></li>
                         
                         <button onclick="playVid()" class="videobutton" type="button">Message from the CEO</button> -->
                          
                        <!-- </ul>
                    </nav> --> 
                    <!-- Keep nav layout and add onclick JavaScript -->
<nav class="main-nav">
    <ul class="nav right center-text">
        <li class="btn">
            <?php if ($view1 === 'conflict1') { ?>
                <a href="conflictmain.php?id=<?php echo $userid; ?>" 
                   onclick="saveConflict(event, 'Conflict 1', 'conflictmain.php?id=<?php echo $userid; ?>')">
                   Conflict b/w managers
                </a>
              
                <label>
                     <?php
$c1 = $attemptData['conflict 1'] ?? null;
if($c1){
    $remaining = $c1['allocated_attempts'] - $c1['attempt_used'];
    echo "<div class='attempt-badge'>
            Remaining: $remaining / {$c1['allocated_attempts']}
          </div>";
}
?>
                </label>
            <?php } else { ?>
                <span class="disabled">Conflict b/w managers</span>
            <?php } ?>
        </li>
    </ul>
</nav>

<nav class="main-nav">
    <ul class="nav right center-text">
        <li class="btn">
            <?php if ($view2 === 'conflict2') { ?>
                <a href="conflict2.php?id=<?php echo $userid; ?>" 
                   onclick="saveConflict(event, 'Conflict 2', 'conflict2.php?id=<?php echo $userid; ?>')">
                   Conflict b/w coworkers
                </a>
                <label><?php
$c2 = $attemptData['conflict 2'] ?? null;
if($c2){
    $remaining = $c2['allocated_attempts'] - $c2['attempt_used'];
    echo "<div class='attempt-badge'>
            Remaining: $remaining / {$c2['allocated_attempts']}
          </div>";
}
?>
</label>
            <?php } else { ?>
                <span class="disabled">Conflict b/w coworkers</span>
            <?php } ?>
        </li>
    </ul>
</nav>

<nav class="main-nav">
    <ul class="nav right center-text">
        <li class="btn">
            <?php if ($view3 === 'conflict3') { ?>
                <a href="conflict3.php?id=<?php echo $userid; ?>" 
                   onclick="saveConflict(event, 'Conflict 3', 'conflict3.php?id=<?php echo $userid; ?>')">
                   Conflict b/w peers
                </a>
                <label class="attempt-badge">
                    <?php
$c3 = $attemptData['conflict 3'] ?? null;
if($c3){
    $remaining = $c3['allocated_attempts'] - $c3['attempt_used'];
    echo "<div class='attempt-badge'>
            Remaining: $remaining / {$c3['allocated_attempts']}
          </div>";
}
?>

</label>
            <?php } else { ?>
                <span class="disabled">Conflict b/w peers</span>
            <?php } ?>
        </li>
    </ul>
</nav>

<nav class="main-nav">
    <ul class="nav right center-text">
        <li class="btn">
            <a href="#" onclick="saveConflict(event, 'Conflict 4', '')">
               Message from the CEO
            </a>
        </li>
    </ul>
</nav>

<style>
 .request-btn{ background:grey; color:white; border:none; padding:12px 25px; font-size:16px; border-radius:5px; cursor:pointer; } .request-btn:hover{ background:#1a252f; } /* Overlay */ #overlay{ display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(232, 227, 227, 0.5); z-index:99; } /* Modal */ .modal{ display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:25px; width:350px; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.3); z-index:100; animation: pop .3s ease; } @keyframes pop{ from{transform:translate(-50%,-60%);opacity:0;} to{transform:translate(-50%,-50%);opacity:1;} } .modal h3{ text-align:center; margin-bottom:15px; } .modal label{ display:block; margin-top:10px; font-weight:bold; } .modal select, .modal input{ width:100%; padding:8px; margin-top:5px; border:1px solid #ccc; border-radius:5px; } .btn-group{ margin-top:20px; display:flex; justify-content:space-between; } .submit-btn{ background:#27ae60; color:white; border:none; padding:10px 18px; border-radius:5px; cursor:pointer; } .cancel-btn{ background:#c0392b; color:white; border:none; padding:10px 18px; border-radius:5px; cursor:pointer; } .submit-btn:hover{background:#1e8449;} .cancel-btn:hover{background:#922b21;} 
.modal{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    background:white;
    width:600px;   /* bigger for image */
    border-radius:12px;
    box-shadow:0 0 25px rgba(235, 225, 225, 0.3);
    z-index:100;
    animation: pop .3s ease;
    overflow:hidden;
}

.modal-content{
    display:flex;
}

/* LEFT IMAGE */
.modal-image{
    width:45%;
    background:#f2f2f2;
}

.modal-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

/* RIGHT FORM */
.modal-form{
    width:45%;
    padding:20px;
    box-sizing:border-box;
}

.modal-form h3{

    margin-bottom:5px;
}

.modal-form label{

    margin-top:50px;
    font-weight:bold;
}

.modal-form select,
.modal-form input{
    width:100%;
    padding:2px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
}

@keyframes pop{
    from{transform:translate(-50%,-60%);opacity:0;}
    to{transform:translate(-50%,-50%);opacity:1;}
}

.attempt-badge {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    padding: 5px 10px; /* Some padding */
    border-radius: 5px; /* Rounded corners */
    font-size: 14px; /* Font size */
    margin-left: 10px; /* Space between link and badge */
}
    .disabled {
        color: gray;
        cursor: not-allowed;
        text-decoration: none;
    }
</style>


                    <!--<div class="portfolio-group">
                    <a href="conflict1.html">View Conflict 1</a>
                    </div>
                    
                    <div class="portfolio-group">
                    <a href="conflict2.html">View Conflict 2</a>
                    </div>
                    
                    <div class="portfolio-group">
                    <a href="conflict3.html">View conflict 3</a>
                    </div>
                    
                    <div class="portfolio-group">
                    <a href="conflict4.html">View conflict 4</a>
                    </div>-->


                </div>
            </div>
        </div>

        <footer>
            <p>Copyright 2018-19 &copy;</p>
        </footer>
    </div>
</div>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="js/templatemo_script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//alert('hi');

    $('#first_video').bind('ended', function() {
        $('#second_video')[0].play();
    });

    $('#second_video').bind('ended', function() {
        $('#third_video')[0].play();
    });

    $('#third_video').bind('ended', function() {
        $('#fourth_video')[0].play();
    });
    
     $('#fourth_video').bind('ended', function() {
        //$('#first_video')[0].play();
    });

    });

</script>	
<script>
function saveConflict(event, conflictType, redirectUrl) {
    event.preventDefault();

    fetch('save_conflict.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `conflict_type=${encodeURIComponent(conflictType)}`
    })
    .then(response => {
        if (!response.ok) throw new Error('Network error');
        return response.text();
    })
    .then(data => {
        console.log('Saved:', data);
        if (redirectUrl) {
            window.location.href = redirectUrl;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to save conflict.');
    });
}


</script>

<script type="text/javascript">
    $(function() {
        $('.pagination li').click(changePage);
        $('.portfolio-item').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });

   
document.getElementById("requestBtn").onclick = function(){
    document.getElementById("requestForm").style.display = "block";
};


const btn = document.getElementById("requestBtn");
const form = document.getElementById("requestForm");
const overlay = document.getElementById("overlay");
const closeBtn = document.getElementById("closeBtn");

btn.onclick = () => {
    form.style.display = "block";
    overlay.style.display = "block";
}

closeBtn.onclick = closeModal;
overlay.onclick = closeModal;

function closeModal(){
    form.style.display = "none";
    overlay.style.display = "none";
}



</script>	

</body>
</html>
