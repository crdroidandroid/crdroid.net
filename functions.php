<?php
function GetDomain() {
	return "https://crdroid.net";
}

function convertToMB($val) {
	$units = "MB";
	$val = $val / 1024 / 1024;
	$val = round($val, 1);
	if (strlen($val) > 5) {
		$val = $val / 1024;
		$val = round($val,1);
		$units = "GB";
	}
	return $val . " " . $units;
}

function beautifyDate($val) {
	$split = str_split($val, 2);
	return $split[0] . $split[1] . "-" . $split[2] . "-" . $split[3];
}

function GetDeviceInfo($codename, $version){
	$details = array();
	$json_array = json_decode(file_get_contents('devices_handler/compiled.json'), true);
	foreach($json_array as $key => $arrays){
		// OEM here
		foreach($arrays as $devicecodename => $data){
			//codename here
			if ($devicecodename == $codename){
				foreach ($data as $crversion => $info){
					//all versions listed here in array
					if ($crversion == $version){
						//exact version looking for
						$details[] = $key;
						$details[] = $info;
						goto outofhere;
					}
				}
			}
		}
	}
outofhere:
	return $details;
}

function crVersionToAndroid($checkVersion){
	$versions = array(
		6 => 10,
		7 => 11
	);

	return $versions[$checkVersion];
}
?>