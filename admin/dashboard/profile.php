<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Admin <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="trainer-list.php">Trainer List</a></li>
              <li class="active">Add Trainer</li>
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

                           require_once 'db.php';
                           $sql = 'SELECT * FROM admin';
                           $retval = mysqli_query($conn, $sql);
                           
                           if(! $retval ) {
                              die('Could not get data: ' . mysql_error());
                           }?>
                  <form action="update.php" role="form" method="post" enctype="multipart/form-data" >
                    <div class="box-body">
                       <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
                        <input type="hidden" class="form-control" name="admin_id" value="<?php echo $row['admin_id'] ?>"  required>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Admin Name</label>
                        <input type="text" class="form-control" name="admin_name" value="<?php echo $row['admin_name'] ?>"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Admin Email Id</label>
                        <input type="email" class="form-control" name="admin_email" value="<?php echo $row['admin_email'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Admin Contact No.</label>
                        <input type="number" class="form-control" name="admin_contact" value="<?php echo $row['admin_contact'] ?>"required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File profile Picture</label>
                        <input type="file" name="admin_picture">
                        <input type="hidden" name="admin_oldgpic" value="<?php echo $row['admin_picture'] ?>">
                        <img name="" src="../images/<?php echo $row['admin_picture'] ?>" class="img-circle" alt="User Image" style="width: 200px;padding: 34px;height: 200px;">
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                      <?php } ?>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="update_admin" class="btn btn-primary">Submit</button>
                      <a href="change-password.php" class="btn btn-warning">Change password</a>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>