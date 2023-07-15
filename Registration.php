<?php

    session_start();
    // include('php-layout-files/navbar.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Fitness&Sport-Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            width: 270px !important;
            border-radius: 20px !important;
        }
        .card-title {
            font-size: 20px;
        }

        .card-text {
            font-size: 20px;
            color: #da1f1f !important;
            font-weight: bolder;
        }

        .padding {
            padding: 0 40px !important;
        }

       
        .reg-form .fa {
            color: black !important;
            font-size: 24px !important;
        }

        .reg-form .input-group-prepend span {
            width: 45px !important;
            text-align: center;
        }

        .reg-form .heading {
            font-size: 25px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .reg-form .top-bottom {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .reg-form .top-bottom .first-part {
            width: 200px;
            border-bottom: 3px solid black;
        }

        .reg-form .top-bottom .second-part {
            width: 50px;
            border-bottom: 4px solid #4d90db;

        }

        .reg-form .top-bottom .third-part {
            width: 200px;
            border-bottom: 3px solid black;
        }

        .reg-form .divider {
            width: 200px;
            border-bottom: 3px solid black;
        }

        .col-md-7 {
            border-radius: 10px;
        }
    </style>

</head>

<body>

<?php

    // session_start();
    include('php-layout-files/navbar.php');
?>

    <?php
    $error = array(
        'error' => False,
        'msg' => ''
    );

    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $cn_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $phonenum = $_POST['phone'];
        $date=$_POST['date'];
        // echo $fname;
        // echo $lname;
        // echo $password;
        // echo $gender;
        // echo $address;
        // echo $email;
        // echo $phonenum;
        // echo $date;
        $columns = array('user_id', 'fname', 'lame', 'gender', 'birth_date', 'username', 'password', 'address', 'phone_num');
        if (!preg_match("/^(?:\+88|01)?(?:\d{11}|\d{13})$/", $phonenum)) {
            $error['error'] = True;
            $error['msg'] = "Invalid Phone Number";
            // echo "error"
        }
        if ($password != $cn_password) {
            $error['error'] = True;
            $error['msg'] = "Invalid Password Match";
        }

        if ($error['error'] == false) {
            $values = array(null, $fname, $lname, $gender, $date, $email, $password, $address, $phonenum);
            // echo "done";
            PushData($con, 'users', $columns, $values);
            $id = $con->insert_id;
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $fname;
            $_SESSION['mail'] = $email;
            $_SESSION['gender'] = $gender;
            echo '<script> location.replace("index.php"); </script>';
        }
    }

    ?>



    <div class="container my-5">
        <?php
        if ($error['error']) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php
                        echo $error['msg']
                        ?></strong>
            </div>

        <?php
        }
        ?>

        <div class="row my-5">
            <div class="col-md-7 mx-auto reg-form p-3 shadow">
                <h3 class="text-center heading">Create An Account</h3>
                <div class="top-bottom">
                    <span class="first-part"></span>
                    <span class="second-part"></span>
                    <span class="third-part"></span>
                </div>
                <form action="Registration.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-home" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="Address" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                        <input type="date" name="date" class="form-control" placeholder="Date Of Birth" aria-label="Date Of Birth" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-square" aria-hidden="true"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                    </div>
                    <div class="text-center mb-3">
                        <h5>Gender</h5>
                        <div class="divider mx-auto mb-3"></div>
                        <!-- Material inline 1 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="materialInline1" name="gender" value="1"  checked>
                            <label class="form-check-label" for="materialInline1">Male</label>
                        </div>

                        <!-- Material inline 2 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="materialInline2"name="gender" value="2">
                            <label class="form-check-label" for="materialInline2">Female</label>
                        </div>

                        <!-- Material inline 3 -->
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="materialInline3" name="gender" value="3">
                            <label class="form-check-label" for="materialInline3">Others</label>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="materialInline3" name="agree" required="required">
                            <label class="form-check-label" for="materialInline3">I agree The Terms And
                                Conditions</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"  name="submit" class="btn btn-primary">Register</button>
                    </div>

                </form>
            </div>

        </div>
    </div>













    <?php include('php-layout-files/footer.php') ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>