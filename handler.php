<?php
// Devices.xml reader by Gabriel Lup
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$url_crversion="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crdroid/9.0/config/common.mk";
isUpdateNeeded($url_crversion, 'crversion');
$url_v8_1="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crDroidOTA/8.1/update.xml";
isUpdateNeeded($url_v8_1, 'v8.1');
$url_v9_0="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crDroidOTA/9.0/update.xml";
isUpdateNeeded($url_v9_0, 'v9.0');

function GetXMLfromGitHub($url, $version) {
	$fp = fopen('data', 'w+');
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_exec($ch);
	$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($statusCode == 200){
		rename('data','update_' . $version . '.xml');
	}else{
		unlink('data');
		echo "<span style='margin: 0 auto; font-weight: bold; text-align: center;'>Can not read data from GitHub. This is most likely a temporary issue.</span>";
	}
}

function isUpdateNeeded($url, $version){
	// Don't spam GitHub with request - it blocks them after a while (temporary ban on domain)
	// Do update every 5 minutes (300 seconds)
	if (! file_exists('update_' . $version . '.xml')) {
		GetXMLfromGitHub($url, $version);
	}else{
    	if (filemtime('update_' . $version . '.xml') + 300 < strtotime('now')) {
			GetXMLfromGitHub($url, $version);
   		}
	}
}

function GetDeviceName($id){
	$name = '';
	$branches = array("8.1", "9.0");
	$arrlength = count($branches);
	
	for($x = 0; $x < $arrlength; $x++) {
		$xml = simplexml_load_file('update_v' . $branches[$x] . '.xml');
		foreach ($xml as $manufacturer){
			foreach ($manufacturer as $k => $v){
				if ($k == $id){
					$name = $v->devicename;
				}
			}
		}
	}
	return $name;
}

function DeviceExistsInBranch($version, $id) {
	$result = false;
	$xml = simplexml_load_file('update_' . $version . '.xml');
	foreach ($xml as $manufacturer){
		foreach ($manufacturer as $k => $v){
			if ($k == $id){
				$result = true;
			}
		}
	}
	return $result;
}

function GetSupportedDevices($version){
	$nr_of_devices = 0;
	$xml = simplexml_load_file('update_v' . $version . '.xml');
	foreach ($xml as $manufacturer){
		foreach ($manufacturer as $k => $v){
			$nr_of_devices = $nr_of_devices + 1;
		}
	}
	return $nr_of_devices;
}

function GetSupportedOEMS($version){
	$nr_of_oems = 0;
	$xml = simplexml_load_file('update_v' . $version . '.xml');
	foreach ($xml as $manufacturer){
		$nr_of_oems = $nr_of_oems + 1;
	}
	return $nr_of_oems;
}

function ReturnDevices($version) {
	if (file_exists('update_'. $version . '.xml')) {
		$xml = simplexml_load_file('update_'. $version . '.xml');
		foreach($xml as $manufacturer){
			//manufacturer
			echo "
							<div class=\"manufacturer\"><i class=\"fas fa-angle-double-left\"></i> " . $manufacturer['id'] . " <i class=\"fas fa-angle-double-right\"></i></div>";

			//devices
			foreach ($manufacturer as $k => $v) {
				$build_date = explode("-", $v->filename);
				$version = explode(".zip", $build_date[4]);
				$maintainer_arr = $v->maintainer;
				$maintainer = explode("(", $maintainer_arr);
				if (isset($maintainer[1])) {
					$nick = str_replace(")","",$maintainer[1]);
					$nick_arr = explode(",", $nick);
					$nick = $nick_arr[0];
				}else{
					$nick = null;
				}
					echo "
							<div class=\"device\">
								<div class=\"body\">
									<div class=\"header-row\">
										<div class=\"cell\"><small><span class=\"fa fa-mobile-alt\"></span> Device</small><br><span class=\"device-text\">" . $v->devicename ."</span></div>
										<div class=\"cell\"><small><span class=\"fa fa-code\"></span> Codename</small><br><span class=\"device-text\"><a href='/" . $k . "' rel='bookmark'>" . $k . "</a></span></div>
									</div>
									<div class=\"row\">
										<div class=\"cell alternative\">
											<span style=\"display: inline-block; text-align: left;\">
											<div><span class=\"fa fa-user-circle\"></span></div>
											<div class=\"maintainer\">" . $maintainer[0] . "</div><br>";
											if (!empty($nick)) {
												echo "
											<div><span class=\"far fa-user\"></span></div>
											<div class=\"nickname\">" . $nick . "</div><br>";}
											echo "
											<div><span class=\"fab fa-android\"></span></div>
											<div class=\"version\">" . $version[0] . "</div><br>
											<div><span class=\"fa fa-calendar-alt\"></span></div>
											<div class=\"build-date\">" . $build_date[2] . "</div><br>
											<div><span class=\"fas fa-rss\"></span></div>
											<div class=\"build-type\">" . $v->buildtype . "</div><br>
											</span>
										</div>
										<div class=\"cell\">
											<div style=\"float: left\"><div class=\"divider\"></div></div>
											<div style=\"margin: 0 auto;\">
												<button onclick=\"location.href='" . $v->download . "'\" class=\"btn\"><i class=\"fa fa-arrow-alt-circle-down\"></i></button>";
												if (empty($v->forum)) {
												echo "
												<button disabled onclick=\"location.href='#'\" class=\"btn support\"><i class=\"fa fa-headset\"></i></button>";}else{
												echo "
												<button onclick=\"location.href='" . $v->forum . "'\" class=\"btn support\"><i class=\"fa fa-headset\"></i></button>";}
												echo "
											</div>
										</div>
									</div>
								</div>
							</div> 
";
			}
		}
	}
}


