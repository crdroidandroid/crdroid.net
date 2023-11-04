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
$maintainer = $data[1]['maintainer'];
$nickname = $data[1]['nick'];
$version = $data[1]['crversion'];
$android = crVersionToAndroid($crversion);
$builddate = $data[1]['builddate'];
$buildtype = ucfirst($data[1]['buildtype']);
$download = $data[1]['download'];
$gapps = $data[1]['gapps'];
$recovery = $data[1]['recovery'];
$firmware = $data[1]['firmware'];
$paypal = $data[1]['paypal'];
$telegram = $data[1]['telegram'];
$zipsize = $data[1]['size'];
$forum = $data[1]['forum'];
$md5 = $data[1]['md5'];
$sha256 = $data[1]['sha256'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>crDroid.net - Download crDroid v<?php echo $crversion; ?> for <?php echo $devicename; ?> (<?php echo $device; ?>)</title>
  <meta name="description" content="official crDroid v<?php echo $crversion; ?> for <?php echo $devicename; ?> (<?php echo $device; ?>)">
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

  <main id="main">

    <section class="inner-page">
      <div class="container">

        <div class="section-title">
          <p><br><br></p>
          <h2>Cool, seems you are ready to download</h2>
          <p>Check below info to get started</p>
        </div>

        <!-- List device info -->
        <div class="row">
          <div class="col-md col-lg">
			      <div class="col-md-12">
          <?php
            if (empty($maintainer)) {
              echo "
              <div class='alert alert-warning shadow' role='alert'>
                <h4 class='alert-heading'>Aww snap!</h4>
                <p>This version of crDroid is outdated or no longer supported, so try to check for other versions.</p>
                <hr>
                <p class='mb-0'>If this version source is still updated and if you are interested to maintain it, read our <a href='" . $domain . "/#faq' class='alert-link'>F.A.Q page</a> to get started</p>
            </div>
              ";
            }
          ?>
              <div class="col-md-12">
                <div class="card mb-3 shadow">
                  <div class="row g-0">
                    <div class="col-md-4">
                    <?php
                      $imgpath = "img/devices/" . $device .".webp";
                      if (file_exists($imgpath)){
                        $img = "<img src='" . $domain . "/img/devices/" . $device .".webp' class='img-fluid rounded-start' alt='device image'>";
                      } else {
                        $img = "<span class='noimg'><i class='bx bxs-image' ></i></span>";
                      }
                    ?>
                      <div class='deviceimage-dl'><?php echo $img; ?></div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h3 class="card-title text-center">crDroid for <?php echo $devicename; ?></h3>
                        <hr>
                        <p class="card-text">&nbsp;</p>
                        <table class="table table-sm table-borderless">
                          <tbody>
                            <tr>
                              <th scope="row"><i class='bx bxs-copyright'></i> OEM</th>
                              <td><?php echo $oem; ?></td>
                            </tr>
                            <tr>
                              <th scope="row"><i class='bx bxs-terminal' ></i> Codename</th>
                              <td><?php echo $device; ?></td>
                            </tr>
                            <?php 
                              if (empty($maintainer) == false) {
                                  echo "
                                <tr>
                                  <th scope='row'><i class='bx bxs-id-card' ></i> Maintainer</th>
                                  <td>" . $maintainer . "</td>
                                </tr>";
                              }
                              if (empty($nickname) == false) {
                                  echo "
                                <tr>
                                  <th scope='row'><i class='bx bxs-credit-card-front' ></i> Nickname</th>
                                  <td>" . $nickname . "</td>
                                </tr>";
                              }
                            ?>
                            <tr>
                              <th scope="row"><i class='bx bx-mobile' ></i> Version</th>
                              <td><?php echo $version; ?></td>
                            </tr>
                            <tr>
                              <th scope="row"><i class='bx bxl-android' ></i> Android</th>
                              <td><?php echo $android; ?></td>
                            </tr>
                            <tr>
                              <th scope="row"><i class='bx bxs-calendar' ></i> Build date</th>
                              <td><?php echo beautifyDate($builddate); ?></td>
                            </tr>
                            <tr>
                              <th scope="row"><i class='bx bxs-file-archive' ></i> ZIP size</th>
                              <td><?php echo convertToMB($zipsize); ?></td>
                            </tr>
                            <tr>
                              <th scope="row"><i class='bx bx-git-branch' ></i> Build type</th>
                              <td><?php echo $buildtype; ?></td>
                            </tr>
                            </tbody>
                          </table>
                          <div class="form-row align-items-center md5">
                            <div class="col-auto">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">MD5</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo $md5; ?>" readonly>
                              </div>
                            </div>
                            <?php
                              if(empty($sha256) == false){
                                echo "
                                <div class='col-auto'>
                                <div class='input-group mb-2'>
                                  <div class='input-group-prepend'>
                                    <div class='input-group-text'>SHA256</div>
                                  </div>
                                  <input type='text' class='form-control' id='inlineFormInputGroup' value='$sha256' readonly>
                                </div>
                              </div>
                                ";
                              }
                            ?>
                          </div>
                          <div class="download-area">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9442732345409545" crossorigin="anonymous"></script>
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-format="fluid"
                                data-ad-layout-key="-gw-3+1f-3d+2z"
                                data-ad-client="ca-pub-9442732345409545"
                                data-ad-slot="3706777652"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                          </div>
                          <h6 class="text-left">crDroid downloads:</h6>
                          <div id="dl-ads" class="center pb-2">Please disable adblock to download faster (7)</div>
                          <div class="download-area" id="dl-links">
                            <a class="btn btn-success btn-sm m-1" href='<?php echo $download; ?>'><i class='bx bxs-download' ></i> Download latest version</a>
						                <a class="btn btn-secondary btn-sm m-1" href='https://sourceforge.net/projects/crdroid/files/<?php echo $device; ?>/<?php echo $crversion;?>.x'><i class='bx bx-history' ></i>  Download older versions</a>
                          </div>
                          <h6 class="text-left">Useful links:</h6>
                          <div class="download-area">
                            <a class='btn btn-warning btn-sm m-1' href='<?php echo $forum; ?>'><i class='bx bxs-conversation' ></i> Forum</a>
                            <?php
                                  if (empty($telegram) == false){
                                      echo "
                                        <a class='btn btn-primary btn-sm m-1' href='" . $telegram . "'><i class='bx bxl-telegram' ></i> Telegram</a>";
                                  }
                            ?>
                            <a class="btn btn-secondary btn-sm m-1" role='button' id="changelogBtn" data-textfile="../changelog/v<?php echo $crversion;?>.x/changelog_<?php echo $device; ?>.txt"><i class='bx bxs-spreadsheet' ></i> Changelog</a>
                            <?php
                                  if (empty($gapps) == false){
                                      echo "
                                        <a class='btn btn-info btn-sm m-1' href='" . $gapps . "'><i class='bx bxl-google' ></i> Gapps</a>";
                                  }
                            ?>
                            <?php
                                  if (empty($recovery) == false){
                                      echo "
						                            <a class='btn btn-danger btn-sm m-1' href='" . $recovery . "'><i class='bx bxs-terminal' ></i> Recovery</a>";
                                  }
                            ?>
                            <?php
                                  if (empty($firmware) == false){
                                      echo "
                                        <a class='btn btn-success btn-sm m-1' href='" . $firmware . "'><i class='bx bxs-terminal' ></i> Firmware</a>";
                                  }
                            ?>
                            <?php
                                  if (empty($paypal) == false){
                                      echo "
                                        <a class='btn btn-primary btn-sm m-1' href='" . $paypal . "'><i class='bx bxs-dollar-circle' ></i> Donate</a>";
                                  }
                            ?>
                          </div>
                      </div>
                    </div>
                    <div class="changelog" style="display: none; margin-left: 30px; padding-bottom: 5px;">
                      <h6>Changelog:</h6>
                    </div>
			              <div style="text-align: center; padding-bottom: 10px;">
                      <textarea readonly rows="12" class="changelogTXT" style="white-space: pre-wrap; width: 95%; max-width: 95%; display: none; border-radius: 10px; border: 2px dashed #71c55d;">Loading...</textarea>
                    </div>
                    </div>
                  </div>
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

  <script type="text/javascript" async=true>
    $(document).ready(function(){
      var x = window.location.hash;
      var tab = null;
      if (x.includes('#')){
        if (x.includes('changelog')){
          var myv = <?php echo $crversion; ?>;
          if (strlen(myv) > 1){
            var file = '../changelog/v' + myv + '.x/<?php echo $device; ?>_changelog.txt';
          }else{
            var file = '../changelog/v' + myv + '.x/changelog_<?php echo $device; ?>.txt';
          }
          $(".changelogTXT").load(file);
          $(".changelog").fadeIn(1000);
          $(".changelogTXT").slideDown(1000);
          $('html, body').animate({scrollTop: $(".changelog").offset().top}, 2000);
        }
      };

      $('[id="changelogBtn"]').click(function() {
        $(".changelogTXT").load($(this).attr("data-textfile"));
        $(".changelog").fadeIn(1000);
        $(".changelogTXT").slideDown(1000);
        $('html, body').animate({scrollTop: $(".changelog").offset().top}, 2000);
      });
      $('.nav-link').click(function() {
        $(".changelog").fadeOut(0);
        $(".changelogTXT").slideUp(0);
      });
    });
  </script>
</body>

</html>
