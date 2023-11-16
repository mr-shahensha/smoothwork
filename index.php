<!DOCTYPE html>
<html lang="en">
<?php 
include "include.class.php";
include "back.php";
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $pgnm = "home"; ?>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <?php include("menu2.php"); ?>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Your Lightning Fast Delivery Partner</h2>
          <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non
            praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum
            maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>

          <form action="services.php" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <input type="text" class="form-control" name="srvs" placeholder="Search a service">
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
          </form>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Business</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Service providers</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Bookings</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Customers</p>
                </div>
              </div><!-- End Stats Item -->

            </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <!-- new card -->

  <section class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col text-center mb-5">
          <div class="section-header">
            <span>Category</span>
            <h2>Category</h2>

          </div>
        </div>
      </div>
      <div class="row">
        <?php
        $fld1['sl'] = '0';
        $op1['sl'] = ">, ";

        $list1  = new Init_Table();
        $list1->set_table("main_service_category", "sl");
        $row = $list1->search_custom($fld1, $op1, 'limit 3', array('sl' => 'ASC'));
        $pdo = new MainPDO();
        foreach ($row as $value) {
          $sl = $value['sl'];
          $stat = $value['stat'];
        ?>
          <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?computer,design');">
              <img class="card-img d-none" src="https://source.unsplash.com/600x900/?computer,design" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
              <div class="card-img-overlay d-flex flex-column">
                <div class="card-body">
                  <small class="card-meta mb-2"><?php echo $value['cat_nm']; ?></small>
                  <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Creative Manner
                      Design Lorem Ipsum Sit Amet Consectetur dipisi?</a></h4>
                  <small><i class="far fa-clock"></i> October 15, 2020</small>
                </div>
                <div class="card-footer">
                  <div class="media">
                    <img class="mr-3 rounded-circle" src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80" alt="Generic placeholder image" style="max-width:50px">
                    <div class="media-body">
                      <h6 class="my-0 text-dark d-block">Oz Coruhlu</h6>
                      <small>Director of UI/UX</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php
        }
        ?>
      </div>
      <b><a href="#" class="link-underline-info" style="margin-left:500px;">Explore more &rarr;</a></b>

    </div>
  </section>
  <!--new card-->

  <main id="main">
        <!-- ======= Popular Section ======= -->
        <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Popular Services Accross The Platform</span>
          <h2>Popular Services Accross The Platform</h2>

        </div>

        <div class="row gy-4">
          <?php
          $fld2['sl'] = '0';
          $op2['sl'] = ">, and";
          $fld2['status'] = '0';
          $op2['status'] = "=, ";
          $list2  = new Init_Table();
          $list2->set_table("main_service_setup", "sl");
          $row2 = $list2->search_custom($fld2, $op2, '', array('count' => 'DESC'));
          $pdo2 = new MainPDO();
          foreach ($row2 as $value2) {
            $sl2 = $value2['s_id'];
          ?>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <div class="card-img">
                  <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
                </div>
                <h3><a href="service-details.php?sl=<?php echo base64_encode($sl2);?>" class="stretched-link"><?php echo $value2['snm']; ?></a></h3>
                <p><?php echo $value2['sdsc']; ?></p>
              </div>
            </div><!-- End Card Item -->
          <?php
          }
          ?>

        </div>

      </div>

    </section><!-- End Popular Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Browse More</span>
          <h2>Browser More</h2>

        </div>

        <div class="row gy-4">
          <?php
          $fld2['sl'] = '0';
          $op2['sl'] = ">, and";
          $fld2['status'] = '0';
          $op2['status'] = "=, ";
          $list2  = new Init_Table();
          $list2->set_table("main_service_setup", "sl");
          $row2 = $list2->search_custom($fld2, $op2, '', array('sl' => 'ASC'));
          $pdo2 = new MainPDO();
          foreach ($row2 as $value2) {
            $sl2 = $value2['sl'];
          ?>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <div class="card-img">
                  <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
                </div>
                <h3><a href="service-details.php?sl=<?php echo base64_encode($sl2);?>" class="stretched-link"><?php echo $value2['snm']; ?></a></h3>
                <p><?php echo $value2['sdsc']; ?></p>
              </div>
            </div><!-- End Card Item -->
          <?php
          }
          ?>

        </div>

      </div>

    </section><!-- End Services Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>SmoothWork</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta
            donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
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
        &copy; Copyright <strong><span>SmoothWork</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/SmoothWork-bootstrap-SmoothWorktics-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->
  <style>
    h1 {
      color: #fff;
    }

    .lead {
      color: #aaa;
    }

    .wrapper {
      margin: 10vh
    }

    .card {
      border: none;
      transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
      overflow: hidden;
      border-radius: 20px;
      min-height: 450px;
      box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

      @media (max-width: 768px) {
        min-height: 350px;
      }

      @media (max-width: 420px) {
        min-height: 300px;
      }

      &.card-has-bg {
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        background-size: 120%;
        background-repeat: no-repeat;
        background-position: center center;

        &:before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          background: inherit;
          -webkit-filter: grayscale(1);
          -moz-filter: grayscale(100%);
          -ms-filter: grayscale(100%);
          -o-filter: grayscale(100%);
          filter: grayscale(100%);
        }

        &:hover {
          transform: scale(0.98);
          box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
          background-size: 130%;
          transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

          .card-img-overlay {
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            background: rgb(255, 186, 33);
            background: linear-gradient(0deg, rgba(255, 186, 33, 0.5) 0%, rgba(255, 186, 33, 1) 100%);
          }
        }
      }

      .card-footer {
        background: none;
        border-top: none;

        .media {
          img {
            border: solid 3px rgba(255, 255, 255, 0.3);
          }
        }
      }

      .card-title {
        font-weight: 800
      }

      .card-meta {
        color: rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 2px;
      }

      .card-body {
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);


      }

      &:hover {
        .card-body {
          margin-top: 30px;
          transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        cursor: pointer;
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
      }

      .card-img-overlay {
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        background: rgb(255, 186, 33);
        background: linear-gradient(0deg, rgba(255, 186, 33, 0.3785889355742297) 0%, rgba(255, 186, 33, 1) 100%);
      }
    }

    @media (max-width: 767px) {}
  </style>
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