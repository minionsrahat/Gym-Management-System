<?php
include('../../php-functions/php_query_functions.php');
include('db_connection.php');

if (isset($_GET['id'])) {
    $pr_id = $_GET['id'];
    $sql = "SELECT u.fname as name ,u.user_id as uid ,p.pk_name as pk_name,p.cost as price ,p.pk_period as per FROM `packages_request` JOIN users as u join packages as p WHERE p.pk_id=packages_request.pk_id and packages_request.user_id=u.user_id and packages_request.req_id='$pr_id'";
    $retval = $con->query($sql);
    $result = mysqli_fetch_array($retval);
    $uid = $result['uid'];
    $name = $result['name'];
    $pk_name = $result['pk_name'];
    $period = $result['per'];
    $price = $result['price'];
    $date = date('Y-m-d H:i:s');
    $columns = array('membership_id', 'type_name', 'membership_period', 'amount', 'user_id', 'sign_up_date');
    $values = array(
        null, $pk_name, $period, $price, $uid, $date
    );
    $today = date("Y-m-d");
    $expr_date = date("Y-m-d", strtotime("+".$period." month", strtotime(date("Y/m/d"))));

    PushData($con, 'membershiptype', $columns, $values);
    $id = $con->insert_id;
    $columns = array('member_id', 'name', 'weight', 'joining_date', 'end_of_membership', 'membership_id', 'user_id', 'picture');
    $values = array(
        null, $name, '60', $today, $expr_date, $id, $uid, ''
    );
    PushData($con, 'members', $columns, $values);
    $condition=array(
        'req_id'=>$pr_id
    );
    delete_cell($con,'packages_request',$condition,'');
    echo $con->error;
    header('location:add-member.php');
}
