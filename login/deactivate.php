
<?php
  session_start(); 
  if(!$_SESSION['logged']){ 
      header("Location:login.php"); 
      exit; 
  }
?>

<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<h1>Conflict Management Admin page </h1>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="admin.php">Activate</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="deactivate.php">Deactivate</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
</ul>
</nav>


</body> 

</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conflict";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check="DESCRIBE users";

if(mysqli_query($conn,$check)){

    $query = "select * from users where approval='1'"; 
   
     $result = mysqli_query($conn,$query);

     echo "<table border=1 id='AdminTable'>"; 
     echo '<tr><th>Name</th><th>Email</th><th>View</th><th>Company</th><th>Reason</th><th>Deactivate</th></tr>' ;

     while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results

       // echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td></tr>";  //$row['index'] the index here is a field name
        
        echo '<tr>';
        echo '<td>' .$row['name']. '</td>';
        echo '<td>' .$row['email']. '</td>';
        echo '<td>' .$row['view']. '</td>';
        echo '<td>' .$row['company']. '</td>';
        echo '<td>' .$row['reason']. '</td>';
        echo '<td><Input type = "CheckBox" Name ="accept" class="get_value" value= "Deactivate"></td>';
       
       
        
    }
      
        echo "</table>"; //Close the table in HTML
        
        echo '<Input type = "button" name ="Submit" id="submit" value="Submit" onClick=GetSelected()>';
}

?>

<style>
#AdminTable{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#AdminTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0B6FA4;;
  color: white;
  font-weight: bold;
}
#AdminTable td, #AdminTable th {
  border: 1px solid #ddd;
  padding: 8px;

 
}

#AdminTable tr:nth-child(even) {
  background: #D0E4F5;
}

#submit{
background-color: #0B6FA4;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  
  font-size: 16px;
  margin: 2em 40em;
  cursor: pointer;
}

#logout
{
  background-color: #0B6FA4;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: right;

  font-size: 16px;
  margin: 0em 85em;
  margin-top: -2em;
  margin-bottom: 2em;
  cursor: pointer;
}
a{
  color: white;
  text-decoration: none;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    function GetSelected() {
        //Reference the Table.
        var grid = document.getElementById("AdminTable");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("Input");
        var email = [];
        var check = [];
        
 
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
             
                var row = checkBoxes[i].parentNode.parentNode;
                email[i] = row.cells[1].innerHTML;
                check[i] = checkBoxes[i].value ;  
                 
                //alert(check);

                $.post("delete.php",
                 {
                    test:email[i],
                    option: check[i],
                    
                },
                
                function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
                });
               
            }
            
        }

        
        
        }
</script>
