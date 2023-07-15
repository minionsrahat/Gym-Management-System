<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('menu.php');?>

        <div class="content-wrapper">
          <section class="content-header">
            <h1> Add New Product Details <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
              <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="user-list.php">Product List</a></li>
              <li class="active">Add Product</li>
            </ol>
          </section>
         <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header">
                   <!--  <h3 class="box-title">Add User</h3> -->
                  </div>
                  <form action="add.php" role="form" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" name="title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Description</label>
                        <input type="text" class="form-control" name="des"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Pic</label>
                        <input type="file" class="form-control" name="picture"  required>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                          <label for="">Exported From</label>
                          <select class="form-control" name="expfrom" id="">
                            <option value="Germany">Germany</option>
                            <option value="China">China</option>
                            <option value="India">India</option>
                            <option value="Australia">Australia</option>
                            <option value="Dubai">Dubai</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Per Items Price</label>
                        <input type="text" class="form-control" name="price"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Product</label>
                        <input type="text" class="form-control" name="tproduct"  required>
                      </div>
                     <!--  <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                      </div> -->
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="product_btn" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>    
              </div> 
            </div>
       </section>
      </div>

 <?php include('footer.php');?>