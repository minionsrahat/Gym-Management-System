<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New Notice <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="notice-list.php">Notice List</a></li>
              <li class="active">Add Notice</li>
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
                        <label for="exampleInputEmail1">Notice Title</label>
                        <input type="text" class="form-control" name="notice_title" placeholder="Enter Notice Title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Notice Description</label>
                        <input type="text" class="form-control" name="notice_content" placeholder="Enter Notice Description" required>
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="add_notice" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>