<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Packages</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       
        

      

       

        .padding {
            padding: 0 40px !important;
        }
        .card {
            width: 270px !important;
            height: 400px!important;
            /* border-radius: 20px!important; */
        }

        .product-img {
            width: 100%;

            /* border-top-left-radius:20px!important; 
        border-top-right-radius: 20px!important;  */
        }

        .card-title {
            font-size: 20px;
        }

        .card-text {
            font-size: 20px;
            color: #da1f1f !important;
            font-weight: bolder;
        }

        .padding {
            padding: 0 40px !important;
        }

        .wrapper {
            padding-bottom: 0%;
            background-color: whitesmoke;
        }

        .triangle-upper {
            width: 100%;
            height: 60px;
            background-color: #6980fe;

        }

        .triangle-upper h2 {
            font-size: 25px;
            color: white;
            font-weight: bolder;


        }

        .triangle-bottom {
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 39px 135px 0 129px;
            border-color: #6980fe transparent transparent transparent;
        }

        .price h2 {
            font-size: 25px;
            font-weight: bolder;
        }

        .button {
            width: 100%;
            height: 60px;
            background-color: #6980fe;
        }

        .button a {
            text-decoration: none;
            font-size: 25px;
            color: white;
            font-weight: bolder;
        }

        .card:hover .button {
            background-color: red;
            transition: 0.4s;
        }

        .card:hover .triangle-upper {
            background-color: red;
            transition: 0.4s;
        }

        .card:hover .triangle-bottom {
            border-color: red transparent transparent transparent;
            transition: 0.4s;
        }
    </style>

</head>


<body>

    <?php

    include('php-layout-files/navbar.php');
    ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>

    <?php
    $msg = array(
        'msg' => false
    );
    if (isset($_POST['submit'])) {
        $txid = $_POST['txid'];
        $id = $_POST['id'];
        $uid = $_SESSION['user_id'];
        $columns = array('req_id', 'pk_id', 'user_id', 'txid');
        $values = array(null, $id, $uid, $txid);
        PushData($con, 'packages_request', $columns, $values);
        $msg['msg'] = true;
    }

    ?>

    <div class="product my-5 rounded">
        <h2 class="text-center product-heading my-5">Packages</h2>
        <div class="container mb-4">
            <?php if ($msg['msg']) {
            ?>
                <div class="alert alert-success mx-auto" role="alert">
                    <strong>You successfully Send a Membership Request.Just Wait a Couple of minutes to validate your Txid and your membership request. Confirmation msg will be sent via mail</strong>
                </div>

            <?php
            }
            ?>
            <div class="row">
                <?php
                $result = PullData($con, 'packages', '*', "", "");
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-md-3 mb-2 padding mx-auto">
                        <div class="card shadow">
                            <div class="wrapper">
                                <div class="triangle-upper">
                                    <h2 class="text-center pt-4"><?php echo $row['pk_period'] ?> Month</h2>
                                </div>
                                <div class="triangle-bottom">

                                </div>
                                <div class="price p-3">
                                    <h2 class="text-center">BDT <?php echo $row['cost'] ?></h2>
                                </div>

                            </div>

                            <div class="card-body">
                                <h4 class="card-title text-center"><?php echo $row['pk_name'] ?></h4>
                            </div>
                            <div class="button text-center">
                                <a onclick="package('<?php echo $row['pk_id'] ?>')" role="button" class="mt-2" href="#" role="button">Subscribe Now</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

              


            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Transaction Numer</h5>
                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                <h2 class="lead text-center mt-2">Bkash:01834567892</h2>
                    <p class="text-center mt-2 lead "></p>
                </div>
                <form action="gym-package.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="hidden" id="pk_id" name="id">
                            <input type="text" class="form-control" name="txid" id="" required aria-describedby="helpId" placeholder="TxID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Buy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-3 mx-auto">
                    <h4>Information</h4>
                    <p>Shooping & Delivery</p>
                    <p>Warranty & Repairs</p>
                    <p>Return & Refund</p>
                    <p>Terms & Condition</p>
                    <p>Privacy & Policy</p>
                    <p>About Us</p>
                </div>
                <div class="col-md-4 p-3 mx-auto">
                    <h4>More</h4>
                    <p>Find a GYM</p>
                    <p>About Us</p>
                    <p>News</p>
                    <p>Payment Method</p>

                </div>
                <div class="col-md-4 p-3 mx-auto">
                    <h4>Contact US</h4>
                    <p>Bashundhara,Dhaka,Bangldesh</p>
                    <p>+87000000000000</p>
                    <p>+87000000000000</p>
                    <p>Sat-Fri 7.30pm</p>

                </div>
            </div>
            <p class="text-center py-3"><i class="fa fa-copyright" aria-hidden="true"></i> Fitness&Sports All Rights
                Reserved</p>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include('php-layout-files/js-links.php') ?>
  <script>
        function package(id) {

            $.ajax({
                type: "post",
                url: "php-functions/curd-data-man.php",
                data: {
                    action: 'fetch-pk-data',
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    console.log('response :>> ', response);
                    $('#myModal p').text(response.pk_name);
                    $('#pk_id').val(id);
                    $('#myModal').modal('show');
                }
            });
        }
    </script>
</body>

</html>