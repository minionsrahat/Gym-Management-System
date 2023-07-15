<!doctype html>
<html lang="en">

<head>
    <title>Member Ship Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>



    </style>
</head>

<body>

    <?php
    session_start();
    include('php-layout-files/navbar.php')
    ?>



    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    $uid = $_SESSION['user_id'];
    $condition = array(
        'user_id' => $uid
    );
    $result = PullData($con, 'users', '*', $condition, 'and');

    $row = mysqli_fetch_array($result);

    $sql = "SELECT membershiptype.type_name as type_name, members.member_id as id, members.joining_date as jdate, members.end_of_membership as enddate FROM `members` ,membershiptype WHERE members.user_id='$uid' and members.membership_id=membershiptype.membership_id and membershiptype.user_id='$uid'";

    $row2 = $con->query($sql);
    if (mysqli_num_rows($row2) > 0) {
        $row2 = mysqli_fetch_array($row2);
        $status = true;
    } else {
        $status = false;
    }

    $sql = "SELECT instructors.name as name ,workoutplans.workout_time as stime ,workoutplans.workout_end_time as etime FROM `workoutplans`,instructors,membershiptype WHERE workoutplans.instructor_id=instructors.instructor_id and workoutplans.member_id=membershiptype.membership_id AND membershiptype.user_id='$uid'  order by workoutplans.plan_id DESC LIMIT 1";
    $row3 = $con->query($sql);
    if (mysqli_num_rows($row3) > 0) {
        $row3 = mysqli_fetch_array($row3);
        $plan = true;
    } else {
        $plan = false;
    }


    ?>

    <section class="about-us">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto p-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="mb-4">My Membership Status</h3>
                            <p class="card-text">Full Name: <?php echo $row['fname'] . " " . $row['lame']   ?></p>
                            <p class="card-text">Username: <?php echo $row['username'] ?></p>
                            <p class="card-text">Phone: <?php echo $row['phone_num'] ?></p>
                            <?php if ($status) {


                            ?>
                                <p class="card-text">Status:Member</p>
                                <p class="card-text">Member ID:AKTH<?php echo $row2['id'] ?></p>
                                <p class="card-text">Package Name: <?php echo $row2['type_name'] ?></p>
                                <p class="card-text">Joining Date: <?php echo $row2['jdate'] ?></p>
                                <p class="card-text">End Of Membership:<?php echo $row2['enddate'] ?></p>

                            <?php
                            } else {
                            ?>
                                <p class="card-text">Status:Not a Member</p>
                            <?php
                            }
                            ?>

                            <h3 class="mb-4">My Workout Plan</h3>
                            <?php if ($plan) {


                            ?>
                               
                                <p class="card-text">Trainer Name<?php echo $row3['name'] ?></p>
                                <p class="card-text">Workout Start time: <?php echo $row3['stime'] ?> am</p>
                                <p class="card-text">Workout end time: <?php echo $row3['etime'] ?> pm</p>
                               

                            <?php
                            } else {
                            ?>
                                <p class="card-text">No Current Workout Plan</p>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php include('php-layout-files/footer.php') ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>