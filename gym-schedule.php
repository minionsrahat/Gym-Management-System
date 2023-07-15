<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>GYM-SCHEDULE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include('php-layout-files/navbar.php')
    ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>


    <div class="container my-5">
        <div class="row my-4">
            <div class="col-md-8 mx-auto">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Instructor Name</th>
                            <th>Package Name</th>
                            <th>Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT  members.name as name, instructors.name as insname ,membershiptype.type_name as type,workout_schedule.time as time FROM `workoutplans`,members,instructors,membershiptype,workout_schedule WHERE workout_schedule.id=workoutplans.schdule_id and workout_schedule.instructor_id=instructors.instructor_id and workoutplans.member_id=members.member_id and members.membership_id=membershiptype.membership_id";
                        $retval = $con->query($sql);
                        while ($row = mysqli_fetch_array($retval)) {
                        ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['insname'] ?></td>
                                <td><?php echo $row['type'] ?></td>
                                <td><?php echo $row['time'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


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