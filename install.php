<?php
include 'functions.php';
include 'vendor/Parsedown.php';

$domain = GetDomain();
$device = $_GET['name'];
$crversion = $_GET['crversion'];

if (empty($crversion)) {
    header("Location: " . $domain . "/downloads#" . $device . "", true, 301);
    exit;
}

//define vars
$data = GetDeviceInfo($device, $crversion);
$oem = $data[0];
if (empty($oem)){
 header("Location: " . $domain , true, 301);
 exit;
}

$file = 'install_docs/' . $crversion . '/' . $device . '.md';
if (!file_exists($file)){
  header("Location: " . $domain , true, 301);
  exit;
}
$content = file_get_contents($file);
$devicename = $data[1]['device'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - How to install crDroid <?php echo $crversion; ?> for <?php echo $devicename; ?> (<?php echo $device; ?>)</title>
  <meta name="description" content="install crDroid <?php echo $crversion; ?> for <?php echo $devicename; ?> (<?php echo $device; ?>)">
  <meta name="keywords" content="crDroid, crDroid ROM, crDroid <?php echo $crversion; ?>, ROM, <?php echo $devicename; ?>, <?php echo $device; ?>">

  <!-- Favicons -->
  <link href="<?php echo $domain; ?>/img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo $domain; ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo $domain; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $domain; ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo $domain; ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo $domain; ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo $domain; ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Bootstrap dark mode -->
  <link id="dark-theme-style" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="<?php echo $domain; ?>/css/style.css" rel="stylesheet">

  <!-- Google verification -->
  <meta name="google-site-verification" content="v_DBWc21zWokjHdPNpABWYSkB3lSz6u7mPGXsmOPGt8" />

  <!-- Clickio -->
  <script async type="text/javascript" src="//clickiocmp.com/t/consent_232010.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NR3C0WDB8Q"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-NR3C0WDB8Q');
  </script>

  <!-- Google AdSense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9442732345409545" crossorigin="anonymous"></script>

  <!-- Copy button css -->
  <style>
    .code-container {
      position: relative;
    }

    .copy-btn {
      position: absolute;
      top: -4px;
      right: 0;
      opacity: 0.5;
    }

    .copy-btn:hover {
      opacity: 1;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!--<h1><a href="<?php echo $domain; ?>">crDroid</a></h1>-->
        <a href="<?php echo $domain; ?>"><img src="<?php echo $domain; ?>/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="<?php echo $domain; ?>">Home</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/downloads">Download</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/blog">Blog</a></li>
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

  <!-- ======= Intro Section ======= -->
  <section id="blog" class="d-flex align-items-center blogbg">

<div class="container">
  <div class="row">
    <div class="d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
      <div>
        <h1>Install crDroid <?php echo $crversion; ?> for <?php echo $devicename; ?></h1>
        <h3><?php echo $device; ?></h3>
      </div>
    </div>
  </div>
</div>

</section><!-- End intro -->

  <main id="main">

    <section class="inner-page">
      <div class="container">

        <div class="pb-2">
            <a href="<?php echo $domain; ?>/<?php echo $device; ?>/<?php echo $crversion; ?>"><i class='bx bx-chevrons-left'></i> Back to download page</a>
        </div>

        <!-- List device info -->
        <div class="row">
          <div class="col-md col-lg">
			      <div class="col-md-12">
              <div class="alert alert-danger" role="alert">
                <div>
                  <b>Warning:</b> The provided instructions are for crDroid <?php echo $crversion; ?>. These will only work if you follow every section and step precisely.<br>
                  Do <b>not</b> continue after something fails!
                </div>
              </div>
              <div class="alert alert-warning" role="alert">
                <b>crDroid</b> is not responsible for any damage you made to your device. You have been warned!
              </div>

              <div>
                <h2>Flashing instructions</h2>
                <br>
                <!-- Markdown parsing -->
                <?php
                  $Parsedown = new Parsedown();
                  echo $Parsedown->text($content);
                ?>
              </div>

              <div>
                <h2>Require support?</h2>
                For support questions, check out forum or telegram links found on our <a href="<?php echo $domain; ?>/<?php echo $device; ?>/<?php echo $crversion; ?>">download page</a>, useful links area.<br>
              </div>

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
              <a href="#" title="Change privacy policy" onclick="if(window.__lxG__consent__!==undefined&&window.__lxG__consent__.getState()!==null){window.__lxG__consent__.showConsent()} else {alert('This function only for users from European Economic Area (EEA)')}; return false"><i class='bx bx-check-shield' ></i></a>
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
  <script src="<?php echo $domain; ?>/vendor/aos/aos.js"></script>
  <script src="<?php echo $domain; ?>/vendor/jquery/jquery-3.6.0.js"></script>
  <script src="<?php echo $domain; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $domain; ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo $domain; ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo $domain; ?>/vendor/bootstrap-dark/js/darkmode.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo $domain; ?>/js/main.js"></script>
  <script src="<?php echo $domain; ?>/js/peel1.js" type="text/javascript"></script>

  <!-- Copy button js -->
  <script>
    $(document).ready(function() {
        $('pre code').each(function() {
          var codeText = $(this).text().trim();
          var copyButton = $('<button class="btn btn-secondary btn-sm copy-btn"><i class="bx bx-copy"></i></button>');

          // Wrap the code content and the copy button in a container
          var codeContainer = $('<div class="code-container"></div>');
          codeContainer.append($(this).contents());
          codeContainer.append(copyButton);

          // Replace the code content with the code container
          $(this).html(codeContainer);

          copyButton.click(function() {
            copyToClipboard(codeText);
            $(this).html('<i class="bx bx-check"></i> Copied');
            setTimeout(function() {
              copyButton.html('<i class="bx bx-copy"></i>');
            }, 2000);
          });
        });

        function copyToClipboard(text) {
          var $temp = $('<input>');
          $('body').append($temp);
          $temp.val(text).select();
          document.execCommand('copy');
          $temp.remove();
        }
      });
  </script>
</body>

</html>
