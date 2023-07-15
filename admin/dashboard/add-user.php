<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New User <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="user-list.php">User List</a></li>
              <li class="active">Add User</li>
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
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="userFirstname" placeholder="Enter First Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="userLastname" placeholder="Enter First Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" class="form-control" name="userEmail" placeholder="Enter Email Id" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.</label>
                        <input type="number" class="form-control" name="userContact" placeholder="Enter Contact No." required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adhar Card No.</label>
                        <input type="number" class="form-control" name="userAdhar" placeholder="Enter Contact No." required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date Of Birth</label>
                        <input type="date" class="form-control" name="userDob" placeholder="Enter Contact No." required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control" name="userGender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                       <?php
                           require_once 'db.php';
                           $sql = 'SELECT * FROM trainer where trainer_status = 1';
                           $sql1 = 'SELECT * FROM timeslote where timeslote_status = 1';
                           $sql2 = 'SELECT * FROM package where package_status = 1';
                           $retval = mysqli_query($conn, $sql);
                           $retval1 = mysqli_query($conn, $sql1);
                           $retval2 = mysqli_query($conn, $sql2);
                           
                           if(! $retval ) {
                              die('Could not get data: ' . mysql_error());
                        }?>
                      <div class="form-group">
                        <label>Time Slote</label>
                        <select class="form-control" name="userTime" required>
                            <option value="">--Please choose an option--</option>
                          <?php  while($row = mysqli_fetch_array($retval1, MYSQL_ASSOC)) {  ?>
                             <option value="<?php echo $row['timeslote_id'] ?>"><?php echo $row['timeslote_time']?></option>
                          <?php } ?>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Triner Name</label>
                        <select class="form-control" name="userTriner" required>
                            <option value="">--Please choose an option--</option>
                           <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
                             <option value="<?php echo $row['trainer_id'] ?>"><?php echo $row['trainer_fname'] .' '. $row['trainer_lname']?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <label>Package</label>
                        <select class="form-control" name="userPackage" required>
                            <option value="">--Please choose an option--</option>
                           <?php  while($row = mysqli_fetch_array($retval2, MYSQL_ASSOC)) {  ?>
                             <option value="<?php echo $row['package_id'] ?>"><?php echo $row['package_name'] .' '. $row['trainer_lname']?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea class="form-control" rows="3" name="userAddress" placeholder="Enter ..."></textarea>
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>