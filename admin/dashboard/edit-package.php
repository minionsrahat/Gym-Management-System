<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1>Edit Package <small>it all starts here</small> </h1>
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

                   <?php
                            include('db_connection.php');
                             $package_id = $_REQUEST['id'];
                              require_once 'db.php';
                             $sql = "SELECT * FROM package  where package_id = '$package_id' ";
                             $retval = mysqli_query($conn, $sql);
                             
                             if(! $retval ) {
                                die('Could not get data: ' . mysql_error());
                             }
                  ?>
                  <form action="update.php" role="form" method="post">
                    <?php  while($row = mysqli_fetch_array($retval) ){
                       ?>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Package Name</label>
                         <input type="hidden" class="form-control" name="package_id" value="<?php echo $row['package_id'] ?>"  required>
                        <input type="text" class="form-control" name="package_name" value="<?php echo $row['package_name'] ?>"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Package Price</label>
                        <input type="number" class="form-control" name="package_price" value="<?php echo $row['package_price'] ?>"  required>
                      </div>

                     
                      <div class="form-group">
                        <label>Package Validay( In Days)</label>
                        <select class="form-control" name="package_validity">
                           <option value="<?php echo $row['package_validity'] ?>"><?php echo $row['package_validity']?></option>
                           <?php  $month=array("30"=>"30","60"=>"60","90"=>"90","180"=>"180",  "360"=>"360");?>

                          <?php 

                               foreach($month as $key=> $value){

                            ?>
                            <?php if($row['package_validity'] != $value){?>
                              <option value='<?php echo $value ?>'><?php echo $key ?></option>
                           <?php } else { ?>
                            
                           <?php } } ?>
                            
                        </select>
                      
                          


                      </div>
                    <?php } ?>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="btn_pupdate" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>