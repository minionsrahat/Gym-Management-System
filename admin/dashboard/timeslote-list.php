<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include('menu.php');?>

            <div class="content-wrapper" style="min-height: 1024px;">
                <section class="content-header">
                  <h1> User List <small>it all starts here</small> </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">User List</li>
                  </ol>
                </section>
                <section class="content">
                  <div class="box">
                    <div class="box-header with-border">
                     <!--  <h3 class="box-title">Title</h3> -->
                      <!--  <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
                      </div>-->
                    </div>
                    <?php
                          require_once 'db.php';
                           $sql = 'SELECT * FROM timeslote where timeslote_status = 1';
                           $retval = mysqli_query($conn, $sql);
                            
                           if(! $retval ) {
                              die('Could not get data: ' . mysql_error());
                           }
                      ?>
                    <div class="box-body"> 

                        <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Time Soltas</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
                              <tr>
                                <td><?php echo $row['timeslote_id'] ?></td>
                                <td><?php echo $row['timeslote_time'] ?></td>
                                <td><?php echo$row['timeslote_cdate'] ?></td>
                                <td><a class="btn btn-block btn-warning btn-flat"  href="update-timeslote.php?id=<?php echo$row['timeslote_id'] ?>">Edit</a></td>
                                <td><a class="btn btn-block btn-danger btn-flat" onClick="return confirm('Delete This account?')" href="delete.php?timeid=<?php echo$row['timeslote_id'] ?>">Delete</a></td>

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