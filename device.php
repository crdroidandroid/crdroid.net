<!doctype html>
<html lang="en">
<head>
<?php 
include 'handler.php';
is_NeedUpdate();

if (isset($_GET['name'])) {
    echo "    <title>crDroid.net - Download crDroid for " . GetDeviceName($_GET['name']) . " (" . $_GET['name'] . ")" . "</title>\n\n";
    echo "    <!-- Required meta tags -->\n";
    echo "    <meta charset=\"utf-8\">\n";
    echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
    echo "    <meta name=\"description\" content=\"official crDroid ROM for " . GetDeviceName($_GET['name']) . " (" . $_GET['name'] . ")" . "\">\n";
    echo "    <meta name=\"keywords\" content=\"crDroid, crDroid ROM, ROM, " . GetDeviceName($_GET['name']) . ", " . $_GET['name'] .  "\">\n";
    $id = $_GET['name'];
}else{
    die("undefined");
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
            <h1>Ready to download?</h1>
            <p class="tagline"><br></p>
        </div>
    </header>
    
    <div class="section light-bg" id="downloads">
        <div class="container">
            <div class="row">
    <?php
        if (file_exists('update.xml')) {
            $xml = simplexml_load_file('update.xml');
            foreach($xml as $manufacturer){
                foreach ($manufacturer as $k => $v){
                    if ($k == $id){
                    $build_date = explode("-", $v->filename);
                    $maintainer_arr = $v->maintainer;
                    $maintainer = explode("(", $maintainer_arr);
                    if (isset($maintainer[1])) {
                        $nick = str_replace(")","",$maintainer[1]);
                    }else{
                        $nick = null;
                    }
                        echo "
                <div class='manufacturer'>
                    <span class='ti-folder'> " . $manufacturer['id'] . "</span>
                </div>";
                        echo "
                <div class='device'>
                    <div class='main'>
                    <span class='ti-mobile'> Device name: " . $v->devicename . "</span><br>
                    <span class='ti-receipt links'> Device codename: <a href='https://crdroid.net/" . $k . "' rel='bookmark'>" . $k . "</a></span></br>
                    <span class='ti-user'> Maintainer: " . $maintainer[0] . "</span><br>";
                    if (!empty($nick)) {
                        echo "
                    <span class='ti-id-badge'> Nickname: " . $nick . "<span><br>";
                    }
                        echo "
                    <span class='ti-android'> crDroid version: " . $build_date[4] . "</span><br>
                    <span class='ti-calendar'> Last build: " . $build_date[2] . "</span><br>
                    <span class='ti-pencil-alt'> Build type: " . $v->buildtype . "<span><br>
                </div>
                <div class='dl'>";
                    if (empty($v->download)) {
                        echo "
                    <span class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Download crDroid</span>";
                    }else{
                        echo "
                    <a href='" . $v->download . "' class='btn btn-dark' target='_blank' title='" . $v->filename . "'><span class='ti-import'></span> Download crDroid</a>";
                    }
                    if (empty($v->gapps)) {
                        echo "
                    <span class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Google Apps</span>";
                    }else{
                        echo "
                    <a href='" . $v->gapps . "' class='btn btn-orange' target='_blank'><span class='ti-package'></span> Google Apps</a>";
                    }
                    if (empty($v->forum)) {
                        echo "
                    <span class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Support Forum</span>";
                    }else{
                        echo "
                    <a href='" . $v->forum . "' class='btn btn-light' target='_blank'><span class='ti-comments-smiley'></span> Support Forum</a>";
                    }
                echo "
                    </div>
                </div>
                ";
                    }
                }
            }
        }
    ?>
    
            </div>
        </div>
    </div>
    
    <?php include 'footer.php';?>
</body>
</html>