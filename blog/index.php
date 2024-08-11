<?php
  include '../functions.php';
  $domain = GetDomain();
  $page = $_GET['page'];
  if (empty($page)) {
	$page = 1;
	$title = "crDroid.net - Blog";
  }else{
	$title = "crDroid.net - Blog | Page " . $page;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?></title>
  <meta name="description" content="official crDroid ROM website">
  <meta name="keywords" content="crDroid, crDroid ROM, ROM">

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
            <h1>Blog</h1>
            <h2>Find out the news and what we are baking</h2>
          </div>
        </div>
      </div>
    </div>

    </section><!-- End Blog -->

  <main id="main">

    <section class="inner-page">
      <div class="container">

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
			$path = __DIR__. '/articles';
			$files = array_reverse(glob($path."/*.md"));
			$totalpages = ceil(count($files) / 5);
			$files = array_slice($files, ($page - 1) * 5, 5);

			foreach ($files as $file) {
				$file_data = array_slice(file($file), 1, 3);
				$articledate = date_create(substr(basename($file, ".md"),0,10));
				echo "
				<div class='card shadow-sm mb-4'>
				<div class='card-body'>
					<h3 class='card-title'>" . str_replace('title:', '', $file_data[0]) . "</h3>
					<p class='card-text'>" . str_replace('description:', '', $file_data[1]) . "</p>
					<h6 class='card-subtitle mb-2 text-muted'><i class='bx bxs-calendar' ></i>" . date_format($articledate, "M d, Y") . " <i class='bx bxs-contact' ></i> " . str_replace('author:', '', $file_data[2]) . "</h6>
					<a href='" . $domain . "/blog/" . basename($file, ".md") . "' class='card-link'>Read more</a>
				</div>
				</div>
				";
			}
		?>
    <div class="d-flex justify-content-center">
      <nav aria-label="...">
        <ul class="pagination">
            <?php
            $totalPagesToShow = 2; // Number of pages to show on each side of the current page
            $startPage = max(1, $page - $totalPagesToShow); // Calculate the start page
            $endPage = min($totalpages, $page + $totalPagesToShow); // Calculate the end page

            // Display previous arrow if needed
            if ($page > 1) {
                echo "<li class='page-item'>
                        <a class='page-link' href='/blog/page/" . ($page - 1) . "' aria-label='Previous'>
                            <span aria-hidden='true'>&laquo;</span>
                        </a>
                    </li>";
            }

            // Display ellipsis if there are pages before the start page
            if ($startPage > 1) {
                echo "<li class='page-item disabled'>
                        <span class='page-link'>&hellip;</span>
                    </li>";
            }

            for ($i = $startPage; $i <= $endPage; $i++) {
                if ($i == $page) {
                    echo "<li class='page-item active' aria-current='page'>
                            <span class='page-link'>" . $i . "</span>
                        </li>";
                } else {
                    if ($i == 1) {
                        echo "<li class='page-item'><a class='page-link' href='" . $domain . "/blog/'>" . $i . "</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='/blog/page/" . $i . "'>" . $i . "</a></li>";
                    }
                }
            }

            // Display ellipsis if there are pages after the end page
            if ($endPage < $totalpages) {
                echo "<li class='page-item disabled'>
                        <span class='page-link'>&hellip;</span>
                    </li>";
            }

            // Display next arrow if needed
            if ($page < $totalpages) {
                echo "<li class='page-item'>
                        <a class='page-link' href='/blog/page/" . ($page + 1) . "' aria-label='Next'>
                            <span aria-hidden='true'>&raquo;</span>
                        </a>
                    </li>";
            }
            ?>
        </ul>
      </nav>
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
</body>

</html>
