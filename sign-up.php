<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>



<body>



<?php
 session_start();
  include('php-layout-files/navbar.php')
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
        $age = $_POST['age'];
        $phonenum = $_POST['phone'];
        $columns = array('user_id', 'fname', 'lame', 'gender', 'age', 'username', 'password', 'address', 'phone_num');
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
            $values = array(null, $fname, $lname, $gender, $age, $email, $password, $address, $phonenum);
            // echo "done";
            PushData($con, 'users', $columns, $values);
            $id = $con->insert_id;
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $fname;
            $_SESSION['mail'] = $email;
            $_SESSION['gender'] = $gender;
            header('location:index.php');
        }
    }

    ?>

    <div class="signup-form">

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
        
        <form action="sign-up.php" method="post">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-child"></i>

                        </span>
                    </div>
                    <input type="Number" class="form-control" name="age" placeholder="Age" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-genderless" aria-hidden="true"></i>
                        </span>
                    </div>
                    <select class="form-control" name="gender" id="">

                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="address" placeholder="Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="phone" placeholder="Phone" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group text-center">
                <button type="submit" name="submit" class=" btn btn-primary btn-lg">Sign Up</button>
            </div>
            <div class="text-center text-primary">Already have an account? <a href="login.php">Login here</a></div>
        </form>

    </div>
</body>

</html>