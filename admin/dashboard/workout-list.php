<?php include('header.php');
include('db_connection.php');
?>

<body class="skin-blue">
    <div class="wrapper">

        <?php include('menu.php'); ?>

        <div class="content-wrapper" style="min-height: 1024px;">
            <section class="content-header">
                <h1> Workout Plan List <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active"> Workout Plan List</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--  <h3 class="box-title">Title</h3> -->
                        <!--  <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                      </div>--><?php

                                $sql = "SELECT workout_schedule.status as status,workout_schedule.time as time ,instructors.name as name,workout_schedule.id as id FROM `workout_schedule`, instructors WHERE instructors.instructor_id=workout_schedule.instructor_id";
                                //  mysql_select_db('fitness');
                                $retval = $con->query($sql);



                                //echo "Fetched data successfully\n";

                                ?>
                    </div>
                    <div class="box-body">

                        <table id="example" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Trainer Name</th>
                                    <th>Schedule Time</th>
                                    <th>Availability</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($retval)) {  ?>
                                    <tr>

                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] == 0) {
                                            ?>
                                                <span class="badge badge-primary p-3">Available</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-primary p-3">Not Available</span>
                                            <?php
                                            } ?>

                                        </td>
                                        <td><a class="btn btn-block btn-danger btn-flat" onClick="return confirm('Delete This account?')" href="delete.php?workout_id=<?php echo $row['id'] ?>">Delete</a></td>

                                    <?php } ?>
                                    </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="box-footer"> </div>
                </div>
            </section>
        </div>
        <?php include('footer.php'); ?>

        <script>
            function ConfirmDelete() {
                if (confirm("Delete Account?"))
                    location.href = 'linktoaccountdeletion';
            }
        </script>