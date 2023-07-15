<!doctype html>
<html lang="en">

<head>
    <title>Invoice</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .modal p{
            color: black!important;
        }
        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-content .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .page-content .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .page-content .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .page-content .align-bottom {
            vertical-align: bottom !important;
        }
    </style>

</head>

<body>

    <?php
    session_start();
    include('php-layout-files/navbar.php');
    ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    $invoice_id = rand(10000, 90000);
    if (!isset($_SESSION['user_id'])) {
        echo  '<script>
        alert("You have to Log in to buy a Product and There is Nothing in Your Cart");
        </script>';
        echo '<script> location.replace("login.php"); </script>';
    } else {
        $uid = $_SESSION['user_id'];
        $condition = array(
            'user_id' => $uid
        );
        $result = PullData($con, 'users', '*', $condition, 'and');
        $row = mysqli_fetch_array($result);
    }

    ?>
    <?php
    if (empty($_SESSION['cart'])) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto p-3">
                    <div class="alert alert-danger" role="alert">
                        <strong>Sorry There Is Nothing In Your Cart. <a name="" id="" href="gym-products.php">Click Here to Buy products</a></strong>
                    </div>
                </div>

            </div>
        </div>
    <?php }
    ?>
    <div class="page-content container my-5">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    : <?php
                        if (!empty($_SESSION['cart'])) {
                            echo $invoice_id;
                        }
                        ?>PH
                </small>
            </h1>

            <div class="page-tools">

            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
                                <img src="images/04012019-28.jpg" alt="" srcset="">
                                <!-- <span class="text-default-d3">ZAMANGYM.com</span> -->
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">To:</span>
                                <span class="text-600 text-110 text-blue align-middle"><?php echo $row['fname'] ?></span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    <?php echo $row['address'] ?>
                                </div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"> <?php echo $row['username'] ?></b></div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"> <?php echo $row['phone_num'] ?></b></div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?php
                                                                                                                                                    if (!empty($_SESSION['cart'])) {
                                                                                                                                                        echo $invoice_id;
                                                                                                                                                    } ?>PH</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?php echo date('Y-m-d'); ?></div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            <div class="d-none d-sm-block col-1">#</div>
                            <div class="col-9 col-sm-5">Description</div>
                            <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                            <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                            <div class="col-2">Amount</div>
                        </div>

                        <div class="text-95 text-secondary-d3">
                            <?php
                            if (!empty($_SESSION['cart'])) {
                                $total = 0.0;
                                $x = 1;
                                foreach ($_SESSION['cart'] as $key => $value) {


                            ?>
                                    <div class="row mb-2 mb-sm-0 py-25">
                                        <div class="d-none d-sm-block col-1"><?php echo $x ?></div>
                                        <div class="col-9 col-sm-5"><?php echo $value['product_name'] ?></div>
                                        <div class="d-none d-sm-block col-2"><?php echo $value['quantity'] ?></div>
                                        <div class="d-none d-sm-block col-2 text-95"><?php echo $value['product_price'] ?></div>
                                        <div class="col-2 text-secondary-d2"><?php echo number_format($value['product_price'] * $value['quantity'], 2) ?></div>
                                    </div>
                                <?php
                                    $total = $total + $value['product_price'] * $value['quantity'];
                                }
                                ?>




                        </div>

                        <div class="row border-b-2 brc-default-l2">

                        </div>



                        <div class="row mt-3">
                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                Extra note such as company or payment information...
                            </div>

                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        SubTotal
                                    </div>
                                    <div class="col-5">
                                        <span class="text-120 text-secondary-d1"><?php echo $total ?></span>
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        Tax (10%)
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1"><?php echo number_format(($total / 100) * 10, 2) ?></span>
                                    </div>
                                </div>

                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                        Total Amount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-150 text-success-d3 opacity-2"><?php echo $total + number_format(($total / 100) * 10, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div>
                            <span class="text-secondary-d1 text-105">Thank you for your Order</span>
                            <div class="text-center mb-3">
                                <h5>Payment Option</h5>
                                <div class="divider mx-auto mb-3"></div>
                                <!-- Material inline 1 -->
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input payment" id="materialInline1" name="payment" value="1" >
                                    <label class="form-check-label" for="materialInline1">Cash On Delivery</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input payment" id="materialInline2" name="payment" value="2" checked>
                                    <label class="form-check-label" for="materialInline2">Online Delivery</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" onclick="trigerpayment()">Complete Your Order</button>

                        </div>
                    <?php
                            }
                    ?>
                    </div>

                </div>
            </div>
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
                    <p class="text-center mt-2 lead"></p>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="hidden" id="pk_id" value="" name="id">
                        <input type="text" class="form-control" name="txid" id="" required aria-describedby="helpId" placeholder="TxID">
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="submit" onclick="buyproduct('<?php echo $invoice_id ?>')" class="btn btn-primary">Buy</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Button trigger modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="modal_cash_on" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cash On Delivery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p>Thank You For Your Order. Your Order Will be Delivered Soon</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead">Your Products Will Be Deliver Soon</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <?php include('php-layout-files/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>

       function trigerpayment(){
           val=$('input[name="payment"]:checked').val();
           if (val==1) {
            $('#myModal').modal('hide')
            $('#modal_cash_on').modal('show')
            buyproduct('1');
           }
           if (val==2) {
            $('#modal_cash_on').modal('hide')
            $('#myModal').modal('show')
           }
       }

        function buyproduct(id) {
            $('#myModal').modal('hide')
            $.ajax({
                type: "post",
                url: "php-functions/curd-data-man.php",
                data: {
                    action: 'buy-product',
                    id: id
                },

                success: function(response) {
                    console.log('response :>> ', response);
                    $('#myModal').on('hidden.bs.modal', function(e) {
                        $("#modelId").modal("show");

                    });

                }
            });
        }
    </script>
</body>

</html>