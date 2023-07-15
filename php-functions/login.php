<?php
session_start();
$_SESSION['msg']=array(
'error'=>false,
'msg'=>'No Available msg'

);
include('db_connection.php');
include('php_query_functions.php');
if (isset($_POST['submit'])) {

    $email = $_POST['username'];
    $email = trim($email);
    $email = mysqli_real_escape_string($con, $email);
    $email = htmlentities($email, ENT_QUOTES, $encoding = 'UTF-8');

    $pass = $_POST['password'];
    $pass = trim($pass);
    $pass = mysqli_real_escape_string($con, $pass);
    $pass = htmlentities($pass, ENT_QUOTES, $encoding = 'UTF-8');


    $type=$_POST['type'];
    $type = trim($type);
    $type = mysqli_real_escape_string($con, $type);
    $type = htmlentities($type, ENT_QUOTES, $encoding = 'UTF-8');



    $condition = array(
        'username' => $email,
        'password' => $pass,
        'type'=>$type
    );
    $result=PullData($con,'users','*',$condition,'and');
    $nrows=mysqli_num_rows($result);
    if($nrows>0)
    {
        $result=mysqli_fetch_array($result);
        $name=$result['username'];
        $fname=$result['full_name'];
        $type=(int)$result['type'];
        $_SESSION['username']=$name;
        $_SESSION['type']=$type;
       
     
       
            header('location:../home-teacher.php');
        
      
    }
    else{
        $_SESSION['msg']['error'] = true;
        $_SESSION['msg'] ['msg']= 'Login failed: Invalid username or password.';
       
        header('location:../index.php');
    }


}



?>