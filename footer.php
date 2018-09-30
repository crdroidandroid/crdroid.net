<?php
echo "
	<div class=\"light-bg py-5\" id=\"contact\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6 text-center text-lg-left\">
                    <p class=\"mb-2\"> <span class=\"ti-location-pin mr-2\"></span> GitHub.com <span class=\"ti-face-smile\" style=\"font-size: 14px;\"></span></p>
                    <div class=\"d-block d-sm-inline-block\">
                        <p class=\"mb-2\">
                            <span class=\"ti-email mr-2\"></span> <a class=\"mr-4\" href=\"mailto:contact@crdroid.net\">mailto:contact@crdroid.net</a>
                        </p>
                    </div>
                </div>
                <div class=\"col-lg-6\">
                    <div class=\"social-icons\">
                        <a href=\"https://github.com/crdroidandroid\" target=\"_blank\"><span class=\"ti-github\"></span></a>
                        <a href=\"https://plus.google.com/communities/118297646046960923906\" target=\"_blank\"><span class=\"ti-google\"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    
    <footer class=\"my-5 text-center\">
        <div class='timestamp'>Showing data from cache set " . date("F d Y H:i:s.", filemtime('update_v8.1.xml')). "</div>
        <p class=\"mb-2\"><small>COPYRIGHT © 2016-" . date("Y") . ". ALL RIGHTS RESERVED. <br>Designed by <a href=\"https://gwolf2u.com\" target=\"_blank\">Lup Gabriel</a></small></p>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src=\"js/jquery-3.2.1.min.js\"></script>
    <script src=\"js/bootstrap.bundle.min.js\"></script>
    <!-- Plugins JS -->
    <script src=\"js/owl.carousel.min.js\"></script>
    <!-- Custom JS -->
    <script src=\"js/script.js\"></script>";
?>