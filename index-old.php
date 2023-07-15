<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .carosel {
            min-width: 100%;
            min-height: 600px;
        }

        .about-us {
            min-width: 100%;
            min-height: 650px;
        }
        .contact-us {
            min-width: 100%;
            min-height: 700px;
        }

        .carousel-inner img {
            width: 1000px !important;
            height: 500px !important;

        }

        .title {
            font-family: Calibri, "Helvetica", san-serif;
            line-height: 1.5em;
            color: black;
            font-size: 40px;
            position: relative;
            text-align: center;
        }

        .title:before {
            content: "";
            position: absolute;
            width: 50%;
            height: 4px;
            bottom: 0;
            left: 25%;
            border-bottom: 3px solid red;
        }

        .about-us img {
            width: 100% !important;
            min-height: 400px;
        }
        .contact-us .card{
            margin-top: 50px;
            padding: 50px;
            background-color: #a4a4a4;
        }
        .contact-us .card .card-body{
           color: black;
           /* font-weight: bolder; */
           font-size: 18px;
        }
    </style>
</head>

<body>

  <?php
   session_start();
  include('php-layout-files/navbar.php')
  ?>
    <section class="carosel">
        <div class="container mt-5">

            <div class="row">
                <div class="col-md-10 mx-auto">

                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselId" data-slide-to="1"></li>
                            <li data-target="#carouselId" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="images/carosel-1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="images/carosel-3.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="images/carosel-4.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>