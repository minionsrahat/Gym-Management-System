<?php include('header.php');
 include('db_connection.php');
?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include('menu.php');?>

            <div class="content-wrapper" style="min-height: 1024px;">
                <section class="content-header">
                  <h1> Workout Schedule List <small>it all starts here</small> </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Schedule List</li>
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
  
   $sql = "SELECT workout_schedule.id as schdule_id,workoutplans.plan_id as plan_id, members.name as name,instructors.name as insname ,membershiptype.type_name as type,workout_schedule.time as time FROM `workoutplans`,members,instructors,membershiptype,workout_schedule WHERE workout_schedule.id=workoutplans.schdule_id and workout_schedule.instructor_id=instructors.instructor_id and workoutplans.member_id=members.member_id and members.membership_id=membershiptype.membership_id";
  //  mysql_select_db('fitness');
   $retval =$con->query($sql);
   

   
   //echo "Fetched data successfully\n";
   
?>
                    </div>
                    <div class="box-body"> 

                        <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Member Name</th>
                                <th>Instructor Name</th>
                                <th>Package Name</tk>
                                <th>Schedule</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  while($row = mysqli_fetch_array($retval)) {  ?>
                              <tr>
                          
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['insname'] ?></td>
                                <td><?php echo$row['type'] ?></td>
                                <td><?php echo$row['time'] ?></td>
                                <td><a class="btn btn-block btn-danger btn-flat" onClick="return confirm('Delete This Record?')"  href="delete.php?plan_id=<?php echo $row['plan_id'] ?>&schedule_id=<?php echo $row['schdule_id'] ?>">Delete</a></td>

                              <?php } ?>
                              </tr>
                             
                            </tbody>
                          </table>

                     </div>
                    <div class="box-footer">  </div>
                  </div>
                </section>
              </div>
     <?php include('footer.php');?>

     <script>


    function ConfirmDelete()
      {
            if (confirm("Delete Account?"))
                 location.href='linktoaccountdeletion';
      }
</script>