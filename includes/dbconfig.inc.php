<?php

$dbhost = "achbe001.mysql.guardedhost.com";
$dbuser = "achbe001_conflict";
$dbpass = "Ttdm73dtC$5a";
$dbname = "achbe001_conflict";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); 

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>