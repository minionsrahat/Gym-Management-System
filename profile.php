<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card-text {
            color: black;
        }
    </style>
</head>

<body>


    <?php
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
    ?>

    <section class="profile">
        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-md-10 mx-auto p-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="mb-4">My Profile</h3>
                            <hr>
                            <p class="card-text">First Name: <?php echo $row['fname'] ?></p>
                            <p class="card-text">Last Name: <?php echo $row['lame'] ?></p>
                            <p class="card-text">Username: <?php echo $row['username'] ?></p>
                            <p class="card-text">Phone: <?php echo $row['phone_num'] ?></p>
                            <p class="card-text">Address: <?php echo $row['address'] ?></p>
                            <h3 class="mt-2">Membership Information</h3>
                            <hr>
                            <?php
                            $query = "SELECT members.member_id as id,members.joining_date as startdate,members.end_of_membership as enddate,membershiptype.type_name as type FROM members,membershiptype WHERE members.membership_id=membershiptype.membership_id and members.user_id=$uid";
                            $result = $con->query($query);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                            ?>
                                <p class="card-text mr-2">Membership Status:<span class="badge badge-success ml-2"> Active</span> </p>
                                <p class="card-text mr-2">Membership ID:<span class="badge badge-success ml-2">AKP10<?php echo $row['id'] ?></span> </p>

                                <p class="card-text">Package Name:<?php echo $row['type'] ?></p>
                                <p class="card-text">Membership Start Date: <?php echo $row['startdate'] ?></p>
                                <p class="card-text">Membership Expire Date: <?php echo $row['enddate'] ?></p>
                            <?php
                            } else {
                            ?>
                                <p class="card-text mr-2">Membership Status:<span class="badge badge-danger ml-2">None</span> </p>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php
    include('php-layout-files/footer.php')
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>