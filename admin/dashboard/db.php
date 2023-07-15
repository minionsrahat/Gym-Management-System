<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
//$db_name  = "fitness_club"; // Database name 

// Connect to server and select databse.
//$conn = mysqli_connect($host, $username, $password);
$conn=mysqli_connect("localhost", "root", "", "gym_management");

//mysql_select_db("fitness_club");

//mysql_select_db('fitness_club');
// Check connection
if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>