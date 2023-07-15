<?php
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
if(isset($_POST['product_edit']))
{
  edit_product($con);
}



    if (isset($_POST['update_admin'])) {
      adminUpdate();
    }

    function edit_product($con)
    {
      $id=$_POST['product_id'];
      $title=$_POST['title'];
      $des = $_POST['des'];
      $price =$_POST['price'];
      $expfrom =$_POST['expfrom'];
      $tproduct=$_POST['tproduct'];
      $extention=array('png','jpeg','jpg','PNG','JPEG','JPG');
      echo var_dump($_FILES['picture']);
      if(isset($_FILES['picture']))
      {
        $pic=upload_file('picture',$extention,'../../images');

        echo $pic['msg'];
    
      }
      $columns=array( 'product_name', 'product_des', 'product_pic', 'exported_from', 'num_avl_product', 'price');
      $values=array(
        'product_name'=>$title,
        'product_des'=> $des,
        'product_pic'=> $pic['file_name'],
        'exported_from'=>$expfrom,
        'num_avl_product'=>$tproduct,
        'price'=> $price);
        $condition=array(
          'product_id'=>$id
        );
        update_table($con,'products',$columns,$values,$condition,'');
        
        header('location: product-list.php');        
          
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

    if (isset($_POST['btn_time'])) {
      addTimeslote();
    }
    if (isset($_POST['add_trainer'])) {
      addTrainer();
    }
  
?>