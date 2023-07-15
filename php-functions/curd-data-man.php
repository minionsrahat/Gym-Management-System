<?php
include('db_connection.php');
include('php_query_functions.php');
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'fetch-pk-data') {
    $response = array(
        'pk_name' => 'Basic'
    );
    $condition = array(
        'pk_id' => $_POST['id']
    );
    $result = PullData($con, 'packages', 'pk_name', $condition, '');
    $row = mysqli_fetch_array($result);
    $response['pk_name'] = $row['pk_name'];

    echo json_encode($response);
}
if (isset($_POST['action']) && $_POST['action'] == 'enroll') {
    $id = $_POST['id'];
    $columns = array('plan_id', 'member_id', 'schdule_id');
    // $uid = $_SESSION['user_id'];
    $uid=$_SESSION['user_id'];
    $condition = array(
        'user_id' =>$uid
    );
    $result = PullData($con, 'members', '*', $condition, '');
    $result=mysqli_fetch_array($result);
    $memid=$result['member_id'];
    $values=array(null,$memid,$id);
    PushData($con,'workoutplans',$columns,$values);
    $query="UPDATE `workout_schedule` SET `status`=1 WHERE id='$id'";
    $result=$con->query($query);
    

}
if (isset($_POST['action']) && $_POST['action'] == 'buy-product') {
    $id = $_POST['id'];
    echo "HELLO";
    unset($_SESSION["cart"]);

}