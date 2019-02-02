<?php
echo "
<!--==========================
	Footer
============================-->
<section id=\"contact\"></section>
<footer class=\"footer\">
	<div class=\"container\">
		<div class=\"row\">
			<div class=\"col-md-12 col-lg-4\">
				<div class=\"footer-logo\">
					<a class=\"navbar-brand\" href=\"https://crdroid.net\">crDroid Android</a>
					<p><i class=\"fas fa-search-location\"></i>  GitHub.com<br><i class=\"fas fa-mail-bulk\"></i> <a href=\"mailto:contact@crdroid.net\">contact@crdroid.net</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class=\"copyrights\">
		<div class=\"container\">
			<p>Showing data from cache set " . date("F d Y H:i:s.", filemtime('update_v8.1.xml')). "</p>
			<p>&copy; COPYRIGHT © 2016-" . date("Y") . ". ALL RIGHTS RESERVED.</p>
			<div class=\"credits\">Designed by <a href=\"https://gwolf2u.com\">Lup Gabriel</a></div>
		</div>
	</div>
</footer>

<a href=\"#\" class=\"back-to-top\"><i class=\"fa fa-chevron-up\"></i></a>

<!-- JavaScript Libraries -->
<script src=\"lib/jquery/jquery.min.js\"></script>
<script src=\"lib/jquery/jquery-migrate.min.js\"></script>
<script src=\"lib/bootstrap/js/bootstrap.bundle.min.js\"></script>
<script src=\"lib/superfish/hoverIntent.js\"></script>
<script src=\"lib/superfish/superfish.min.js\"></script>
<script src=\"lib/easing/easing.min.js\"></script>
<script src=\"lib/modal-video/js/modal-video.js\"></script>
<script src=\"lib/owlcarousel/owl.carousel.min.js\"></script>
<script src=\"lib/wow/wow.min.js\"></script>

<!-- Main Javascript File -->
<script src=\"js/main.js\"></script>
";
?>
