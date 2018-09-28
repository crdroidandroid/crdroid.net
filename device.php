<!doctype html>
<html lang="en">
<head>
<?php 
include 'handler.php';

if (!empty(GetDeviceName($_GET['name']))) {
    echo "    <title>crDroid.net - Download crDroid for " . GetDeviceName($_GET['name']) . " (" . $_GET['name'] . ")" . "</title>\n\n";
    echo "    <!-- Required meta tags -->\n";
    echo "    <meta charset=\"utf-8\">\n";
    echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
    echo "    <meta name=\"description\" content=\"official crDroid ROM for " . GetDeviceName($_GET['name']) . " (" . $_GET['name'] . ")" . "\">\n";
    echo "    <meta name=\"keywords\" content=\"crDroid, crDroid ROM, ROM, " . GetDeviceName($_GET['name']) . ", " . $_GET['name'] .  "\">\n";
    $id = $_GET['name'];
}else{
    header("Location: https://crdroid.net/", true, 301);
    exit;
}
?>

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
                                <li class="nav-item"> <a class="nav-link" href="dl.php">ALL DEVICES</a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <header class="bg-gradient">
        <div class="container mt-5">
            <h1>Ready to crDroid-ify your <br><?php echo GetDeviceName($_GET['name']);?>?</h1>
            <p class="tagline">Cool, seems you are ready to download<br>Check below info to get started<br><br></p>
        </div>
    </header>
    
    <div class="section light-bg" id="downloads">
        <div class="container">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#crDroid_v4">crDroid Oreo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#crDroid_v5">crDroid Pie <img src="images/beta-stamp.png" width="35"></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="crDroid_v4">
                        <div class="d-flex flex-column">
                        <?php ReturnDeviceInfo('v8.1', $id);?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="crDroid_v5">
                        <div class="d-flex flex-column">
                        <?php ReturnDeviceInfo('v9.0', $id);?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    <?php include 'footer.php';?>
</body>
</html>