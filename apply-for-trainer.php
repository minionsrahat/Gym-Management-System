<?php session_start() ?>

<!doctype html>
<html lang="en">

<head>
    <title>Apply For Trainer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
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

        .card-body .card-text {
            color: black;
        }

        .card-body .card-text p {
            color: black;
            text-align: justify;
        }
    </style>
</head>

<body>
    <?php
    include('php-layout-files/navbar.php');
    ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>
    <?php
    $apply = array(
        'apply' => False,
        'msg' => ''
    );
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phonenum = $_POST['phone'];
        $date = $_POST['date'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];

        $filename = $_FILES['cv']['name'];

        // destination of the file on the server
        $destination = 'admin/cv_pdf/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['cv']['tmp_name'];
        $size = $_FILES['cv']['size'];

        if (!in_array($extension, ['pdf'])) {
            $error['msg'] = 'You file extension must be in pdf format';
        } elseif ($_FILES['cv']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            $error['msg'] = "File too large!";
        } else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $columns = array('request_id', 'name', 'email', 'phone_num', 'date_of_birth', 'experience', 'gender', 'qualification','cv_file_name');
                if ($apply['apply'] == false) {
                    $values = array(null, $name, $email, $phonenum, $date, $experience, $gender, $qualification,$filename);
                    // echo "done";
                    $apply['apply'] = True;
                    PushData($con, 'trainer_application', $columns, $values);
                }
            } else {
                echo "Failed to upload file.";
            }
        }



        // echo $fname;
        // echo $lname;
        // echo $password;
        // echo $gender;
        // echo $address;
        // echo $email;
        // echo $phonenum;
        // echo $date;

    }

    ?>

    <div class="container my-5">

        <div class="row my-5">
            <?php
            if ($apply['apply'] == True) {
            ?>
                <div class="col-md-7 mx-auto p-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title text-success text-center">Confirmation Message</h4>
                            <hr>
                            <div class="card-text">
                                <h5>Hello <?php echo $name  ?>,</h5>
                                <p> We always look forward to go through applications of great people who’d like to work with us. Thank you for applying for the Trainer position with us, and here’s a confirmation that we received your application.
                                    One of our recruiters will contact you shortly to let you know about the status of your application.
                                    You can read more about us on our company <a href="about-us.php">about page</a> or follow us on social media on <a href="">Facebook</a> and <a href="">Instagram</a> to get the latest updates.
                                    If you’ve got any questions you’re welcome to <a href="">contact us</a> .</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-md-7 mx-auto reg-form p-3 shadow">
                    <h3 class="text-center heading">Apply as a Trainer</h3>
                    <div class="top-bottom">
                        <span class="first-part"></span>
                        <span class="second-part"></span>
                        <span class="third-part"></span>
                    </div>
                    <form action="apply-for-trainer.php" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" required="required">
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
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                            </div>
                            <input type="number" class="form-control" name="experience" placeholder="Training Experience" required="required">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-university" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="qualification" placeholder="Academic Qualification. Ex. HSE,HONS,MASTERS " required="required">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-file" aria-hidden="true"></i></span>
                            </div>
                            <input type="file" class="form-control" name="cv" title="Submit Your CV in Only PDF format" required="required">
                        </div>
                        <div class="text-center mb-3">
                            <h5>Gender</h5>
                            <div class="divider mx-auto mb-3"></div>
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="materialInline1" name="gender" value="1" checked>
                                <label class="form-check-label" for="materialInline1">Male</label>
                            </div>

                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="materialInline2" name="gender" value="2">
                                <label class="form-check-label" for="materialInline2">Female</label>
                            </div>

                            <!-- Material inline 3 -->
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="materialInline3" name="gender" value="3">
                                <label class="form-check-label" for="materialInline3">Others</label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>




    <?php
    include('php-layout-files/footer.php');
    include('php-layout-files/js-links.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>