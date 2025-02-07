  <?php
  include 'functions.php';
  $domain = GetDomain();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - Support us</title>
  <meta name="description" content="support our project">
  <meta name="keywords" content="crDroid, crDroid ROM, ROM, crDroid download">

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
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NR3C0WDB8Q"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-NR3C0WDB8Q');
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
          <li><a class="nav-link" href="<?php echo $domain; ?>">Home</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/downloads">Download</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/blog">Blog</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/translations">Translations</a></li>
          <li><a class="nav-link" href="https://stats.crdroid.net">Stats</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/legal">Legal</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <!--<li><a class="getstarted" href="dl.php">Download</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a class="switcher" role="button" id="theme-toggler" onclick="toggleTheme()"></a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="inner-page">
      <div class="container">

	  <div class="section-title">
          <p><br><br></p>
          <h2>Support us</h2>
		      <h2><i class='bx bxs-heart' ></i></h2>
          <p>crDroid is a project that we are doing with passion and in our free time. </p>
		      <p>crDroid has always been about freedom, performance, and customization—and we want to keep it that way!</p>
          <p>Our build servers work hard to bring you fast, stable, and up-to-date ROMs, but maintaining and upgrading them requires ongoing resources.<p>
          <p>To continue growing and improving crDroid, we need your support! A small monthly donation helps us cover server costs, enhance build capacity, and keep crDroid free for everyone.</p>
          <p>Every contribution, no matter the size, makes a huge difference! 🙌</p>
        </div>
        
		<div class="row">

        <div class="col-md col-lg">
          <div class="feature-block">
		  	<button type="button" class="btn btn-primary btn-lg m-3" onclick="window.open('https://paypal.me/gwolf2u')"><i class='bx bxl-paypal' ></i> Donate on Paypal</button>
			<button type="button" class="btn btn-warning btn-lg m-3" onclick="window.open('http://patreon.com/join/crdroidandroid')"><i class='bx bxl-patreon' ></i> Become a Patreon</button>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-6">
            <div class="feature-block">
                <script src="https://donorbox.org/widget.js" paypalExpress="true"></script>
                <iframe src="https://donorbox.org/embed/crdroid-build-servers?default_interval=o" 
                        name="donorbox" 
                        allowpaymentrequest="allowpaymentrequest" 
                        seamless="seamless" 
                        frameborder="0" 
                        scrolling="no" 
                        height="900px" 
                        width="100%" 
                        style="max-width: 500px; min-width: 310px; max-height:none!important" 
                        allow="payment">
                </iframe>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-block">
                <script src="https://donorbox.org/widget.js" paypalExpress="true"></script>
                <iframe height="93px" 
                        width="100%" 
                        src="https://donorbox.org/embed/crdroid-build-servers?donor_wall_color=%23128aed&only_donor_wall=true&preview=true" 
                        style="width: 100%; max-width:500px; min-width:310px; min-height: 345px;" 
                        seamless="seamless" 
                        name="donorbox" 
                        frameborder="0" 
                        scrolling="no"> 
                </iframe>
            </div>
        </div>
    </div>

      </div>
    </section>

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
        Designed by <a href="https://gwolf2u.com">Lup Gabriel</a>, buildservers powered by <a href="https://www.interserver.net/r/836686">InterServer</a> and website hosted @ <a href="https://scopehosts.com">ScopeHosts</a>
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
