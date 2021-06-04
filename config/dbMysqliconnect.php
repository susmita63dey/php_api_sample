<?php
//these are the server details
//the username is root by default in case of xampp
//password is nothing by default
//and lastly we have the database named android. if your database name is different you have to change it 
//$servername = "web-11.znetlive.in";
$servername = "192.169.227.103";
$username = "debajit_diaguide";
$password = '5$w1nj1E';
$database = "diaguide_godaddy";
 $port = 3306;  


//creating a new connection object using mysqli 
$conn = new mysqli($servername, $username, $password, $database,$port);

//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

