<!doctype html>
<html lang="en">

<head>
    <title>Buy Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="product-files/assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <!-- <link href="css/theme.min.css" rel="stylesheet"> -->
    <!-- Google Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            width: 270px !important;
            border-radius: 20px !important;
            height: 500px !important;
        }

        .product-img {
            width: 100%;

            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        .card-title {
            font-size: 20px;
        }
        .card-body .product-des{
            height: 80px!important;
        }
        .card-text {
            font-size: 16px;
            color: #da1f1f !important;
            font-weight: bolder;
        }

        .padding {
            padding: 0 40px !important;
        }

        .product-img {
            height: 300px !important;
        }
       
    </style>
</head>

<body>
    <?php
    session_start();
    include('php-layout-files/navbar.php')
    ?>

    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>

    <?php


    if (isset($_POST['add_cart'])) {

        if (!isset($_SESSION['user_id'])) {
            echo  '<script>
            alert("You have to Log in to buy a Product");
            </script>';
            header("location:login.php");
        } else {
            //  unset($_SESSION['cart']);
            //   session_destroy();

            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $quantity = $_POST['quantity'];

            // if(isset($_POST['test'])) {
            //     $id =$_POST['id'];
            //Creating a array for storing new item details...
            $newitem = array(
                'product_id' => $id,
                'product_name' => $name,
                'product_price' => $price,
                'quantity' => $quantity
            );
            //if not empty
            //Chceking where session variable is set or not
            if (!empty($_SESSION['cart'])) {
                //and if session cart same
                $item_id_column = array_column($_SESSION['cart'], 'product_id');
                //if user select a item which is already added into cart...
                // if(isset($_SESSION['cart'][$id]) == $id)
                if (in_array($id, $item_id_column)) {
                    echo  '<script>
         alert("Item already added to the cart");
         </script>';
         echo '<script> window.location.assign(document.URL);</script>';
                    // $_SESSION['cart'][$id]['quantity']++;
                } else {
                    //if user select a item which is not exist in cart...
                    $_SESSION['cart'][$id] = $newitem;
                    echo  '<script>
           alert("Item successfully added to the cart");
           </script>';
           echo '<script> window.location.assign(document.URL);</script>';
                }
            } else {
                $_SESSION['cart'] = array();
                $_SESSION['cart'][$id] = $newitem;
                echo  '<script>
       alert("Item successfully added to the cart");
       </script>';
       echo '<script> window.location.assign(document.URL);</script>';
            };

            echo "<script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
            </script>";
            //    unset($_SESSION['cart'][0]);
            //    echo var_dump($_SESSION['cart']);
            // foreach ($_SESSION['cart'] as $key => $value) {

            //   echo $value['product_id'].'<br>';

            // }
        }
    }

    ?>
    <!-- Bootstrap core CSS -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- 
        BLOCK FEATURES
        =============================================== -->
    <div class="product my-5">
        <h2 class="text-center product-heading my-5">Products</h2>
        <div class="container mb-4">
            <div class="row">

                <?php
                $query = " Select * from products";
                $result = $con->query($query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-md-3 mb-2 product padding mx-auto">
                        <form action="gym-products.php" method="post">
                            <div class="card shadow">
                                <img class="card-img-top product-img" src="images/<?php echo $row['product_pic'] ?>" alt="">
                                <div class="card-body">
                                    <div class="product-des">
                                    <h4 class="card-title text-center"><?php echo $row['product_name'] ?></h4>
                                    </div>
                                   
                                    <p class="card-text text-center">TK: <?php echo $row['price'] ?></p>
                                    <div class="button">
                                        <input type="hidden" class="form-control" name="quantity" id="" value="1" aria-describedby="helpId" placeholder="">
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>">

                                        <a name="" id="" href="product-view-page.php?product_id=<?php echo $row['product_id'] ?>" class="btn btn-primary mr-3" href="#" role="button">More Info</a>
                                        <button type="submit" name="add_cart" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

<?php }
?>
</div>
</div>
</div>




<?php include('php-layout-files/footer.php') ?>
<!-- END: FEATURES -->

<!-- Bootstrap core JavaScript
        ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="product-files/assets/js/jquery.min.js"></script>
    <script src="product-files/assets/js/bootstrap.min.js"></script>
    <script src="product-files/assets/js/jquery-ui.min.js"></script> -->
<!-- <script src="product-files/assets/js/owl.carousel.min.js"></script>OWL Carousel -->
<!-- <script src="product-files/assets/js/lv-ripple.jquery.min.js"></script>BTN Material effects -->
<!-- <script src="product-files/assets/js/SmoothScroll.min.js"></script>SmoothScroll -->
<!-- <script src="product-files/assets/js/jquery.TDPageEvents.min.js"></script>Page Events -->
<!-- <script src="product-files/assets/js/jquery.TDParallax.min.js"></script>Parallax -->
<!-- <script src="product-files/assets/js/jquery.TDTimer.min.js"></script>Timer -->
<!-- <script src="product-files/assets/js/selectize.min.js"></script>Select customize -->
<!-- <script src="product-files/js/main.min.js"></script> -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>