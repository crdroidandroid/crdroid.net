<!doctype html>
<html lang="en">
<head>
    <title>crDroid.net - Download crDroid for supported devices</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="official crDroid ROM download page">
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
                                <li class="nav-item"> <a class="nav-link " href="discussions.php">DISCUSSIONS</a> </li>
                              	<li class="nav-item"> <a href="#downloads" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">DOWNLOADS</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <header class="bg-gradient">
        <div class="container mt-5">
            <h1>Ready to download?</h1>
            <p class="tagline">Below you can find a list with official supported devices. <br>Choose your device and get started using crDroid<br><br><br></p>
        </div>
    </header>
    
    <div class="section light-bg" id="downloads">
        <div class="container">
            <div class="section-title">
                <h3>Search devices</h3>
                <input type="text" id='search'><br>
                <small>*search can handle device name, codename, crDroid version, maintainer and build type</small>
            </div>
            <!-- Devices -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#crDroid_v4">crDroid Oreo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#crDroid_v5">crDroid Pie <img src="images/beta-stamp.png" width="35"></a>
                    </li>
                </ul>
                <?php include 'handler.php'; ?>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="crDroid_v4">
                        <div class="d-flex flex-column">
                        <?php ReturnDevices('v8.1') ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="crDroid_v5">
                        <div class="d-flex flex-column">
                        <?php ReturnDevices('v9.0') ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- // end .section -->
    <?php include 'footer.php';?>
    <!-- Search -->
    <script>
        $("#search").on("keyup submit", function() {
            var key = this.value.toLowerCase();
            if (key == ''){
                $(".manufacturer").css("display", "inherit");
            }else{
                $(".manufacturer").css("display", "none");
            }

            $(".device").each(function() {
                var $this = $(this);
                $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
            });
        });
    </script>
</body>
</html>
