<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>crDroid.net - increase performance and reliability over stock Android for your device</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="description" content="official crDroid ROM website">
	<meta name="keywords" content="crDroid, crDroid ROM, ROM">

	<!-- Favicons -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Fonts -->
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

	<!-- Bootstrap css -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
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

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="https://crdroid.net" class="scrollto"><span>cr</span>Droid <span>A</span>ndroid</a></h1>
        <!-- Uncomment below image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about-us">About</a></li>
          <li><a href="#screenshots">Screenshots</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="translations.php">Translations</a></li>
          <li><a href="legal.php">Legal</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Welcome to crDroid ROM</h1>
      <h2>crDroid is designed to improve the performance, reliability and customizability of stock Android</h2>
      <!--<img src="img/hero-img.png" alt="crdroid" height="500">-->
      <a href="dl.php" class="btn-get-started scrollto">Get started with crDroid <small>v</small><b><?php include 'handler.php'; echo crDroid_Version(); ?></b></a>
      <div class="btns">
        <a href="dl.php"><i class="fas fa-mobile-alt"></i> <?php echo GetSupportedDevices('6'); ?> devices officially supported</a>
        <a href="dl.php"><i class="fas fa-industry"></i> <?php echo GetSupportedOEMS('6'); ?> OEMs officially supported</a>
      </div>
    </div>
  </section><!-- #hero -->

  <!--==========================
    Get Started Section
  ============================-->
  <section class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>What you get?</h2>
        <p class="separator">Our focus</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/android.svg" alt="img" class="img-fluid">
            <h4>Simple</h4>
            <p>Designed from the ground up to be simple and lightweight for your device</p>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/customize.svg" alt="img" class="img-fluid">
            <h4>Customize</h4>
            <p>Customize your installation with more then 40+ options found under crDroid Settings</p>

          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="img/svg/secure.svg" alt="img" class="img-fluid">
            <h4>Secure</h4>
            <p>We cherish and treasure the privacy of our users with top-notch security options</p>

          </div>
        </div>

      </div>
    </div>

  </section>

  <!--==========================
    About Us Section
  ============================-->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-5 col-lg-3">
          <img src="img/hero-img.png" alt="About">
        </div>

        <div class="col-md-7 col-lg-5">
          <div class="about-content">

            <h2><span>crDroid</span>Main highlights</h2>
            <p>Things you can customize</p>

            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i>Status Bar</li>
              <li><i class="fa fa-angle-right"></i>Quick Settings</li>
              <li><i class="fa fa-angle-right"></i>Lock Screen</li>
              <li><i class="fa fa-angle-right"></i>Recents Screen</li>
              <li><i class="fa fa-angle-right"></i>Navigation</li>
			  <li><i class="fa fa-angle-right"></i>Buttons</li>
			  <li><i class="fa fa-angle-right"></i>User Interface</li>
			  <li><i class="fa fa-angle-right"></i>Notifications</li>
			  <li><i class="fa fa-angle-right"></i>Sound</li>
			  <li><i class="fa fa-angle-right"></i>Misc</li>
            </ul>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Screenshots Section
  ============================-->
  <section id="screenshots" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>crDroid Settings Gallery</h2>
        <p class="separator">On device screenshots</p>
      </div>
    </div>

    <div class="container">
      <div class="owl-carousel owl-theme">

        <div><img src="img/screen/1.png" alt="img"></div>
        <div><img src="img/screen/2.png" alt="img"></div>
        <div><img src="img/screen/3.png" alt="img"></div>
        <div><img src="img/screen/4.png" alt="img"></div>
        <div><img src="img/screen/5.png" alt="img"></div>
        <div><img src="img/screen/6.png" alt="img"></div>
        <div><img src="img/screen/7.png" alt="img"></div>
        <div><img src="img/screen/8.png" alt="img"></div>
        <div><img src="img/screen/9.png" alt="img"></div>
		<div><img src="img/screen/10.png" alt="img"></div>
		<div><img src="img/screen/11.png" alt="img"></div>
		<div><img src="img/screen/12.png" alt="img"></div>
		<div><img src="img/screen/13.png" alt="img"></div>
      </div>
    </div>

  </section>
  
  <!--==========================
    Testimonials Section
  ============================-->

  <section id="testimonials" class="padd-section text-center wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-8">

          <div class="testimonials-content">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner" role="listbox">

                <div class="carousel-item  active">
                  <div class="top-top">

                    <h2>What our users say</h2>
                    <p>Thanks for the great work, this ROM is really awesome.</p>
                    <h4>nicko.martin<span>XDA Forum</span></h4>

                  </div>
                </div>

                <div class="carousel-item ">
                  <div class="top-top">

                    <h2>What our users say</h2>
                    <p>Best rom by far... Love this beast</p>
                    <h4>grinch247<span>XDA Forum</span></h4>

                  </div>
                </div>

                <div class="carousel-item ">
                  <div class="top-top">

                    <h2>What our users say</h2>
                    <p>Decided to jump on the crDroid train. So far so good. Everything works perfectly.</p>
                    <h4>apophis9283<span>XDA Forum</span></h4>

                  </div>
                </div>

              </div>

              <div class="btm-btm">

                <ul class="list-unstyled carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ul>

              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  
  <!--==========================
    FAQ Section
  ============================-->

  <section id="faq" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Frequently Asked Questions</h2>
        <p class="separator">FAQ</p>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
            <img src="img/svg/base.svg" alt="img" class="img-fluid">
            <h4>What base is crDroid using?</h4>
            <p>crDroid uses LineageOS as base. We try to keep in sync with LineageOS source while also adding lots of customizations for you to choose from.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
            <img src="img/svg/features.svg" alt="img" class="img-fluid">
            <h4>Are you going to add more features?</h4>
            <p>No way... Nah... just kidding... We always try to add more and more features with stability and security first in mind. </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
            <img src="img/svg/update.svg" alt="img" class="img-fluid">
            <h4>For how long do you plan to keep updates?</h4>
            <p>As crDroid is based on LineageOS, which is also based on stock Android, we can say crDroid is going to keep updates flowing as long as LineageOS and Google do. </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="feature-block">
            <img src="img/svg/team.svg" alt="img" class="img-fluid">
            <h4>How do I become maintainer for crDroid?</h4>
            <p>It's really simple. Just message Gabriel over <a href="https://telegram.me/gwolf2u" target="_blank"><span class="fab fa-telegram" style="font-size: 14px;"></span> Telegram</a> with the device you want to maintain. Note that we only support Android 10 builds for new devices.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Team Section
  ============================-->
  <section id="team" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Team Member</h2>
        <p class="separator">Meet the core team</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://avatars.githubusercontent.com/neobuddy89" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="https://github.com/neobuddy89"><i class="fab fa-github"></i> neobuddy89</a></li>
              </ul>
              <span>crDroid Core Developer</span>
              <h4>Pranav</h4>
            </div>
          </div>
        </div>

       <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://avatars.githubusercontent.com/firebird11" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="https://github.com/firebird11"><i class="fab fa-github"></i> firebird11</a></li>
              </ul>
              <span>crDroid Core Team</span>
              <h4>Hildo</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://avatars.githubusercontent.com/gwolf2u" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="https://github.com/gwolf2u"><i class="fab fa-github"></i> gwolf2u</a></li>
				<li><a href="https://telegram.me/gwolf2u"><i class="fab fa-telegram"></i> gwolf2u</a></li>
              </ul>
              <span>crDroid Website Developer & Public relations</span>
              <h4>Gabriel</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="https://avatars.githubusercontent.com/soubhik-khan" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="https://github.com/soubhik-khan"><i class="fab fa-github"></i> soubhik-khan</a></li>
              </ul>
              <span>crDroid Core Team</span>
              <h4>Soubhik</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php include 'footer.php';?>

</body>
</html>
