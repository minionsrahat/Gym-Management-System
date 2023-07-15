<?php include('header.php');
 include('db_connection.php');
?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include('menu.php');?>

            <div class="content-wrapper" style="min-height: 1024px;">
                <section class="content-header">
                  <h1> Notice List <small>it all starts here</small> </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Notice List</li>
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
  
   $sql = "SELECT * FROM notices";
  //  mysql_select_db('fitness');
   $retval =$con->query($sql);
   

   
   //echo "Fetched data successfully\n";
   
?>
                    </div>
                    <div class="box-body"> 

                        <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Notice Title</th>
                                <th>Notice Content</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  while($row = mysqli_fetch_array($retval)) {  ?>
                              <tr>
                          
                                <td><?php echo $row['notice_title']?></td>
                                <td><?php echo $row['notice_content'] ?></td>
                                <!-- <td><a class="btn btn-block btn-warning btn-flat" href="edit-package.php?id=<?php echo $row['pk_id'] ?>">Edit</a></td> -->
                                <td><a class="btn btn-block btn-danger btn-flat" onClick="return confirm('Delete This Record?')"  href="delete.php?notice_id=<?php echo$row['notice_id'] ?>">Delete</a></td>

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