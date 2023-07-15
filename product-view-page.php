<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Product-View</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/product-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .payment-option p {
            color: black;
        }
        .online-payment img{
            width: 150px;
            margin-top: -10px;
        }
    </style>

</head>

<body>
    <?php include('php-layout-files/navbar.php') ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>

    <?php
    $product_id = $_GET['product_id'];
    $query = " Select * from products where product_id=$product_id";
    $result = $con->query($query);
    $result = mysqli_fetch_array($result);
    ?>


    <?php


    if (isset($_POST['add_cart'])) {

        if (!isset($_SESSION['user_id'])) {
            echo  '<script>
        alert("You have to Log in to buy a Product");
        </script>';
        } else {
            //  unset($_SESSION['cart']);
            //   session_destroy();
            $id = $_GET['product_id'];
            $query = " Select * from products where product_id=$product_id";
            $result = $con->query($query);
            $result = mysqli_fetch_array($result);

            $name = $result['product_name'];
            $price = $result['price'];
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


    <section id="services" class="services section-bg">
        <div class="container-fluid">
            <div class="row row-sm">
                <div class="col-md-5 _boxzoom  mx-auto">
                    <div class="_product-images">
                        <div class="picZoomer">
                            <img class="my_img" src="images/<?php echo $result['product_pic'] ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="_product-detail-content">
                        <p class="_p-name"><?php echo $result['product_name'] ?> </p>
                        <div class="_p-price-box">
                            <div class="p-list">
                                <span class="price"> Tk. <?php echo $result['price'] ?> </span>
                            </div>
                            <div class="_p-add-cart">
                                <div class="_p-qty">
                                    <form action="product-view-page.php?product_id=<?php echo $product_id ?>" method="post" accept-charset="utf-8">
                                        <span>Add Quantity</span>
                                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                                        <input type="number" name="quantity" id="number" value="1" />
                                        <div class="value-button increase_" id="" value="Increase Value">+</div>
                                </div>
                            </div>
                            <div class="payment-option">
                                <h5> Payment Option </h5>
                                <p> 1. Cash On Delivery</p>
                                <div class="online-payment">
                                <p> 2. Online Payment</p>
                                <img src="images/bkash-nagad-rocket-1.png" alt="" srcset="">
                                </div>
                               



                            </div>
                            <div class="_p-features mt-3">
                                <span> Description About this product:- </span>
                                <?php echo $result['product_des'] ?>

                            </div>

                            <ul class="spe_ul"></ul>
                            <div class="_p-qty-and-cart">
                                <div class="_p-add-cart">
                                    <button type="submit" name="add_cart" class="btn-theme btn btn-success" tabindex="0">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                    <!-- <input type="hidden" name="pid" value="18" />
                                        <input type="hidden" name="price" value="850" />
                                        <input type="hidden" name="url" value="" /> -->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('php-layout-files/footer.php') ?>
    <?php include('php-layout-files/js-links.php') ?>
    <script>
        $('.decrease_').click(function() {
            decreaseValue(this);
        });
        $('.increase_').click(function() {
            increaseValue(this);
        });

        function increaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#number').val(value);
        }

        function decreaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#number').val(value);
        }
    </script>
</body>

</html>