<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Log in</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      

        
      
       
    </style>

</head>

<body>




    <?php
    session_start();
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

        $password = $_POST['password'];
        $email = $_POST['email'];
        $columns = array('user_id', 'fname','gender');
        $condition = array(
            'username' => $email,
            'password' => $password
        );
        $result = PullData($con, 'users', $columns, $condition, 'and');
        $nrows = mysqli_num_rows($result);

        if ($nrows < 1) {
            $error['error'] = True;
            $error['msg'] = "Invalid Password Or Username";
        } else {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['fname'];
            $_SESSION['mail'] = $email;
            $_SESSION['gender'] = $row['gender'];
            echo $con->error;
            // echo 'hiii';
            echo '<script> location.replace("index.php"); </script>';
            
        }
    }

    ?>


    <div class="signup-form">
        <?php
        if ($error['error']) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $error['msg']  ?></strong>
            </div>
        <?php
        }
        ?>

        <form action="login.php" method="post">
            <h2>Log In</h2>

            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Username/Email" required="required">
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


            <div class="form-group text-center">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="text-center text-primary">Dont have an account? <a href="Registration.php">Signup here</a></div>
        </form>

    </div>
    <?php include('php-layout-files/footer.php') ?>
    <?php include('php-layout-files/js-links.php') ?>
</body>

</html>