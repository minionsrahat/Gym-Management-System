<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include('menu.php');?>

            <div class="content-wrapper" style="min-height: 1024px;">
                <section class="content-header">
                  <h1> Package List <small>it all starts here</small> </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Package List</li>
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
                          require_once 'db.php';
                           $sql = 'SELECT * FROM package';
                           //mysql_select_db('gym');
                           $retval = mysqli_query($conn, $sql);
                           
                           if(! $retval ) {
                              die('Could not get data: ' . mysql_error());
                           }
   
   //echo "Fetched data successfully\n";
   
   //mysql_close($conn);
?>
                    </div>
                    <div class="box-body"> 

                        <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Package Name</th>
                                <th>Package Price</th>
                                <th>Package Validity</th>
                                <th>Package Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
                              <tr>
                                <td><?php echo $row['package_id'] ?></td>
                                <td><?php echo $row['package_name'] ?></td>
                                <td><?php echo$row['package_price'] ?></td>
                                <td><?php echo$row['package_validity'] ?></td>
                                <td><?php echo$row['package_status'] ?></td>
                                <td><a class="btn btn-block btn-warning btn-flat" onClick="return confirm('Delete This account?')" href="delete.php?id=<?php echo$row['package_id'] ?>">Edit</a></td>
                                <td><a class="btn btn-block btn-danger btn-flat" href="delete.php?id=<?php echo$row['package_id'] ?>">Delete</a></td>

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