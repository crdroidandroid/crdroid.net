<?php
  include 'functions.php';
  $domain = GetDomain();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - help out with translations</title>
  <meta name="description" content="translations for crDroid Android project">
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6432969-5"></script>
  <script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-6432969-5');
  </script>

  <!-- Google AdSense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9442732345409545" crossorigin="anonymous"></script>
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

  <main id="main">

    <section class="inner-page">
      <div class="container">

	  <div class="section-title">
          <p><br><br></p>
          <h2>We need your help</h2>
          <p>crDroid needs your help translate all our project to be able to reach out to more and more of you.</p>
          <p>Want to help, why not check out below for more info, is really easy.</p>
        </div>
        
		<div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">
			<a target="_blank" style="text-decoration: none;" href="https://crowdin.com/project/crdroid-translation">
            <img src="img/svg/crdroid-settings.svg" alt="img" class="img-fluid translation">
            <h4>crDroid Settings</h4>
            <p>This is the place where mission control is running<br><img src="https://d322cqt584bo4o.cloudfront.net/crdroid-translation/localized.svg"></p>
			</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">
			<a target="_blank" style="text-decoration: none;" href="https://crowdin.com/project/crdroid-frameworks-base">
            <img src="img/svg/framework.svg" alt="img" class="img-fluid translation">
            <h4>Frameworks Base</h4>
            <p>We need a way to link with Android API don't we<br><img src="https://d322cqt584bo4o.cloudfront.net/crdroid-frameworks-base/localized.svg"></p>
			</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">
			<a target="_blank" style="text-decoration: none;" href="https://crowdin.com/project/crdroid-home">
            <img src="img/svg/launcher.svg" alt="img" class="img-fluid translation">
            <h4>crDroid Home</h4>
            <p>Our Launcher from where you start favorite apps<br><img src="https://d322cqt584bo4o.cloudfront.net/crdroid-home/localized.svg"></p>
			</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
			<a target="_blank" style="text-decoration: none;" href="https://crowdin.com/project/crdroid-updater">
            <img src="img/svg/update.webp" alt="img" class="img-fluid translation">
            <h4>crDroid Updater</h4>
            <p>Things need to be updated and in your language, no?<br><img src="https://badges.crowdin.net/crdroid-updater/localized.svg"></p>
			</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
			<a target="_blank" style="text-decoration: none;" href="https://crowdin.com/project/crdroid-gaming-mode">
            <img src="img/svg/game-mode.svg" alt="img" class="img-fluid translation">
            <h4>crDroid Gaming Mode</h4>
            <p>Get most out of your phone while gaming using out GameMode<br><img src="https://badges.crowdin.net/crdroid-gaming-mode/localized.svg"></p>
			</a>
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
        Designed by <a href="https://gwolf2u.com">Lup Gabriel</a> and hosted @ <a href="https://scopehosts.com">ScopeHosts</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- ======= Ads blocker ======= -->
  <div class="blocker-wrapper">
    <div class="content">
      <div class="warn-icon">
        <span class="icon"><i class='bx bx-shield-x' ></i></span>
      </div>
      <h2>AdBlock Detected!</h2>
      <p>crDroid server is made possible by displaying ads on our website. Please support us by whitelisting our url.</p>
      <div class="blocker-btn">
        <div class="bg-layer disable"></div>
        <button id="timed">Please wait 5 seconds...</button>
      </div>
    </div>
  </div>
  <!-- End Ads blocker -->

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