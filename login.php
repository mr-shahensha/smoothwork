<?PHP
require_once("include.class.php");
if (isset($_POST["submit"])) {
    $rememberMe = "";
    $username11 = $_POST["username"];
    $password1 = md5($_POST["password"]);

    $fld1['username'] = $username11;
    $op1['username'] = "=,  ";
    $list1  = new Init_Table();
    $list1->set_table("main_signup", "sl");
    $group = $list1->search_custom($fld1, $op1, '', array('sl' => 'DESC'));
    foreach ($group as $key => $ptp) {
        $username1 = $ptp['username'];
    }




    $SIP = $_SERVER['REMOTE_ADDR'];
    $dttm = date('Y-m-d H:i:s A');
    if (isset($_POST["rememberMe"])) {
        $rememberMe = $_POST["rememberMe"];
    }
    $SIP = $_SERVER['REMOTE_ADDR'];
    if ($rememberMe == "rememberMe") {
        $rememberMe = "1";
    } else {

        $rememberMe = "0";
    }

    $test  = new Init_Table();
    $test->set_table("main_signup", "username");
    $test->username = $username1;
    $test->find();
    if ($test->variables != "") {
        if ($test->actnum == "0" && ($test->userlevel == 20)) {
            if ($test->numloginfail <= 5) {
                if ($test->pass == $password1) {

                    $test->set_table("main_signup", "username");
                    $test->username = $username1;
                    $test->lastlogin = date('Y-m-d H:i:s A');
                    $test->numloginfail = '0';
                    $test->Save();

                    session_start();
                    session_unset();
                    $_SESSION["pass"] = $password1;
                    $_SESSION["id"] = $username1;
                    $_SESSION["lastlog"] = date('Y-m-d H:i:s A');

                    $test->set_table("main_log", "sl");
                    $test->username = $username1;
                    $test->ip = $SIP;
                    $test->intime = $dttm;
                    $test->laccessed = $dttm;
                    $test->Create();
                    if ($rememberMe == "1") {
                        setcookie("rememberCookieUname", $username1, (time() + 604800));
                        setcookie("rememberCookiePassword", md5($password1), (time() + 604800));
                    }
                    $_SESSION["chkssn"] = date('Y-m-d');
                    header("Location: index.php");
                    

                } else {

?>
                    <script>
                        alert("Password Missmatched.....");
                        window.document.location = "login.php";
                    </script>
                <?php
                    //die(header("location:login.php"));
                }
            } else {

                ?>
                <script>
                    alert("Account Under Attack.....");
                    window.document.location = "login.php";
                </script>
            <?php
                //die(header("location:login.php"));
            }
        } else {

            ?>
            <script>
                alert("Account Not Activated.....");
                window.document.location = "login.php";
            </script>
        <?php
            //die(header("location:login.php"));
        }
    } else {
        ?>
        <script>
            alert("Data Not Found.....");
            window.document.location = "login.php";
        </script>
<?php
        //die(header("location:login.php"));

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $pgnm = "Login"; ?>
  <title>SmoothWork /<?php echo $pgnm; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <?php include("menu.php"); ?>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Login Form</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Login </li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="login-wrap p-4 p-md-5">
              <div class="icon d-flex align-items-center justify-content-center">
                <i class="bi bi-person" style="color:#fff; font-size:45px;"></i>
              </div>
              <h3 class="text-center mb-4">Have an account?</h3>
              <form action="login.php" class="login-form" method="post">
                <div class="form-group">
                  <input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
                </div>
                <div class="form-group d-flex">
                  <input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5" value="Get Started">
                </div>
                <div class="form-group d-md-flex" style="margin-top:90px;">
                  <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                      <input type="checkbox" checked>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="w-50 text-md-right">
                    <a href="#">Forgot Password</a>
                  </div>
                </div>
                <a style="cursor:pointer;" href="custsignup.php" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Sign up as Customer</a>
                <a href="bissignup.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Sign up as Business</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Logis</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4 style="color:#fff;">Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4 style="color:#fff;">Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4 style="color:#fff;">Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Logis</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>