<?php
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
if (isset($_REQUEST['id'])) {
  userDelete($con);
}


if (isset($_REQUEST['pakid'])) {
  packageDelete($con);
}

if (isset($_REQUEST['product_id'])) {
  productDelete($con);
}

if (isset($_REQUEST['trinid'])) {
  trinarDelete($con);
}
if (isset($_REQUEST['workout_id'])) {
  workoutplandelete($con);
}

if (isset($_REQUEST['notice_id'])) {
  noticedelete($con);
}
if (isset($_REQUEST['plan_id'])) {
  workoutscheduledelete($con);
}
function workoutscheduledelete($con)
{
  $plan_id=$_REQUEST['plan_id'];
  $schedule_id=$_REQUEST['schedule_id'];
  $condition = array('plan_id' => $plan_id);
  delete_cell($con, 'workoutplans', $condition, '');
  $query="UPDATE `workout_schedule` SET `status`=0 WHERE  id=$schedule_id";
  $result=$con->query($query);
  
  header('location: workout-schedule-list.php');
}
function noticedelete($con)
{
  $notice_id = $_REQUEST['notice_id'];
  $condition = array('notice_id' => $notice_id);
  delete_cell($con, 'notices', $condition, '');


  header('location: notice-list.php');
}


function workoutplandelete($con)
{

  $pk_id = $_REQUEST['workout_id'];
  $condition = array('id' => $pk_id);
  delete_cell($con, 'workout_schedule', $condition, '');


  header('location: workout-list.php');
}


function userDelete($con)
{
  $user_id = $_REQUEST['id'];
  $condition = array('user_id' => $user_id);
  delete_cell($con, 'users', $condition, '');


  header('location: user-list.php');
}

function packageDelete($con)
{
  $package_id = $_REQUEST['pakid'];
  $condition = array('pk_id' => $package_id);
  delete_cell($con, 'packages', $condition, '');


  header('location: package-list.php');
  

  if (!$retval) {
    die('Could not get data: ' . mysql_error());
  }

  header('location: package-list.php');
}

function productDelete($con)
{
  $product_id = $_REQUEST['product_id'];
  $condition = array('product_id' => $product_id);
  delete_cell($con, 'products', $condition, '');


  header('location: product-list.php');
}


function trinarDelete($con)
{
  $trainer_id = $_REQUEST['trinid'];
  $condition = array(
    'instructor_id' => $trainer_id
  );
  delete_cell($con, 'instructors', $condition, '');
  header('location: trainer-list.php');
}
