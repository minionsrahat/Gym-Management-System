<?php //require('dashboard/function.php');  

/*
  if ($logged_in_user['user_type'] == 'admin') {

    $_SESSION['user'] = $logged_in_user;
    $_SESSION['success']  = "You are now logged in";
    header('location: dashboard.php');      
  }else{
    $_SESSION['user'] = $logged_in_user;
    $_SESSION['success']  = "You are now logged in";

    header('location: dashboard/login.php');
  }*/



?>



<?php 
session_start();

if(!isset($_SESSION['username'])){

	header("location: dashboard/login.php");
}
else {
  	
  	header("location: dashboard/login.php");

}
?>
