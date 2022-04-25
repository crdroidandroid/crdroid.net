<?php
  include 'functions.php';
  $domain = GetDomain();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - increase performance and reliability over stock Android for your device</title>
  <meta name="description" content="official crDroid ROM website">
  <meta name="keywords" content="crDroid, crDroid ROM, ROM">

  <!-- Favicons -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Bootstrap dark mode -->
  <link id="dark-theme-style" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Google verification -->
  <meta name="google-site-verification" content="v_DBWc21zWokjHdPNpABWYSkB3lSz6u7mPGXsmOPGt8" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6432969-5"></script>
  <script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-6432969-5');
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!--<h1><a href="<?php echo $domain; ?>">crDroid</a></h1>-->
        <a href="<?php echo $domain; ?>"><img src="img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/translations">Translations</a></li>
          <li><a class="nav-link" href="https://stats.crdroid.net">Stats</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/donate">Support us</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/legal">Legal</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <!--<li><a class="getstarted" href="dl.php">Download</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a class="switcher" role="button" id="theme-toggler" onclick="toggleTheme()"></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Let's get started with crDroid</h1>
            <h2>Improve the performance, reliability and customizability of your Android device</h2>
            <a href="<?php echo $domain; ?>/downloads" class="download-btn"><i class='bx bx-cloud-download'></i> Download for your device</a>
            <a href="https://github.com/crdroidandroid/android" class="download-btn"><i class='bx bxl-github' ></i> Build from source</a>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
          <p>With crDroid you get lots of customization options not compromising on performance or security</p>
        </div>

        <div class="row no-gutters">
          <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class='bx bxs-mobile' ></i>
                  <h4>Status Bar & Quick Settings</h4>
                  <p>Customize what icons you see as well as effects and number of QS rows and columns</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class='bx bxs-lock-alt' ></i>
                  <h4>Lock screen</h4>
                  <p>Your lockscreen is what your friends will see first, so impress them from the beginning</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class='bx bxs-joystick-button' ></i>
                  <h4>Navigation and buttons</h4>
                  <p>Choose from gesture nav or old school nav buttons as well as customize what your hardware buttons do</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class='bx bxs-paint-roll' ></i>
                  <h4>User interface</h4>
                  <p>Your phone, your style... Set dark mode on or off and choose your colors</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class='bx bxs-volume-full' ></i>
                  <h4>Notifications and sounds</h4>
                  <p>Set how notifications behave and how differect parts of the UI react to your sounds</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                  <i class='bx bxs-dashboard' ></i>
                  <h4>Miscellaneous</h4>
                  <p>Game mode, smart charging, pocket detection, yes you can customize that also</p>
                </div>
              </div>
            </div>
          </div>
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="img/features.png" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="img/details-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Always up-to-date</h3>
            <p class="fst-italic">
              Being up to date means a lot for us
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Security is always a priority</li>
              <li><i class="bi bi-check"></i> At least once a month security updates pushed to source</li>
              <li><i class="bi bi-check"></i> We cherish and treasure the privacy of our users</li>
            </ul>
            <p>
              As soon as we build and test every release, we will push updates
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="img/details-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Source control</h3>
            <p>
              crDroid is maintained by a small group of developers.
            </p>
            <p>
              Those developers donate their free time towards the project. We do our best to bring a quality OS to your device, while working a real job on the side in most cases.
            </p>
            <p>
              Our project will always be open source so that others can build and contribute also. We do encourage everyone to contribute on our GitHub. 
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some crDroid settings screenshots so you know what you can customize on the go</p>
        </div>

      </div>

      <div class="container-fluid" data-aos="fade-up">
        <div class="gallery-slider swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="img/gallery/gallery-1.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-1.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-2.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-2.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-3.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-3.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-4.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-4.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-5.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-5.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-6.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-6.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-7.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-7.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-8.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-8.webp" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="img/gallery/gallery-9.webp" class="gallery-lightbox" data-gall="gallery-carousel"><img src="img/gallery/gallery-9.webp" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">

          <h2>Frequently Asked Questions</h2>

        </div>

        <div class="accordion-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">How do I become maintainer for crDroid? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                <p>
                So you want to make your build official and become a crDroid maintainer?<br> Just head over to our GitHub in order to get more info. <br>Note that we only support Android 12 builds for new devices.<br>
                </p>
                <a href='https://github.com/crdroidandroid/android/blob/12.0/README.mkdn#3-how-to-become-an-official-maintainer' class="btn btn-info gothere">Go there now!</a>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Are you going to add more features? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  No way... Nah... just kidding... We always try to add more and more features with stability and security first in mind. 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">What base is crDroid using? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  crDroid uses LineageOS as base. We try to keep in sync with LineageOS source while also adding lots of customizations for you to choose from.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed">Why the "eye" and not something else? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  The crDroid logo is being used since the first maintainer "Cristiano Matos" added it at the beginning of the project and represents a drawing his kid did at school one day.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class='footerbg' id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg col-md-6 footer-contact">
            <h3>crDroid Android Project</h3>
            <p>
              <strong>Email:</strong> contact@crdroid.net<br>
            </p>
            <div class="social-links mt-3">
              <a href="https://t.me/crDroidAndroid"><i class='bx bxl-telegram'></i></a>
              <a href="https://github.com/crdroidandroid"><i class='bx bxl-github' ></i></a>
              <a href="https://patreon.com/crdroidandroid"><i class='bx bxl-patreon'></i></a>
              <a href="https://paypal.me/crdroidandroid"><i class='bx bxl-paypal' ></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright 2016-<?php echo date("Y");?> <strong><span>crDroid Android</span></strong>.
      </div>
      <div class="credits">
        Designed by <a href="https://gwolf2u.com">Lup Gabriel</a> and hosted @ <a href="https://scopehosts.com">ScopeHosts</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/jquery/jquery-3.6.0.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/bootstrap-dark/js/darkmode.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>
</body>

</html>
