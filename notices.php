<?php
    session_start();
    // include('php-layout-files/navbar.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Notices</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card .card-text {
            color: black;
        }
    </style>

</head>

<body>
    <?php include('php-layout-files/navbar.php') ?>

    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>
    <div class="container mt-5">
        <h2 class="text-center ">Gym Notices</h2>
        <div class="row mt-5">

            <?php
            $query = " Select * from notices";
            $result = $con->query($query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-md-10 mx-auto p-2 mt-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row['notice_title'] ?></h4>

                                <p class="card-text"><?php echo $row['notice_content'] ?></p>
                            </div>
                        </div>
                    </div>

                <?php
                }
            }
            else{
                ?>
                <div class="mx-auto mb-5">
                <div class="alert alert-danger mb-5" role="alert">
                    <strong>There is No Recent Notices</strong>
                </div>
                </div>
                


            <?php }
            ?>
        </div>
    </div>



    <?php include('php-layout-files/footer.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('php-layout-files/js-links.php') ?>
</body>

</html>