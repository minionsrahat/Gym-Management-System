<header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo" style="font-size: 18px;"><b>Fitness And Sport  Club</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           <?php

              require_once 'db.php';
               $sql = 'SELECT * FROM admin';
               $retval = mysqli_query($conn, $sql);
               ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php  while($row = mysqli_fetch_array($retval)) {  ?>
                  <img src="../dist/img/profile-pic.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $row['admin_name'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                           
                  <li class="user-header">
                    
                    <img src="../dist/img/profile-pic.jpg" class="img-circle" alt="User Image">
                    <p>
                       <!-- logged in user information -->
   
                       <?php echo $row['admin_name'] ?> - Fitness and Sports Club 

                      <small>Member since Nov. 2020</small>
                    </p>
                  <?php } ?>
                  </li>
                  <!-- Menu Body -->
                 
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" onclick= "logout();" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header><aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- Sidebar user panel -->
        <!--   <div class="user-panel">
            <div class="pull-center image">
              <img src="../dist/img/fitness-club-two.png" class="img-circle" alt="User Image">
            </div>
          
          </div> -->
           <img src="../dist/img/04012019-28.jpg" class="img-circle" alt="User Image" style="padding: 34px;width:240px;">
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="active treeview">
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
             <!--  <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul> -->
            </li>
           <!--  <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
              </ul>
            </li> -->
            <!-- <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="user-list.php"><i class="fa fa-circle-o"></i> User List</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Members</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="member-list.php"><i class="fa fa-circle-o"></i> Member List</a></li>
                <li><a href="add-member.php"><i class="fa fa-circle-o"></i> Add Member</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Packages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="package-list.php"><i class="fa fa-circle-o"></i> Packages List</a></li>
                <li><a href="add-package.php"><i class="fa fa-circle-o"></i>Add Packages</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="product-list.php"><i class="fa fa-circle-o"></i>Products List</a></li>
                <li><a href="add-product.php"><i class="fa fa-circle-o"></i>Add Product</a></li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Trainer</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="trainer-list.php"><i class="fa fa-circle-o"></i>Trainer List</a></li>
                <li><a href="add-trainer.php"><i class="fa fa-circle-o"></i>Add Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Workout Plan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="workout-list.php"><i class="fa fa-circle-o"></i>Workout List</a></li>
                <li><a href="add-workout-plan.php"><i class="fa fa-circle-o"></i>Add Workout Plan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Notices</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="notice-list.php"><i class="fa fa-circle-o"></i>Notice List</a></li>
                <li><a href="add-notice.php"><i class="fa fa-circle-o"></i>Add Notice</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Trainer Applications</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="trainer-application-list.php"><i class="fa fa-circle-o"></i>Application List</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Workout Plans</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="workout-schedule-list.php"><i class="fa fa-circle-o"></i>Schedule List</a></li>
              </ul>
            </li>
         
         
         
         
            <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li> -->
            <!--<li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>-->
          </ul>
          <li><a href="logout.php"><i class="fa fa-circle-o"></i> Logout</a></li>

        </section>
        <!-- /.sidebar -->
      </aside>
      <script>
function logout() {
     var r = confirm("Do you really want to log out?");
    if (r==true)
        {
        <?php
          if (!empty($_SESSION["username"])) {
            unset($_SESSION["username"]);
            session_destroy();
          }
            
        //header('Location: login.php');
        ?>
         window.location.href = 'login.php'
        } 
}
</script>