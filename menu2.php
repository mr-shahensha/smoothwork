<a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>SmoothWork</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" <?php if($pgnm=="home"){?> class="active"<?php }?>>Home</a></li>
          <li><a href="services.php" <?php if($pgnm=="Services"){?> class="active"<?php }?>>Services</a></li>
          <li><a href="mycart.php" <?php if($pgnm=="My cart"){?> class="active"<?php }?>>My cart</a></li>
          <li><a href="bookings.php"<?php if($pgnm=="My bookings"){?> class="active"<?php }?>>My Bookings</a></li>
          <li class="dropdown"><a href="#"><span><?php 
           
           $fld1x['custnum'] = $_SESSION['id'];
           $op1x['custnum'] = "=, ";
           $list1x  = new Init_Table();
           $list1x->set_table("main_customer_setup", "sl");
           $rowx = $list1x->search_custom($fld1x, $op1x, '', array('sl' => 'ASC'));
           $path1 = "";
           foreach ($rowx as $valuex) {
           }
           echo $valuex['custnm'];
           ?></span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">View Profile</a></li>
              <li><a href="logoff.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </nav><!-- .navbar -->