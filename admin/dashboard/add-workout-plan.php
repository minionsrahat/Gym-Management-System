<?php include('header.php');
include('db_connection.php');
?>

<body class="skin-blue">
    <div class="wrapper">
        <?php include('menu.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1> Add Workout Plans <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="trainer-list.php">Workout List</a></li>
                    <li class="active">Add Workout Plans</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <!--  <h3 class="box-title">Add User</h3> -->
                            </div>
                            <form action="add.php" role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="">Select Trainer</label>
                                        <select class="form-control" name="trainer_id" id="">
                                            <?php
                                            $sql = "SELECT * FROM instructors";
                                            $retval = $con->query($sql);
                                            while ($row = mysqli_fetch_array($retval)) {
                                            ?>
                                                <option value="<?php echo $row['instructor_id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select Time</label>
                                        <select class="form-control" name="schedule_id" id="">
                                            <option value="7.00AM - 8.30AM">7.00AM - 8.30AM</option>
                                            <option value="9.00AM - 10.30AM">9.00AM - 10.30AM</option>
                                            <option value="11.00AM - 12.30PM">11.00AM - 12.30PM</option>
                                            <option value=" 2.00PM -3.30PM">2.00PM -3.30PM</option>
                                            <option value="4.00PM - 5.30PM">4.00PM - 5.30PM</option>
                                            <option value="6.00PM - 7.30PM">6.00PM - 7.30PM</option>
                                            <option value="8.00PM - 9.30PM">8.00PM - 9.30PM</option>
                                            <option value="10.00PM - 11.30 PM">10.00PM - 11.30 PM</option>
                                        </select>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" name="add_workout_plan" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include('footer.php'); ?>