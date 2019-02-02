<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>crDroid.net - user discussions</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="description" content="user discussions">
	<meta name="keywords" content="crDroid, crDroid ROM, ROM, crDroid download">

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
          <li><a href="https://crdroid.net">Home</a></li>
		  <li><a href="translations.php">Translations</a></li>
		  <li><a href="dl.php">All devices</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
<!--==========================
	Get Started Section
============================-->
<section class="padd-section text-center wow fadeInUp">
    <div class="container">
      <div class="section-title text-center">
        <h2>Discussions</h2>
        <p class="separator">Got something to say? Let the community know!</p>
		</div>
    </div>
</section>

<!--==========================
	Content section
============================-->
<div class="container">
	<div class="col-md-12">    
		<div id="disqus_thread" style="width: 90%; margin: auto;"></div>
		<script>
			var disqus_config = function () {
				this.page.url = 'https://crdroid.net/discussions.php';
				this.page.identifier = 'crDroid.net - user discussions';
			};
			(function() {
			var d = document, s = d.createElement('script');
				s.src = 'https://crdroid.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>     
	</div>
</div>

<?php include 'footer.php';?>

</body>
</html>