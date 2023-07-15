<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Update Time Slots <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="package-list.php">Package List</a></li>
              <li class="active">Update Time Slots</li>
            </ol>
          </section>
         <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header">
                   <!--  <h3 class="box-title">Add User</h3> -->
                  </div>
                   <?php
                             $timeslote_id = $_REQUEST['id'];
                              require_once 'db.php';
                             $sql = "SELECT * FROM timeslote  where timeslote_id = '$timeslote_id' ";
                             $retval = mysqli_query($conn, $sql);
                             
                             if(! $retval ) {
                                die('Could not get data: ' . mysql_error());
                             }
                  ?>
                  <form action="update.php" role="form" method="post">
                    <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Time Slots Name</label>
                        <input type="hidden" class="form-control" name="timeslote_id" value="<?php echo $row['timeslote_id'] ?>">
                        <input type="text" class="form-control" name="timeslote_time"  value="<?php echo $row['timeslote_time'] ?>" required>
                      </div>                
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                      <?php } ?>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="btn_time" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>