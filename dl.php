<?php
  include 'functions.php';
  $domain = GetDomain();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - Download crDroid for supported devices</title>
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

  <main id="main">

    <section class="inner-page">
      <div class="container">

        <div class="section-title">
          <p><br><br></p>
          <h2>Ready to download?</h2>
          <p>Below you can find a list with official supported devices.</p>
          <p>Choose your device and get started using crDroid</p>
        </div>

        <!-- List devices -->
        <div class="row">

        <div class="input-group mb-3">
        <div class="input-group-prepend shadow">
          <span class="input-group-text" id="inputGroup-sizing-default">Search device</span>
        </div>
        <input type="text" class="form-control shadow" aria-label="Search device" id="search" aria-describedby="inputGroup-sizing-default">
      </div>

        <div class="center pb-3">
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9442732345409545" crossorigin="anonymous"></script>
          <!-- Header -->
          <ins class="adsbygoogle"
              style="display:block"
              data-ad-client="ca-pub-9442732345409545"
              data-ad-slot="5655936532"
              data-ad-format="auto"
              data-full-width-responsive="true"></ins>
          <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>

        <?php
        $json_array = json_decode(file_get_contents('devices_handler/compiled.json'), true);

        //fast go to OEM
        echo "<div class='OEMS'>";
        foreach($json_array as $key => $arrays){
          echo "<a href='#" . $key . "' class='btn btn-secondary scrollto m-1'>" . $key . "</a>";
        }
        echo "</div>";
        
        echo '<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="listOutdated" onchange="filterVersions()">
                    <label class="form-check-label" for="listOutdated">List outdated crDroid revisions</label>
                </div>
            </div>
        </div>
      </div>';

        foreach($json_array as $key => $arrays){
            echo "<div id='" . $key . "' class='oem'><h1><i class='bx bx-chevrons-left' ></i>" . $key . "<i class='bx bx-chevrons-right' ></i></h1></div>";
            foreach($arrays as $devicecodename => $devicename){
                echo "
                <div class='col-lg-3 mb-4 device'>
                <div class='card border-secondary shadow' id='" . $devicecodename . "'>
                  <h5 class='card-header text-center'>" . $devicecodename . "</h5>
                ";
                //echo $devicecodename . "<br>";
                $img = null;
                $smallImgPath = "img/devices/" . $devicecodename . "-small.webp";
                $largeImgPath = "img/devices/" . $devicecodename . ".webp";

                if (file_exists($smallImgPath)) {
                    $img = "<div class='deviceimage'><img src='" . $smallImgPath . "' data-src='" . $largeImgPath . "' class='lazy-image' /></div>";
                } else {
                    $img = "<span style='display:block; font-size: 150px; text-align: center;'><i class='bx bxs-image'></i></span>";
                }
                $onlyfirst = 0;
                $lastupdate = 0;
                $versions = array();
                foreach($devicename as $crVersion => $data){
                  ++$onlyfirst;
                  if($onlyfirst == 1){
                    echo $img;
                    echo "
                    <div class='card-body'>
                    <h5 class='card-text devicename'>" . $data['device'] . "</h5>
                      </div>
                      <div class='center'>
                      <div class='dropdown'>
                        <a class='btn btn-danger dropdown-toggle m-2 shadow-sm' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>Download</a>
                        <ul class='dropdown-menu shadow' aria-labelledby='dropdownMenuLink'>
                  ";
                  }
                  if ($lastupdate < $data['builddate']){
                    $lastupdate = $data['builddate'];
                  }
                  array_push($versions, $crVersion);
                }
                //list all crDroid versions
                foreach ($versions as &$version) {
                  echo "<li><a class='dropdown-item' href='" . $devicecodename . "/" . $version . "'>crDroid ". $version ." | Android " . crVersionToAndroid($version) . "</a></li>";
                }
                unset($version);
                echo "
                            </ul>
                            </div>
                          </div>
                          <div class='card-footer text-muted'>Last build: " . beautifyDate($lastupdate) . "</div>
                        </div>
                    </div>
                    ";
            }
        }
    ?>
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
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/jquery/jquery-3.6.0.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/bootstrap-dark/js/darkmode.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>
  <script src="js/peel1.js" type="text/javascript"></script>

  <!-- Search and filter js -->
  <script>
    $(function() {
      function filterVersions() {
        const listOutdated = document.getElementById("listOutdated");
        const devices = document.querySelectorAll(".device");
        const oems = document.querySelectorAll(".oem");
        const includeVersions = ["crDroid 8", "crDroid 9", "crDroid 10"];

        devices.forEach(device => {
          const versions = device.querySelectorAll(".dropdown-item");
          let isVisible = false;

          versions.forEach(version => {
            const versionText = version.textContent || version.innerText;
            const shouldShow = listOutdated.checked || includeVersions.some(v => versionText.includes(v));

            version.parentNode.style.display = shouldShow ? "block" : "none";
            if (shouldShow) isVisible = true;
          });

          device.style.display = isVisible ? "block" : "none";
        });

        oems.forEach(oem => {
          let nextElement = oem.nextElementSibling;
          let hasVisibleDevice = false;

          while (nextElement && !nextElement.classList.contains("oem")) {
            if (nextElement.classList.contains("device") && nextElement.style.display !== "none") {
              hasVisibleDevice = true;
              break;
            }
            nextElement = nextElement.nextElementSibling;
          }

          oem.style.display = hasVisibleDevice ? "block" : "none";
        });

        updateOEMLinks();
      }

      function updateOEMLinks() {
        $(".OEMS a").each(function() {
          const targetID = $(this).attr("href").substring(1);
          const targetOEM = $("#" + targetID);
          const isVisible = targetOEM.length > 0 && targetOEM.is(":visible");

          $(this).toggle(isVisible);
        });
      }

      $("#search").on("keyup submit", function() {
        var key = this.value.toLowerCase();

        if (key === '') {
          filterVersions();
        } else {
          $(".oem").show();
          $(".device").show();

          $(".dropdown-item").closest('li').show();
          $(".device").each(function() {
            var $this = $(this);
            var matches = $this.text().toLowerCase().indexOf(key) >= 0;
            $this.toggle(matches);
          });

          $(".oem").each(function() {
            var $this = $(this);
            var hasVisibleDevice = $this.nextUntil(".oem").filter(".device:visible").length > 0;
            $this.toggle(hasVisibleDevice);
          });

          updateOEMLinks();
        }
      });

      window.onload = function() {
        const listOutdated = document.getElementById("listOutdated");
        listOutdated.checked = !!window.location.href.match(/#(.+)/);
        filterVersions();
        listOutdated.addEventListener("change", filterVersions);
      };

      window.filterVersions = filterVersions;
    });
  </script>

  <!-- to device -->
  <script>
    $(document).ready(function() {
      var x = window.location.hash;
      if (x.includes('#')) {
        var codename = x.replace('#', '');
        glowup(codename);
      };

      // Check if there's a hash in the URL when the page loads
      var hash = window.location.hash;
      if (hash) {
        var dynamicId = hash.substring(1);
        var element = document.getElementById(dynamicId);

        if (element) {
          $('html, body').animate({
            scrollTop: $(element).offset().top - ($(window).height() - $(element).outerHeight(true)) / 2
          }, 1000);
        }
      }
    });

    function glowup(device) {
      var d = document.getElementById(device);
      if (d) {
        d.className += " mydevice";
      }
    };
  </script>

  <!-- lazy load images -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const lazyImages = document.querySelectorAll('.lazy-image');

      const lazyLoad = target => {
        const io = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const img = entry.target;
              const src = img.getAttribute('data-src');

              img.setAttribute('src', src);
              img.classList.add('loading');

              img.onload = function() {
                img.classList.remove('loading');
                img.classList.add('loaded');
              };

              observer.disconnect();
            }
          });
        });

        io.observe(target);
      };

      lazyImages.forEach(lazyLoad);
    });
  </script>
</body>

</html>
