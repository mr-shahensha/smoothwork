<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "admin/common.php";
include "admin/include.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $pgnm="Sign up as Business";?>
  <title>SmoothWork /<?php echo $pgnm;?></title>
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
              <h2>SIGN UP AS BUSINESS</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Signup </li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="login-wrap p-4 p-md-5">
              <div class="icon d-flex align-items-center justify-content-center">
                <i class="bi bi-person" style="color:#fff; font-size:45px;"></i>
              </div>
              <h3 class="text-center mb-4">Join us today so that <br> you can build the tomorrow</h3>
              <form class="form-bordered login-form" action="submit_pages.php" method="POST">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cname">Name of Company</label>
                      <input type="text" id="cname" name="cname" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="oname">Name of the owner</label>
                      <input type="text" id="oname" name="oname" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="servcat">Service Category</label>
                      <select id="servcat" name="servcat" class="form-control rounded-left" required>
                        <option value="">*****Select*****</option>
                        <?php

                        $fld1['sl'] = '0';
                        $op1['sl'] = ">, ";

                        $list1  = new Init_Table();
                        $list1->set_table("main_service_category", "sl");
                        $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
                        $path1 = "";
                        foreach ($row as $value) {
                          $cnt++;
                          $sl = $value['sl'];
                        ?>
                          <option value="<?php echo $value['cat_id']; ?>"><?php echo $value['cat_nm']; ?></option>

                        <?php
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="profadd">Proffesional Address</label>
                      <input type="profadd" name="profadd" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="noem">No of employee</label>
                      <input type="text" id="noem" name="noem" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="govid">Government ID number</label>
                      <input type="text" name="govid" id="govid" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="offcnum">Offical contact number (This will be your login id)</label>
                      <input type="text" id="offcnum" name="offcnum" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="offweb">Offical website</label>
                      <input type="text" id="offweb" name="offweb" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="logpas">Login password</label>
                      <input type="password" id="logpas" name="logpas" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="confopas">Confirm password</label>
                      <input type="text" id="confopas" name="confopas" class="form-control rounded-left" placeholder="Type Here" required>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="table_name" value="main_service_provider">
                <input type="hidden" name="page_name" value="bissignup.php">
                <div class="form-group">
                  <input type="submit"  class="btn btn-primary rounded submit p-3 px-5" value="Join me now" name="submit">
                </div>
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