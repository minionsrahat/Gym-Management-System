<?php include('header.php');
include('../../php-functions/php_query_functions.php');
include('db_connection.php');
?>

<body class="skin-blue">
  <div class="wrapper">
    <?php include('menu.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1> Edit Product Details <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
          <li><a href="dahboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="user-list.php">Product List</a></li>
          <li class="active">Edit Product</li>
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
              $id = $_REQUEST['id'];
            
              $sql = "SELECT * FROM products where product_id = '$id' ";
              $retval = $con->query($sql);
              $row=mysqli_fetch_array($retval);
              
              ?>
              <form action="edit.php" role="form" method="post" enctype="multipart/form-data">

                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Title</label>
                    <input type="text" class="form-control" value="<?php echo $row['product_name']?>" name="title" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <input type="text" class="form-control"value="<?php echo $row['product_des']?>" name="des" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Pic</label>
                    <input type="file" class="form-control" name="picture" required>
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
                  <input type="hidden"value="<?php echo $row['product_id']?>" name="product_id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Per Items Price</label>
                    <input type="text" class="form-control"value="<?php echo $row['price']?>" name="price" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total Product</label>
                    <input type="text" class="form-control"value="<?php echo $row['num_avl_product']?>" name="tproduct" required>
                  </div>
                  <!--  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
  </div> -->
                </div>
                <div class="box-footer">
                  <button type="submit" name="product_edit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include('footer.php'); ?>