<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New Package <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="package-list.php">Package List</a></li>
              <li class="active">Add Package</li>
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
                        <label for="exampleInputEmail1">Package Name</label>
                        <input type="text" class="form-control" name="package_name" placeholder="Enter Package Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Package Price</label>
                        <input type="number" class="form-control" name="package_price" placeholder="Enter Package Price" required>
                      </div>
                      <div class="form-group">
                        <label>Package Period (Month)</label>
                        <input type="number" class="form-control" name="package_period" placeholder="Enter Package Period" required>

                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="pk_btn_add" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>