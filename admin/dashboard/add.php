<?php
//require_once 'db.php';
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
//connect_to_database();
// call the register() function if register_btn is clicked
$errors = array();
if (isset($_POST['product_btn'])) {
  productRegister($con);
}

if (isset($_POST['pk_btn_add'])) {
  addPackage($con);
}
if (isset($_POST['btn_time'])) {
  addTimeslote();
}
if (isset($_POST['add_trainer'])) {
  addTrainer($con);
}
if (isset($_POST['add_workout_plan'])) {
  addworkoutplan($con);
}
if (isset($_POST['add_notice'])) {
  addnotice($con);
}

function addnotice($con)
{
  $notice_title=$_POST['notice_title'];
  $notice_content=$_POST['notice_content'];
  $date = date('Y-m-d H:i:s');
  $columns=array('notice_id', 'notice_title', 'notice_content', 'date');
  $values=array(null,$notice_title, $notice_content,$date);
  PushData($con,'notices',$columns,$values);
  header('location: notice-list.php');
}


function productRegister($con)
{


  $title = $_POST['title'];
  $des = $_POST['des'];
  $price = $_POST['price'];
  $expfrom = $_POST['expfrom'];
  $tproduct = $_POST['tproduct'];
  $extention = array('png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG');
  echo var_dump($_FILES['picture']);
  if (isset($_FILES['picture'])) {
    $pic = upload_file('picture', $extention, '../../images');

    echo $pic['msg'];
  }
  $columns = array('product_id', 'product_name', 'product_des', 'product_pic', 'exported_from', 'num_avl_product', 'price');
  $values = array(null, $title, $des, $pic['file_name'], $expfrom, $tproduct, $price);
  PushData($con, 'products', $columns, $values);





  // //$conn=mysqli_connect("localhost", "root", "", "fitness_club");
  // $retval = mysqli_query($conn, $sql);

  header('location: product-list.php');
}

function addworkoutplan($con)
{
  $trainer_id=$_POST['trainer_id'];
  $schedule_id=$_POST['schedule_id'];
  $columns=array('id', 'instructor_id', 'status', 'time');
  $values=array(null,$trainer_id,0,$schedule_id);
  PushData($con,'workout_schedule',$columns,$values);
  header('location: add-workout-plan.php');
}
function addPackage($con)
{
  date_default_timezone_set("Asia/Kolkata");
  $package_name    =  $_POST['package_name'];
  $package_price    =  $_POST['package_price'];
  $package_validity    =  $_POST['package_period'];
  $package_cdate =              date("m/d/yy");
  $columns = array('pk_id', 'pk_name', 'pk_period', 'cost');
  $values = array(null, $package_name, $package_validity, $package_price);
  PushData($con, 'packages', $columns, $values);
  header('location: package-list.php');
}

function addTimeslote()
{
  date_default_timezone_set("Asia/Kolkata");
  $timeslote_time    =  $_POST['timeslote_time'];
  $timeslote_cdate =              date("m/d/Y");
  require_once 'db.php';
  $sql = "INSERT INTO timeslote(timeslote_time,timeslote_cdate) VALUES ('$timeslote_time', '$timeslote_cdate');";
  $retval = mysqli_query($conn, $sql);

  if (!$retval) {
    die('Could not get data: ' . mysql_error());
  }

  header('location: timeslote-list.php');
}

function addTrainer($con)
{

  $trainer_fname    =  $_POST['trainer_fname'];
  $trainer_email    =  $_POST['trainer_email'];
  $trainer_contact    =  $_POST['trainer_contact'];

  $trainer_address    =  $_POST['trainer_address'];
  $columns=array('instructor_id', 'name', 'contact', 'address', 'email');
  $values=array(null,$trainer_fname,$trainer_contact,$trainer_address,$trainer_email);
  PushData($con,'instructors',$columns,$values);

  header('location: trainer-list.php');
}
