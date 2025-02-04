<?php
include 'functions.php';

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
$devicename = $data[1]['device'];
$telegram = $data[1]['telegram'];
$forum = $data[1]['forum'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - Dedicated support for <?php echo $devicename; ?> (<?php echo $device; ?>)</title>
  <meta name="description" content="support for <?php echo $devicename; ?> (<?php echo $device; ?>)">
  <meta name="keywords" content="crDroid, crDroid ROM, crDroid <?php echo $crversion; ?>, ROM, <?php echo $devicename; ?>, <?php echo $device; ?>">

  <!-- Favicons -->
  <link href="<?php echo $domain; ?>/img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- Ads -->
  <meta name="monetag" content="8cacee2e5aae15724ef27453b36dc9a4">
  <script src="https://kulroakonsu.net/88/tag.min.js" data-zone="129481" async data-cfasync="false"></script>

  <!-- Custom CSS for styling links -->
  <style>
    .support-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 20px;
      color: #fff;
      background-color: #007bff;
      border: 1px solid #007bff;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .support-link i {
      font-size: 5rem; /* Large icon */
      margin-bottom: 10px;
    }

    .support-link h2 {
      font-size: 1.25rem;
      margin: 0;
    }

    .support-link:hover {
      background-color: transparent;
      color: #007bff;
      text-decoration: none;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
      .support-link {
        padding: 15px;
      }
      .support-link h2 {
        font-size: 1rem;
      }
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
        <h1>Need support for <?php echo $devicename; ?> (<?php echo $device; ?>) ?</h1>
      </div>
    </div>
  </div>
</div>

</section><!-- End intro -->

  <main id="main">
    <section class="inner-page">
      <div class="container">
        <div class="pb-2">
          <a href="<?php echo $domain; ?>/<?php echo $device; ?>/<?php echo $crversion; ?>">
            <i class='bx bx-chevrons-left'></i> Back to download page
          </a>
        </div>

        <!-- List device info -->
        <div class="row">
          <div class="col-12">
            <h3>Whether you’re new to crDroid or a long-time user, you can reach us as follows</h3>
          </div>
          
          <?php if (!empty($telegram)): ?>
            <div class="col-md-6 col-sm-12 mt-4">
              <a href="<?php echo $telegram; ?>" class="support-link" target="_blank">
                <i class='bx bxl-telegram'></i>
                <h4>Group for <?php echo $devicename; ?></h4>
                <p>Get dedicated support for your device on Telegram. This group connects you with experienced users and developers for device-specific discussions</p>
              </a>
            </div>

            <div class="col-md-6 col-sm-12 mt-4">
              <a href="<?php echo $forum; ?>" class="support-link" target="_blank">
                <i class='bx bx-comment-dots'></i>
                <h4>Dedicated Forum</h4>
                <p>Find device-specific threads and discussions on the forum. Perfect for in-depth troubleshooting and guidance tailored to your device.</p>
              </a>
            </div>

          <?php else: ?>
            <div class="col-md-12 col-sm-12 mt-4 text-center">
              <a href="<?php echo $forum; ?>" class="support-link" target="_blank">
                <i class='bx bx-comment-dots'></i>
                <h4>Dedicated Forum</h4>
                <p>Find device-specific threads and discussions on the XDA forum. Perfect for in-depth troubleshooting and guidance tailored to your device.</p>
              </a>
            </div>
          <?php endif; ?>

          <div class="col-md-6 col-sm-12 mt-4">
            <a href="https://t.me/crDroidAndroid" class="support-link" target="_blank">
              <i class='bx bxl-telegram'></i>
              <h4>crDroid Community</h4>
              <p>A general space to connect, discuss, and share experiences with other crDroid users. Ideal for non-device-specific topics and overall community support.</p>
            </a>
          </div>
          
          <div class="col-md-6 col-sm-12 mt-4">
            <a href="https://t.me/crDroidUpdates" class="support-link" target="_blank">
              <i class='bx bxl-telegram'></i>
              <h4>crDroid ROM Updates</h4>
              <p>Stay up-to-date with everything crDroid. This channel provides notification-only updates, keeping you informed of new builds and latest updates.</p>
            </a>
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
