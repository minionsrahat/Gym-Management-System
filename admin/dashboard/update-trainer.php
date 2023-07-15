<?php include('header.php');
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
?>

<body class="skin-blue">
  <div class="wrapper">
    <?php include('menu.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1> Update Trainer <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
          <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="trainer-list.php">Trainer List</a></li>
          <li class="active">Update Trainer</li>
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
              $trainer_id = $_REQUEST['id'];
              $condition = array(
                'instructor_id' => $trainer_id
              );
              $retval = PullData($con, 'instructors', '*', $condition, '');


              ?>
              <form action="update.php" role="form" method="post">
                <?php while ($row = mysqli_fetch_array($retval)) {  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trainer Name</label>
                      <input type="text" class="form-control" name="trainer_fname" value="<?php echo $row['name'] ?>" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trainer Email Id</label>
                      <input type="email" class="form-control" name="trainer_email"value="<?php echo $row['email'] ?>" placeholder="Enter Email Id" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trainer Contact No.</label>
                      <input type="number" class="form-control" name="trainer_contact"value="<?php echo $row['contact'] ?>" placeholder="Enter Contact No." required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea class="form-control" rows="3" name="trainer_address"value="<?php echo $row['address'] ?>" placeholder="Enter ..."></textarea>
                    </div>
                    <input type="hidden"value="<?php echo $row['instructor_id'] ?>" name="ins_id">
                    <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                  </div>
                <?php
                }
                ?>
                <div class="box-footer">
                  <button type="submit" name="instructor_btn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include('footer.php'); ?>