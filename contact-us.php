<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .contact-us .title {
            font-family: Calibri, "Helvetica", san-serif;
            line-height: 1.5em;
            color: black;
            font-size: 40px;
            position: relative;
            text-align: center;
        }

        .contact-us .title:before {
            content: "";
            position: absolute;
            width: 25%;
            height: 4px;
            bottom: 0;
            left: 37%;
            border-bottom: 3px solid red;
        }

        .about-us img {
            width: 100% !important;
            min-height: 400px;
        }

        .contact-us .card {
            margin-top: 50px;
            padding: 50px;
            background-image: linear-gradient(#4d90db, #51a7dd);
        }

        .contact-us .card .card-body {
            color: white;
            /* font-weight: bolder; */
            font-size: 20px;
            /* font-weight: bolder; */

        }
    </style>
</head>

<body>

    <?php
    include('php-layout-files/navbar.php')
    ?>



    <section class="contact-us">
        <h3 class="text-center title  mt-5">Contact Us</h3>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body p-3">
                            <div class="form-group">
                                <label for="">Your Name</label>
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Your Mail</label>
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea class="form-control" name="" id="" rows="3"></textarea>
                            </div>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-warning" href="#" role="button">Submit</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
    include('php-layout-files/footer.php')
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>