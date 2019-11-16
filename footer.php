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
					<p><i class=\"fas fa-map-marked-alt\"></i> <a href=\"https://github.com/crdroidandroid\">crDroid Android @ GitHub</a><br><i class=\"fas fa-mail-bulk\"></i> <a href=\"mailto:contact@crdroid.net\">contact@crdroid.net</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class=\"copyrights\">
		<div class=\"container\">
			<p>Showing data from cache set " . date("F d Y H:i:s.", filemtime('update_crversion.xml')). "</p>
			<p>COPYRIGHT © 2016-" . date("Y") . ". ALL RIGHTS RESERVED.</p>
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

echo "
<!-- Quantcast Choice. Consent Manager Tag -->
<script type=\"text/javascript\" async=true>
    var elem = document.createElement('script');
    elem.src = 'https://quantcast.mgr.consensu.org/cmp.js';
    elem.async = true;
    elem.type = \"text/javascript\";
    var scpt = document.getElementsByTagName('script')[0];
    scpt.parentNode.insertBefore(elem, scpt);
    (function() {
    var gdprAppliesGlobally = true;
    function addFrame() {
        if (!window.frames['__cmpLocator']) {
        if (document.body) {
            var body = document.body,
                iframe = document.createElement('iframe');
            iframe.style = 'display:none';
            iframe.name = '__cmpLocator';
            body.appendChild(iframe);
        } else {
            // In the case where this stub is located in the head,
            // this allows us to inject the iframe more quickly than
            // relying on DOMContentLoaded or other events.
            setTimeout(addFrame, 5);
        }
        }
    }
    addFrame();
    function cmpMsgHandler(event) {
        var msgIsString = typeof event.data === \"string\";
        var json;
        if(msgIsString) {
        json = event.data.indexOf(\"__cmpCall\") != -1 ? JSON.parse(event.data) : {};
        } else {
        json = event.data;
        }
        if (json.__cmpCall) {
        var i = json.__cmpCall;
        window.__cmp(i.command, i.parameter, function(retValue, success) {
            var returnMsg = {\"__cmpReturn\": {
            \"returnValue\": retValue,
            \"success\": success,
            \"callId\": i.callId
            }};
            event.source.postMessage(msgIsString ?
            JSON.stringify(returnMsg) : returnMsg, '*');
        });
        }
    }
    window.__cmp = function (c) {
        var b = arguments;
        if (!b.length) {
        return __cmp.a;
        }
        else if (b[0] === 'ping') {
        b[2]({\"gdprAppliesGlobally\": gdprAppliesGlobally,
            \"cmpLoaded\": false}, true);
        } else if (c == '__cmp')
        return false;
        else {
        if (typeof __cmp.a === 'undefined') {
            __cmp.a = [];
        }
        __cmp.a.push([].slice.apply(b));
        }
    }
    window.__cmp.gdprAppliesGlobally = gdprAppliesGlobally;
    window.__cmp.msgHandler = cmpMsgHandler;
    if (window.addEventListener) {
        window.addEventListener('message', cmpMsgHandler, false);
    }
    else {
        window.attachEvent('onmessage', cmpMsgHandler);
    }
    })();
    window.__cmp('init', {
    		'Language': 'en',
		'Initial Screen Reject Button Text': 'I do not accept',
		'Initial Screen Accept Button Text': 'I accept',
		'Purpose Screen Body Text': 'You can set your consent preferences and determine how you want your data to be used based on the purposes below. You may set your preferences for us independently from those of third-party partners. Each purpose has a description so that you know how we and partners use your data.',
		'Vendor Screen Body Text': 'You can set consent preferences for each individual third-party company below. Expand each company list item to see what purposes they use data for to help make your choices. In some cases, companies may disclose that they use your data without asking for your consent, based on their legitimate interests. You can click on their privacy policies for more information and to opt out.',
		'Vendor Screen Accept All Button Text': 'Accept all',
		'Vendor Screen Reject All Button Text': 'Reject all',
		'Initial Screen Body Text': 'We and our partners use technology such as cookies on our site to personalise content and ads, provide social media features, and analyse our traffic. Click below to consent to the use of this technology across the web. You can change your mind and change your consent choices at anytime by returning to this site.',
		'Initial Screen Body Text Option': 1,
		'Publisher Name': 'crDroid Android',
		'Publisher Logo': 'https://crdroid.net/img/logo.png',
		'Display UI': 'always',
		'Publisher Purpose IDs': [1,2,3,4,5],
		'Post Consent Page': 'https://google.com',
		'UI Layout': 'banner',
    });
</script>
<!-- End Quantcast Choice. Consent Manager Tag -->
    <style>
        .qc-cmp-button {
          background-color: #71c55d !important;
          border-color: #71c55d !important;
        }
        .qc-cmp-button:hover {
          background-color: transparent !important;
          border-color: #71c55d !important;
        }
        .qc-cmp-alt-action,
        .qc-cmp-link {
          color: #71c55d !important;
        }
        .qc-cmp-button {
          color: #000 !important;
        }
        .qc-cmp-button.qc-cmp-secondary-button {
          border-color: #e53935 !important;
          background-color: transparent !important;
        }
        .qc-cmp-button.qc-cmp-secondary-button:hover {
          background-color: #e53935 !important;
        }
        .qc-cmp-ui,
        .qc-cmp-ui .qc-cmp-main-messaging,
        .qc-cmp-ui .qc-cmp-messaging,
        .qc-cmp-ui .qc-cmp-beta-messaging,
        .qc-cmp-ui .qc-cmp-title,
        .qc-cmp-ui .qc-cmp-sub-title,
        .qc-cmp-ui .qc-cmp-purpose-info,
        .qc-cmp-ui .qc-cmp-table,
        .qc-cmp-ui .qc-cmp-table-header,
        .qc-cmp-ui .qc-cmp-vendor-list,
        .qc-cmp-ui .qc-cmp-vendor-list-title {
            color: #000000 !important;
        }
        .qc-cmp-ui {
            background-color: #ffffff !important;
        }
        .qc-cmp-publisher-purposes-table .qc-cmp-table-header {
          background-color: #fafafa !important;
        }
        .qc-cmp-publisher-purposes-table .qc-cmp-table-row {
          background-color: #ffffff !important;
        }
    </style>";
?>
