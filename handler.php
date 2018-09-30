<?php
// Devices.xml reader by Gabriel Lup
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
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

function ReturnDevices($version) {
	if (file_exists('update_'. $version . '.xml')) {
		$xml = simplexml_load_file('update_'. $version . '.xml');
		foreach($xml as $manufacturer){
			//manufacturer
			echo "
		<div class='manufacturer'>
			<span class='ti-folder'> " . $manufacturer['id'] . "</span>
		</div>";

			//devices
			foreach ($manufacturer as $k => $v) {
				$build_date = explode("-", $v->filename);
				$maintainer_arr = $v->maintainer;
				$maintainer = explode("(", $maintainer_arr);
				if (isset($maintainer[1])) {
					$nick = str_replace(")","",$maintainer[1]);
				}else{
					$nick = null;
				}
			echo "
			<div class='device'>
				<div class='main'>
				<span class='ti-mobile'> Device: " . $v->devicename . "</span><br>
				<span class='ti-receipt links'> Codename: <a href='https://crdroid.net/" . $k . "' rel='bookmark'>" . $k . "</a></span></br>
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

function ReturnDeviceInfo($version, $id) {
	if (file_exists('update_'. $version . '.xml')) {
            $xml = simplexml_load_file('update_'. $version . '.xml');
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
                    <span class='ti-mobile'> Device: " . $v->devicename . "</span><br>
                    <span class='ti-receipt links'> Codename: <a href='https://crdroid.net/" . $k . "' rel='bookmark'>" . $k . "</a></span></br>
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
	if (DeviceExistsInBranch($version, $id) == false) {
		echo "There is no build information available for this version";
	}	
}
?>