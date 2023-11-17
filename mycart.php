<?php
include "include.class.php";
include "back.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php $pgnm = "My cart"; ?>
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

    <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <?php include("menu2.php"); ?>

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
                            <h2>Pricing</h2>
                            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Pricing</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Horizontal Pricing Section ======= -->
        <section id="horizontal-pricing" class="horizontal-pricing pt-0">
            <div class="container" data-aos="fade-up">
                <div class="section-header"></div>
                <?php
                $fld2['prchby'] = $_SESSION['id'];
                $op2['prchby'] = "=, and";
                $fld2['stat'] = '0';
                $op2['stat'] = "=,";
                $list2  = new Init_Table();
                $list2->set_table("main_cart", "sl");
                $row2 = $list2->search_custom($fld2, $op2, '', array('sl' => 'ASC'));
                $pdo2 = new MainPDO();
                foreach ($row2 as $value2) {

                    $sl = $value2['sl'];

                ?>
                    <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">

                        <div class="col-lg-4 d-flex align-items-center justify-content-center">
                            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400_opt_1/aa8625109287767.5fd08439c7676.jpg " alt="" width="100px"><br>
                            <h5><?php
                                $fld['s_id'] = $value2['servnm'];
                                $op['s_id'] = "=,";
                                $list  = new Init_Table();
                                $list->set_table("main_service_setup", "sl");
                                $row = $list->search_custom($fld, $op, '', array('sl' => 'ASC'));
                                $pdo = new MainPDO();
                                foreach ($row as $value) {
                                }
                                echo $value['snm'];
                                ?></h5>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center">
                            <h4><sup>$</sup><?php echo $value2['price']; ?><span> / service</span></h4>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center">
                            <ul>
                                <li><i class="bi bi-check"></i> Assign by :
                                    <?php
                                    $fldx['eid'] =  $value2['assign'];
                                    $opx['eid'] = "=,";
                                    $listx  = new Init_Table();
                                    $listx->set_table("main_employee_setup", "sl");
                                    $rowx = $listx->search_custom($fldx, $opx, '', array('sl' => 'ASC'));
                                    $pdox = new MainPDO();
                                    foreach ($rowx as $valuex) {
                                    }

                                    echo $valuex['enm'];
                                    ?></li>
                                <li><i class="bi bi-check"></i> Booking Date :
                                    <?php echo $value2['bdt']; ?></li>
                                <li><i class="bi bi-check"></i> From time :
                                    <?php
                                    $dateTime = new DateTime($value2['ftm']);
                                    $fttm = $dateTime->format('h:i A');
                                    echo $fttm;
                                    ?>
                                </li>
                                <li><i class="bi bi-check"></i> To time :
                                    <?php
                                    $dateTime2 = new DateTime($value2['ttm']);
                                    $fttm2 = $dateTime2->format('h:i A');
                                    echo $fttm2;
                                    ?></li>
                            </ul>
                            &nbsp;<div id="rmve<?php echo $value2['cart_id']; ?>"><a class="btn btn-sm btn-danger" onclick="rmv('<?php echo $value2['cart_id']; ?>')">Remove</a></div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </section><!-- End Horizontal Pricing Section -->
        <div class="row">
            <div id="mve<?php echo $_SESSION['id']; ?>">
                <div class="text-center"><a class="btn btn-success btn-lg" onclick="buy('<?php echo $_SESSION['id']; ?>')">Buy Now</a>
                </div>
            </div>
        </div>
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
<script>
    function rmv(crt) {
        if (confirm('are you sure ?')) {
            $('#rmve' + crt).load('mvcrt.php?crt=' + crt + '&ssn=').fadeIn('fast');
        }
    }

    function buy(ssn) {
        if (confirm('are you sure ?')) {
            $('#mve' + ssn).load('mvcrt.php?ssn=' + ssn + '&crt=').fadeIn('fast');
        }
    }
</script>

</html>