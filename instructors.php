<!doctype html>
<html lang="en">

<head>
    <title>Instructors</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .divider-line {
            border-bottom: 5px solid #4d90db;
        }
    </style>

</head>

<body>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php')
    ?>
    <?php
    session_start();
    include('php-layout-files/navbar.php')
    ?>

    <?php
    $msg = array(
        'msg' => false
    );


    ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto p-3">

                <h3 class="text-center my-5">Select Your Desire Trainer and Schedule For Start Your Workout Plan</h3>




                <?php

                $uid = $_SESSION['user_id'];

                $condition = array(
                    'user_id' => $uid
                );
                $nrows = num_of_rows($con, 'members', $condition, '');
                ?>
                <?php if ($nrows > 0) {
                ?>

                    <?php
                    $result = PullData($con, 'instructors', '*', '', '');
                    while ($row = mysqli_fetch_array($result)) {
                    ?>

                        <table class="table mt-4 table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4" class="">Trainer Name:<?php echo $row['name'] ?></th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="">Contact Number:<?php echo $row['contact'] ?></th>
                                </tr>
                                <tr>
                                    <th>SLOT ID</th>
                                    <th>SCHEDULE</th>
                                    <th>AVAIALBILITY</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $instructor_id = $row['instructor_id'];
                                $query = "SELECT workout_schedule.id as id, workout_schedule.status as status , workout_schedule.time as times FROM workout_schedule,instructors WHERE workout_schedule.instructor_id='$instructor_id' and instructors.instructor_id='$instructor_id'";
                                $result2 = $con->query($query);
                                $count = 1;
                                while ($row2 = mysqli_fetch_array($result2)) {

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $count++; ?></td>
                                        <td><?php echo $row2['times'] ?> </td>
                                        <td> <?php
                                                if ($row2['status'] == 0) {
                                                ?>
                                                <span class="badge badge-primary p-3">Available</span>
                                            <?php
                                                } else {
                                            ?>
                                                <span class="badge badge-primary p-3">Not Available</span>
                                            <?php
                                                } ?>
                                        </td>
                                        <td><button class="btn btn-success text-white" onclick="enroll('<?php echo $row2['id'] ?>')" role="button"
                                        <?php if($row2['status']==1) { echo 'disabled'; }
                                          
                                           
                                           ?> > Enroll</button></td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                        <div class="divider-line"></div>
                    <?php

                    }
                    ?>



                <?php
                } else {
                ?>
                <div class="text-center">
                    <div class="alert alert-danger" role="alert">
                        <strong>Your are not a member of this gym.Please buy a membership <a href="gym-package.php">package</a>  then you are able to select a trainer and start your GYM</strong>
                    </div>
                </div>
                  
                <?php
                }
                ?>
            </div>

        </div>
    </div>



    <!-- Button trigger modal -->


    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-success">
                        You successfully Enroll for this Trainer
                    </p>
                </div>
                <div class="modal-footer">

                    <button type="button" data-dismiss="modal" onclick="Reload()" class="btn btn-primary">Done</button>
                </div>
            </div>
        </div>
    </div>
    <?php include('php-layout-files/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function Reload() {
            window.location.reload();
        }
        function enroll(id) {

            $.ajax({
                type: "post",
                url: "php-functions/curd-data-man.php",
                data: {
                    action: 'enroll',
                    id: id
                },

                success: function(response) {
                    console.log(response)
                    $('.modal').modal('show');
                   
                }
            });
        }
    </script>
</body>

</html>