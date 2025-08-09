<?php
  include '../functions.php';
  include '../vendor/Parsedown.php';
  $domain = GetDomain();
  $article = $_GET['article'];
  $file = 'articles/' . $article . '.md';
  if (!file_exists($file)){
    exit;
  }
  $file_data = array_slice(file($file), 1, 3);
  $title = trim(str_replace('title:', '', $file_data[0]));
  $description = trim(str_replace('description:', '', $file_data[1]));
  $author = str_replace('author:', '', $file_data[2]);
  $articledate = date_create(substr(basename($file, ".md"),0,10));
  $content = file_get_contents($file);
  $content = explode("\n", $content);
  array_splice($content, 0, 5);
  $newcontent = implode("\n", $content);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - <?php echo $title;?></title>
  <meta name="description" content="<?php echo $description;?>">
  <meta name="keywords" content="crDroid, crDroid ROM, ROM">

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

  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('consent', 'default', {
          'ad_storage': 'granted',
          'analytics_storage': 'granted',
          'functionality_storage': 'granted',
          'personalization_storage': 'granted',
          'security_storage': 'granted',
          'ad_user_data': 'granted',
          'ad_personalization': 'granted',
          'wait_for_update': 1500
      });
      gtag('consent', 'default', {
          'region': ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IS', 'IE', 'IT', 'LV', 'LI', 'LT', 'LU', 'MT', 'NL', 'NO', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB', 'CH'],
          'ad_storage': 'denied',
          'analytics_storage': 'denied',
          'functionality_storage': 'denied',
          'personalization_storage': 'denied',
          'security_storage': 'denied',
          'ad_user_data': 'denied',
          'ad_personalization': 'denied',
          'wait_for_update': 1500
      });
      gtag('set', 'ads_data_redaction', false);
      gtag('set', 'url_passthrough', false);
    </script>

  <!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
  <script type="text/javascript" src="https://www.termsfeed.com/public/cookie-consent/4.2.0/cookie-consent.js" charset="UTF-8"></script>
  <script type="text/javascript" charset="UTF-8">
    document.addEventListener('DOMContentLoaded', function () {
      cookieconsent.run({
        "notice_banner_type":"simple",
        "consent_type":"express",
        "palette":"light",
        "language":"en",
        "page_load_consent_levels":["strictly-necessary"],
        "notice_banner_reject_button_hide":false,
        "preferences_center_close_button_hide":false,
        "page_refresh_confirmation_buttons":false,
        "website_name":"crDroid Android",
        "website_privacy_policy_url":"https://crdroid.net/legal",
        "callbacks": {
          "scripts_specific_loaded": (level) => {
            switch(level) {
              case 'targeting':
                gtag('consent', 'update', {
                  'ad_storage': 'granted',
                  'ad_user_data': 'granted',
                  'ad_personalization': 'granted',
                  'analytics_storage': 'granted'
                });
                break;
            }
          }
        },
        "callbacks_force": true
      });
    });
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script type="text/plain" data-cookie-consent="tracking" async src="https://www.googletagmanager.com/gtag/js?id=G-NR3C0WDB8Q"></script>
  <script type="text/plain" data-cookie-consent="tracking">
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
        <a href="<?php echo $domain; ?>"><img src="<?php echo $domain; ?>/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="<?php echo $domain; ?>">Home</a></li>
          <li><a class="nav-link" href="<?php echo $domain; ?>/downloads">Download</a></li>
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


    <!-- ======= Blog Section ======= -->
    <section id="blog" class="d-flex align-items-center blogbg">

    <div class="container">
      <div class="row">
        <div class="d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1><?php echo $title;?></h1>
            <h3><?php echo $description;?></h3>
            <h2>Written on <?php echo date_format($articledate, "M d, Y");?> by <?php echo $author;?></h2>
          </div>
        </div>
      </div>
    </div>

    </section><!-- End Blog -->

  <main id="main">

    <section class="inner-page">
      <div class="container">

        <div class="pb-2">
          <a href="<?php echo $domain; ?>/blog"><i class='bx bx-chevrons-left'></i> Back to blog</a>
        </div>
        <div>
          <?php
            echo $filedata;
            $Parsedown = new Parsedown();
            echo $Parsedown->text($newcontent);
          ?>
        </div>
        <div>
          <div id="disqus_thread"></div>
          <script>
              /**
              *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
              *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
              var disqus_config = function () {
              this.page.url = '<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>';  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = '<?php echo $title;?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://crdroid-android.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
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
              <a href="#" id="open_preferences_center" title="Update cookies preferences"><i class='bx bx-check-shield' ></i></a>
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

  <!-- Disquss -->
  <script id="dsq-count-scr" src="//crdroid-android.disqus.com/count.js" async></script>
</body>

</html>
