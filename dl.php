<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>crDroid.net - Download crDroid for supported devices</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="description" content="official crDroid ROM download page">
	<meta name="keywords" content="crDroid, crDroid ROM, ROM, crDroid download">

	<!-- Favicons -->
	<link href="img/favicon.ico" rel="icon">
	
	<!-- Google Fonts -->
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

	<!-- Bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Libraries CSS Files -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	<link href="lib/animate/animate.min.css" rel="stylesheet">

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
		  <li><a href="legal.php">Legal</a></li>
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
        <h2>Ready to download?</h2>
        <p class="separator">Below you can find a list with official supported devices.<br>Choose your device and get started using crDroid<br></p>
		<div class="inputWithIcon"><input type="text" placeholder="Search for your device..." id="search"><i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i><small>*search can handle device name, codename, crDroid version or maintainer</small></div>
      </div>
    </div>
</section>

<?php include 'handler.php'; ?>
<!--==========================
	Download section
============================-->
<div class="container">
	<div class="col-md-12">    
		<div class="card card-nav-tabs">
			<div class="card-header card-header-primary">
				<div class="nav-tabs-navigation">
					<div class="nav-tabs-wrapper">
						<ul class="nav nav-tabs" data-tabs="tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#crDroid-v6" data-toggle="tab">
									<span style="font-size: 18px;"><i class="fab fa-android"></i></span> crDroid 6
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#crDroid-v5" data-toggle="tab">
									<span style="font-size: 18px;"><i class="fab fa-android"></i></span> crDroid 5
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#crDroid-v4" data-toggle="tab">
									<span style="font-size: 18px;"><i class="fab fa-android"></i></span> crDroid 4
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body ">
				<div class="tab-content text-center">
					<div class="tab-pane fade show active" id="crDroid-v6">
						<p>This crDroid version is based on Android 10 released by Google on September 3, 2019</p>
						<div class="device-holder-2020">
							<?php ReadJSON(6); ?>
						</div>
					</div>
					<div class="tab-pane fade" id="crDroid-v5">
						<div class="device-holder">
							<p>This crDroid version is based on Android 9 (Pie) released by Google on March 7, 2018</p>
							<?php ReturnDevices('v9.0') ?>
						</div>
					</div>
					<div class="tab-pane fade" id="crDroid-v4">
						<div class="device-holder">
							<p>This crDroid version is based on Android 8 (Oreo) released by Google on August 21, 2017</p>
							<?php ReturnDevices('v8.1') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<?php GenerateModal(6); ?>

<?php include 'footer.php';?>

<!--==========================
	Search script
============================-->
<script>
	$("#search").on("keyup submit", function() {
		var key = this.value.toLowerCase();
		if (key == ''){
			$(".manufacturer").css("display", "inherit");
			$(".manufacturer-2020").css("display", "inherit");
			$(".oemsplit").css("display", "inherit");
		}else{
			$(".manufacturer").css("display", "none");
			$(".manufacturer-2020").css("display", "none");
			$(".oemsplit").css("display", "none");
		}
		$(".device").each(function() {
			var $this = $(this);
			$this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
		});
	});
	$('.dropdown-toggle').click(function(){
		$('.dropdown-menu').toggleClass('show');
	});
	$(".dropdown-menu").mouseleave(function(){
      $(".dropdown-menu").removeClass("show");
    });
	$('.close, .closebtn').click(function(){
		$('.dropdown-menu').removeClass('show');
	});

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>