<!doctype html>
<html lang="en">
<head>
    <title>crDroid.net - user discussions</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="user discussions">
    <meta name="keywords" content="crDroid, crDroid ROM, ROM, crDroid download">
    
    <link rel="shortcut icon" href="favicon.ico" type="favicon.ico">
    
    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6432969-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-6432969-5');
    </script>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
    <!-- Nav Menu -->
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="https://crdroid.net"><img src="images/logo.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="https://crdroid.net">HOME <span class="sr-only">(current)</span></a> </li>
                              	<li class="nav-item"> <a class="nav-link" href="translate.php">TRANSLATE</a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="#discussions">DISCUSSIONS</a> </li>
                              	<li class="nav-item"> <a href="dl.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">DOWNLOADS</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <header class="bg-gradient">
      <br>
    </header>
    
    <div class="section light-bg" id="discussions">
        <div class="container">
            <div class="section-title">
                <h3>Discussions</h3>
                <small>Got something to say? Let the community know!</small>
            </div>
            
			<div class="row">
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
    </div>
    <!-- // end .section -->
    <?php include 'footer.php';?>
</body>
</html>
