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
		  <li><a href="https://stats.crdroid.net">Device Stats</a></li>
		  <li><a href="donate.php">Support us</a></li>
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
								<a class="nav-link active" href="#crDroid-v7" data-toggle="tab">
									<span style="font-size: 18px;"><i class="fab fa-android"></i></span> crDroid 7
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#crDroid-v6" data-toggle="tab">
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
					<div class="tab-pane fade show active" id="crDroid-v7">
						<p>This crDroid version is based on Android 11 released by Google on September 8, 2020</p>
						<div class="alert alert-primary" role="alert">This version of crDroid is supported officially on <b><?php echo GetSupportedDevices('7'); ?></b> devices coming from <b><?php echo GetSupportedOEMS('7'); ?></b> OEMs</div>
						<div class="device-holder-2020">
							<div class="device-holder-2020">
								<?php ReadJSON(7); ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="crDroid-v6">
						<p>This crDroid version is based on Android 10 released by Google on September 3, 2019</p>
						<div class="alert alert-primary" role="alert">This version of crDroid is supported officially on <b><?php echo GetSupportedDevices('6'); ?></b> devices coming from <b><?php echo GetSupportedOEMS('6'); ?></b> OEMs</div>
						<div class="device-holder-2020">
							<?php ReadJSON(6); ?>
						</div>
					</div>
					<div class="tab-pane fade" id="crDroid-v5">
						<p>This crDroid version is based on Android 9 (Pie) released by Google on March 7, 2018</p>
						<div class="alert alert-dark" role="alert">This version of crDroid is no longer updated</div>
						<div class="device-holder">
							<?php ReturnDevices('v9.0') ?>
						</div>
					</div>
					<div class="tab-pane fade" id="crDroid-v4">
						<p>This crDroid version is based on Android 8 (Oreo) released by Google on August 21, 2017</p>
						<div class="alert alert-dark" role="alert">This version of crDroid is no longer updated</div>
						<div class="device-holder">
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
<?php GenerateModal(7); ?>

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
		var instance = $('.lazy').Lazy({ chainable: false });
		$('.lazy').Lazy();
    	var instance = $('.lazy').data("plugin_lazy");
	});
	$('.dropdown-toggle').click(function(){
		$('.dropdown-menu').toggleClass('show');
	});
	$(".dropdown-menu").mouseleave(function(){
      $(".dropdown-menu").removeClass("show");
    });
	$('.close, .closebtn').click(function(){
		$('.dropdown-menu').removeClass('show');
		$(".changelog").fadeOut(0);
		$(".changelogTXT").slideUp(0);
	});

    $(function() {
        $('.lazy').lazy();
    });
</script>

<!-- Default tab -->
<script type="text/javascript" async=true>
$(document).ready(function(){
	var x = window.location.hash;
	if (x.includes('#')){
		var tab = x.replace('#', '');
		activateTab(tab);
	};
	$('[id="changelogBtn"]').click(function() {
		$(".changelogTXT").load($(this).attr("data-textfile"));
		$(".changelog").fadeIn(1000);
		$(".changelogTXT").slideDown(1000);
	});
});

function activateTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
</body>
</html>