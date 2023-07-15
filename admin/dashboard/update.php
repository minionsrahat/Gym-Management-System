<?php
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
    if (isset($_POST['update_admin'])) {
      adminUpdate();
    }

    function adminUpdate(){

         $admin_id=$_POST['admin_id'];
         $admin_name= $_POST['admin_name']; 
         $admin_email= $_POST['admin_email'];
         $admin_contact= $_POST['admin_contact'];
         $admin_oldgpic= $_POST['admin_oldgpic'];
        //die();
        $c_image= $_FILES['admin_picture']['name'];
        $c_image_temp=$_FILES['admin_picture']['tmp_name'];

        if($c_image_temp != "")
        {
            move_uploaded_file($c_image_temp , "../images/$c_image");
            $sql ="update admin set admin_name='$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' , admin_picture= '$c_image'  where admin_id='$admin_id'";  

            unlink("../images/$admin_oldgpic"); 
        }else
        {
          //echo "dd"; die();
           // $sql ="update admin set admin_name='$admin_name', admin_email='$admin_email', where admin_id='$admin_id'";

            $sql = "UPDATE admin SET admin_name= '$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' WHERE admin_id = '$admin_id' ";
        }

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: profile.php'); 

    }
    if (isset($_POST['btn_add'])) {
      changePassword();
    }

    function changePassword(){

         $admin_id=$_POST['admin_id'];
         $admin_name= $_POST['admin_name']; 
         $admin_email= $_POST['admin_email'];
         $admin_contact= $_POST['admin_contact'];
        //die();

            $sql = "UPDATE admin SET admin_name= '$admin_name', admin_email= '$admin_email', admin_contact = '$admin_contact' WHERE admin_id = '$admin_id' ";
        

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: profile.php'); 
    }

  
    if (isset($_POST['add_trainer'])) {
      addTrainer();
    }


    if (isset($_POST['instructor_btn'])) {
      updateTrainer($con);
    }

    function updatePackage(){
         $package_id=$_POST['package_id'];
         $package_name= $_POST['package_name']; 
         $package_price= $_POST['package_price'];
         $package_validity= $_POST['package_validity'];
        //die();

            $sql = "UPDATE package SET package_name= '$package_name', package_price= '$package_price', package_validity = '$package_validity' WHERE package_id = '$package_id' ";
        

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: package-list.php'); 

    }

if (isset($_POST['btn_tupdate'])) {
      updateTrainer();
    }

    function updateTrainer($con){
      $id=$_POST['ins_id'];
      $trainer_fname    =  $_POST['trainer_fname'];
      $trainer_email    =  $_POST['trainer_email'];
      $trainer_contact    =  $_POST['trainer_contact'];
    
      $trainer_address    =  $_POST['trainer_address'];
      $columns=array( 'name', 'contact', 'address', 'email');
      $values=array('name'=>$trainer_fname,
      'contact'=>$trainer_contact,
     'address'=> $trainer_address,
     'email'=>$trainer_email);
     $condition=array(
       'instructor_id'=>$id
     );
    
     update_table($con,'instructors',$columns,$values,$condition,'');
      header('location: trainer-list.php');
  
      

    }
     if (isset($_POST['btn_time'])) {
      updateTime();
    }

    function updateTime(){
         $timeslote_id=$_POST['timeslote_id'];
         $timeslote_time= $_POST['timeslote_time']; 
         
        //die();

            $sql = "UPDATE timeslote SET timeslote_time= '$timeslote_time' WHERE timeslote_id = '$timeslote_id' ";
        

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: timeslote-list.php'); 

    }
  

  if (isset($_POST['btn_uupdate'])) {
      updateUser();
    }

    function updateUser(){
         $insData = $_POST;
         //$user_id =  $insData['user_id'];
          $new =   array_splice($insData, 0, 1); // user id
          $array = \array_diff($insData, [""], ["12"]); // hole array
          //$first_color = unset($insData["user_id"]); 
         $user_id = $new['user_id'];
        //print_r($_POST);
       print_r($array);
       //die();
         $user_id=$_POST['user_id'];
         $user_fname= $_POST['user_fname']; 
         $user_lname= $_POST['user_lname'];
         $user_email= $_POST['user_email'];
         $user_contact= $_POST['user_contact'];
         $user_aadhar= $_POST['user_aadhar'];
         $user_dob= $_POST['user_dob'];
         $user_gender   = $_POST['user_gender'];
         $user_timeslote   = $_POST['user_timeslote'];
         $user_trainer   = $_POST['user_trainer'];
         $user_package   = $_POST['user_package'];
         $user_address   = $_POST['user_address'];
         $user_udate = 'fff';
        //die();

            $columns = implode(", ",array_keys($array));
            $escaped_values = array_map('mysql_real_escape_string', array_values($array));
            $values  = implode("','", $escaped_values);
      
            //$sql = "UPDATE users SET ($columns) VALUES ('$values')  WHERE user_id = '$user_id' ";


           $sql = "UPDATE users SET user_fname='$user_fname',user_lname='$user_lname',user_email='$user_email',user_gender='$user_gender',user_contact='$user_contact',user_aadhar='$user_aadhar',user_timeslote='$user_timeslote',user_trainer='$user_trainer',user_address='$user_address',user_dob='$user_dob',user_udate='$user_udate',user_package='$user_package' WHERE user_id = '$user_id'";
        

             require_once 'db.php';
             $retval = mysqli_query($conn, $sql);
              

             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
             }       // get id of the created user
  
           header('location: user-list.php'); 

    }
?>