function ReturnDeviceInfo($version, $id) {
	if (file_exists('update_'. $version . '.xml')) {
            $xml = simplexml_load_file('update_'. $version . '.xml');
            foreach($xml as $manufacturer){
                foreach ($manufacturer as $k => $v){
                    if ($k == $id){
                    $build_date = explode("-", $v->filename);
					$version = explode(".zip", $build_date[4]);
                    $maintainer_arr = $v->maintainer;
                    $maintainer = explode("(", $maintainer_arr);
                    if (isset($maintainer[1])) {
                        $nick = str_replace(")","",$maintainer[1]);
						$nick_arr = explode(",", $nick);
						$nick = $nick_arr[0];
                    }else{
                        $nick = null;
                    }
                        echo "
							<div class=\"manufacturer\"><i class=\"fas fa-angle-double-left\"></i> " . $manufacturer['id'] . " <i class=\"fas fa-angle-double-right\"></i></div>";
                        echo "
							<div class=\"device\">
								<div class=\"body\">
									<div class=\"header-row\">
										<div class=\"cell\"><small><span class=\"fa fa-mobile-alt\"></span> Device</small><br><span class=\"device-text\">" . $v->devicename ."</span></div>
										<div class=\"cell\"><small><span class=\"fa fa-code\"></span> Codename</small><br><span class=\"device-text\"><a href='/" . $k . "' rel='bookmark'>" . $k . "</a></span></div>
									</div>
									<div class=\"row\">
										<div class=\"cell alternative\">
											<span style=\"display: inline-block; text-align: left;\">
											<div><span class=\"fa fa-user-circle\"></span></div>
											<div class=\"maintainer\">" . $maintainer[0] . "</div><br>";
											if (!empty($nick)) {
												echo "
											<div><span class=\"far fa-user\"></span></div>
											<div class=\"nickname\">" . $nick . "</div><br>";}
											echo "
											<div><span class=\"fab fa-android\"></span></div>
											<div class=\"version\">" . $version[0] . "</div><br>
											<div><span class=\"fa fa-calendar-alt\"></span></div>
											<div class=\"build-date\">" . $build_date[2] . "</div><br>
											<div><span class=\"fas fa-rss\"></span></div>
											<div class=\"build-type\">" . $v->buildtype . "</div><br>
											</span>
										</div>
										<div class=\"cell\">
											<div style=\"float: left\"><div class=\"divider\"></div></div>
											<div style=\"margin: 0 auto;\">
												<button onclick=\"location.href='" . $v->download . "'\" class=\"btn\"><i class=\"fa fa-arrow-alt-circle-down\"></i></button>";
												if (empty($v->forum)) {
												echo "
												<button disabled onclick=\"location.href='#'\" class=\"btn support\"><i class=\"fa fa-headset\"></i></button>";}else{
												echo "
												<button onclick=\"location.href='" . $v->forum . "'\" class=\"btn support\"><i class=\"fa fa-headset\"></i></button>";}
												echo "
											</div>
										</div>
									</div>
								</div>
							</div> 
";
                }
            }
        }
    }
	if (DeviceExistsInBranch($version, $id) == false) {
		echo "There is no build information available for this version of crDroid <i class=\"far fa-sad-tear\"></i> <br>Check for other versions in the other tabs";
	}	
}

function crDroid_Version(){
	$common = file_get_contents('update_crversion.xml');
	$arr = explode(' ', $common);
	$linenr = 0;
	foreach ($arr as &$value) {
		$linenr = $linenr + 1;
		if (strpos($value, 'CR_VERSION') !== false) {
			$cr_version =  preg_split("/\r\n|\n|\r/", $arr[$linenr + 1] );
			return $cr_version[0];
			break;
		}
	}
}
?>
