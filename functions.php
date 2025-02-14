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
		7 => 11,
		8 => 12,
		9 => 13,
		10 => 14,
		11 => 15
	);

	return $versions[$checkVersion];
}

function changelogFile($checkVersion, $device){
    $changelog = '';
    if (strlen($checkVersion) > 1) {
        $changelog = "../changelog/v" . $checkVersion . ".x/" . $device . "_changelog.txt";
    } else {
        $changelog = "../changelog/v" . $checkVersion . ".x/changelog_" . $device . ".txt";
    }
    return $changelog;
}

function outputAds($checkHash = false) {
    $url = GetDomain() . "/ads.json";
    $jsonData = file_get_contents($url);
    
    if ($jsonData === false) {
        echo "<!-- Failed to fetch ads.json -->";
        return;
    }
    
    $adsData = json_decode($jsonData, true);
    
    if (!is_array($adsData) || !isset($adsData['ads'])) {
        echo "<!-- Invalid ads.json format -->";
        return;
    }
    
    $adsConfig = $adsData['ads'];
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var disableOnclick = false;
    ';

    if ($checkHash) {
        echo '
            if (window.location.hash) {
                disableOnclick = true;
            }
        ';
    }

    if (isset($adsConfig['onclick']) && $adsConfig['onclick'] === true) {
        echo '
            if (!disableOnclick) {
                var script = document.createElement("script");
                script.src = "https://shebudriftaiter.net/tag.min.js";
                script.setAttribute("data-zone", "8906164");
                (document.body || document.documentElement).appendChild(script);
            }
        ';
    }

    if (isset($adsConfig['inpage']) && $adsConfig['inpage'] === true) {
        echo '
            var script = document.createElement("script");
            script.src = "https://vemtoutcheeg.com/400/8906259";
            (document.body || document.documentElement).appendChild(script);
        ';
    }

    if (isset($adsConfig['native']) && $adsConfig['native'] === true) {
        echo '
            var script = document.createElement("script");
            script.src = "https://groleegni.net/401/8906340";
            (document.body || document.documentElement).appendChild(script);
        ';
    }

    echo '
        });
    </script>';
}
?>
