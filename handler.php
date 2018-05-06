<?php
// Devices.xml reader by Gabriel Lup
$branch="8.1";
$GitHub_devices="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crDroidOTA/" . $branch . "/update.xml";

function GetXMLfromGitHub($url) {
	$fp = fopen('data', 'w+');
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	curl_exec($ch);
	$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($statusCode == 200){
		rename('data','update.xml');
	}else{
		unlink('data');
		echo "<span style='margin: 0 auto; font-weight: bold; text-align: center;'>Can not read data from GitHub. This is most likely a temporary issue.</span>";
	}
}

function isUpdateNeeded(){
	// Don't spam GitHub with request - it blocks them after a while (temporary ban on domain)
	// Do update every 30 minutes (1800 seconds)
	if (! file_exists('update.xml')) {
		GetXMLfromGitHub($GLOBALS['GitHub_devices']);
	}else{
    	if (filemtime('update.xml') + 1800 < strtotime('now')) {
			GetXMLfromGitHub($GLOBALS['GitHub_devices']);
   		}
	}
}

function GetDeviceName($id){
	$name = '';
	$xml = simplexml_load_file('update.xml');
	foreach ($xml as $manufacturer){
		foreach ($manufacturer as $k => $v){
			if ($k == $id){
				$name = $v->devicename;
			}
		}
	}
	return $name;
}

function GetSupportedManufactures(){
	$nr_of_manufacturers = 0;
	isUpdateNeeded();
	$xml = simplexml_load_file('update.xml');
	foreach ($xml as $manufacturer){
		$nr_of_manufacturers = $nr_of_manufacturers + 1;
	}
	return $nr_of_manufacturers;
}

function GetSupportedDevices(){
	$nr_of_devices = 0;
	isUpdateNeeded();
	$xml = simplexml_load_file('update.xml');
	foreach ($xml as $manufacturer){
		foreach ($manufacturer as $k => $v){
			$nr_of_devices = $nr_of_devices + 1;
		}
	}
	return $nr_of_devices;
}
?>