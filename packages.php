<!doctype html>
<html lang="en">

<head>
    <title>Package Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php')
    ?>
    <?php
     session_start();
    include('php-layout-files/navbar.php')
    ?>

    <?php
    $msg = array(
        'msg' => false
    );
    if (isset($_POST['submit'])) {
        $txid = $_POST['txid'];
        $id = $_POST['id'];
        $uid=$_SESSION['user_id'];
        $columns = array('req_id', 'pk_id', 'user_id', 'txid');
        $values = array(null, $id, $uid, $txid);
        PushData($con, 'packages_request', $columns, $values);
        $msg['msg'] = true;
    }

    ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto p-3">

                <h3 class="text-center my-5">Buy Exciting Packages For be a Member Of this Gym</h3>
                <?php if ($msg['msg']) {

                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>You successfully Send a Membership Request.Just Wait a Couple of minutes to validate your Txid and your membership request. Confirmation msg will be sent via mail</strong>
                    </div>

                <?php
                }


                ?>

                <table class="table mt-3  table-bordered">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Package Period</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = PullData($con, 'packages', '*', "", "");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $row['pk_name'] ?></td>
                                <td><?php echo $row['pk_period'] ?> Month</td>
                                <td><?php echo $row['cost'] / 1000 ?>K</td>
                                <td><a class="btn btn-success text-white" onclick="package('<?php echo $row['pk_id'] ?>')" role="button">Buy</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <!-- Button trigger modal -->


    <!-- Modal -->
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
                <form action="packages.php" method="post">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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