<!-- <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Gym Logo</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mx-auto py-2">
            <li class="nav-item ">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="packages.php">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="instructors.php">Instructors</a>
                </li>
            <?php
            } ?>

            <li class="nav-item">
                <a class="nav-link text-white" href="gym-products.php">Buy Products</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="about-us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="contact-us.php">Contact Us</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) {
            ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="membership.php">Membership Info</a>

                        <a class="dropdown-item" href="php-functions/logout.php">Log Out</a>

                    </div>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="btn btn-warning" href="sign-up.php">Sign Up</a>
                </li>
                <li class="nav-item ml-2">
                    <a class="btn btn-primary" href="login.php">Log In</a>
                </li>


            <?php
            } ?>
        </ul>
    </div>
</nav> -->

<nav class="navbar navbar-light upper-navbar">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h3>CATAGORY</h3>

    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ">
        <div class="input-group-append">
            <button class="btn search-icon btn-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

    <?php if (isset($_SESSION['user_id'])) {
    ?>

        <div class="nav-item dropdown mr-5">
           
            <a class="nav-link dropdown-toggle profile-icon text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
            
            
            <img src="
            <?php if($_SESSION['gender']==1||$_SESSION['gender']==3)
            {
                echo 'images/male-profile-pic.jpg';
            } 
            else{
                echo 'images/female-profile-icon.png'; 
            }
            ?>" alt="" srcset=""><?php echo $_SESSION['name'] ?>
        
        
        </a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <!-- <a class="dropdown-item" href="membership.php">Membership Info</a> -->

                <a class="dropdown-item" href="php-functions/logout.php">Log Out</a>

            </div>
        </div>
        <a class="btn" href="invoice.php" type="button">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
        <?php  if (!empty($_SESSION['cart'])){
            ?>
             <span class="cart badge badge-danger mb-3"><?php echo count($_SESSION['cart']) ?></span>
            <?php
        } ?>
       
    <?php
    } else { ?>
        <a class="btn" href="invoice.php" type="button">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
        <a name="" id="" class="btn btn-primary log-in-btn mr-2 curve-btn" href="login.php" role="button">Log In</a>
        <a name="" id="" class="btn btn-primary reg-btn curve-btn" href="Registration.php" role="button">Registration</a>
    <?php
    } ?>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav upper-nav-item mr-auto mt-2 mt-lg-0">
        <?php if (isset($_SESSION['user_id'])) {
        ?>
            <li class="nav-item active">
                <a class="nav-link" href="apply-for-trainer.php">Apply For Trainer Registration </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-schedule.php">Gym Schedule</a>
            </li>
        <?php }
         ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Shooping & Delivery</a>
                    <a class="dropdown-item" href="#">Warranty & Repairs</a>
                    <a class="dropdown-item" href="#">Return & Refund</a>
                    <a class="dropdown-item" href="#">Terms & Condition</a>
                    <a class="dropdown-item" href="#">Terms & Condition</a>
                </div>
            </li>
        </ul>
    </div>

</nav>
<nav class="navbar navbar-expand-md lower-navbar">
    <a class="navbar-brand text-center" href="index.php">
        <div><img src="images/04012019-28.jpg" alt="" srcset="">
            <div class="text-center  title">Fitness And Sport</div>
        </div>
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto py-2">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            </li>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="gym-package.php">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="instructors.php">Instructor</a>
                </li>
            <?php
            } ?>
            <li class="nav-item">
                <a class="nav-link" href="gym-products.php">Products</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Offers</a>
                </li> -->
            <?php
            } ?>
            <li class="nav-item">
                <a class="nav-link" href="notices.php">Notices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about-us.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact-us.php">Contact US</a>
            </li>
        </ul>

    </div>
</nav>