<?php
// Devices.xml reader by Gabriel Lup
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

function GetDeviceName($id){
	$name = '';

	//the old XML way
	$xmlbranches = array("8.1", "9.0");
	$arrlength = count($xmlbranches);

	for($x = 0; $x < $arrlength; $x++) {
		$xml = simplexml_load_file('update_v' . $xmlbranches[$x] . '.xml');
		foreach ($xml as $manufacturer){
			foreach ($manufacturer as $k => $v){
				if ($k == $id){
					$name = $v->devicename;
					goto endme;
				}
			}
		}
	}

	//JSON way
	$jsonbranches = array("6", "7");
	$arrlength = count($jsonbranches);

	for($x = 0; $x < $arrlength; $x++) {
		$json_array = json_decode(file_get_contents('devices_handler/' . $jsonbranches[$x] .'.json'), true);
		foreach($json_array as $key => $arrays){
			foreach($arrays as $devicecodename => $devicename){
				if ($devicecodename == $id){
					$name = $devicename['device'];
					goto endme;
				}
			}
		}
	}
endme:
	return $name;
}

function DeviceExistsInBranch($version, $id) {
	$result = false;
	if (file_exists('update_' . $version . '.xml')) {
		$xml = simplexml_load_file('update_' . $version . '.xml');
		foreach ($xml as $manufacturer){
			foreach ($manufacturer as $k => $v){
				if ($k == $id){
					$result = true;
					goto endme;
				}
			}
		}
	} else {
		$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
		foreach($json_array as $key => $arrays){
			foreach($arrays as $devicecodename => $devicename){
				if ($devicecodename == $id){
					$result = true;
					goto endme;
				}
			}
		}
	}
endme:
	return $result;
}

function GetSupportedDevices($version){
	$nr_of_devices = 0;
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		foreach($arrays as $devicecodename => $devicename){
			$result = true;
			$nr_of_devices = $nr_of_devices + 1;
		}
	}
	return $nr_of_devices;
}

function GetSupportedOEMS($version){
	$nr_of_oems = 0;
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		$result = true;
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
				$cr_version = explode(".zip", $build_date[4]);
				$maintainer_arr = $v->maintainer;
				$maintainer = explode("(", $maintainer_arr);
				if (isset($maintainer[1])) {
					$nick = str_replace(")","",$maintainer[1]);
					$nick_arr = explode(",", $nick);
					$nick = $nick_arr[0];
				}else{
					$nick = null;
				}				
				if (!empty($maintainer[0])) {
					echo "
							<div class=\"device\">";
				}else{
					echo "
							<div class=\"device unmaintained\">";
						$maintainer[0] = '<span style="opacity: 0.3;">Unmaintained <i class="far fa-frown"></i></span>';
				}
					echo "
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
											<div class=\"version\">" . $cr_version[0] . "</div><br>
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
					$cr_version = explode(".zip", $build_date[4]);
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
						if (!empty($maintainer[0])) {
							echo "
							<div class=\"device\">";
						}else{
							echo "
							<div class=\"device unmaintained\">";
							$maintainer[0] = '<span style="opacity: 0.3;">Unmaintained <i class="far fa-frown"></i></span>';
						}
                        echo "
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
											<div class=\"version\">" . $cr_version[0] . "</div><br>
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

function crDroid_Version($version){
	$cr = null;
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		foreach($arrays as $devicecodename => $devicename){
			$ver=explode(".",$devicename['crversion']);
			if (is_null($cr)){
				$cr = $ver[1];
			} elseif ($cr < $ver[1]) {
				$cr = $ver[1];
			}
		}
	}
	return $version . "." . $cr;
}

//JSON way
function ReadJSON($version){
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		echo "<div class=\"manufacturer-2020\"><i class=\"fas fa-angle-double-left\"></i> " . $key ." <i class=\"fas fa-angle-double-right\"></i></div>";
		foreach($arrays as $devicecodename => $devicename){
			$img = null;
			$imgpath = "img/devices/" . $devicecodename .".png";
			if (file_exists($imgpath)){
				$img = "<img class=\"lazy\" data-src=\"" . $imgpath ."\" />";
			} else {
				$img = "<span style=\"margin-top: 30px; margin-left: 15px; display:block; font-size: 50px;\"><i class=\"fas fa-image\"></i></span>";
			}

			if (!empty($devicename['maintainer'])) {
				echo "
				<div class=\"device\">";
			}else{
				echo "
				<div class=\"device unmaintained\">";
			}
			echo "
				<div class=\"imgbox\">" . $img ."</div>
				<div class=\"details\">
					<p class=\"devicename\">" . $devicename['device'] ."</p>
					<p class=\"codename\"><span class=\"fa fa-code\"></span> Codename: <a href=\"/" . $devicecodename ."\">" . $devicecodename . "</a></p>
					<p class=\"crversion\"><span class=\"fab fa-android\"></span> crDroid version: " . $devicename['crversion'] . "</p>
					<a href=\"#\" class=\"btn\" data-toggle=\"modal\" data-target=\"#" . $devicecodename . $version ."\">Download details</a>
				</div>
			</div>";
		}
		echo "<div class=\"clearfix oemsplit\"></div>";
	}
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

function GenerateModal($version){
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		foreach($arrays as $devicecodename => $devicename){
			echo "
			<div class=\"modal fade\" id=\"" . $devicecodename . $version . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
			<div class=\"modal-dialog\" role=\"document\">
			  <div class=\"modal-content\">
				<div class=\"modal-header\">
				  <h5 class=\"modal-title\" id=\"exampleModalLabel\">crDroid for ". $devicename['device'] ."</h5>
				  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
					<span aria-hidden=\"true\">&times;</span>
				  </button>
				</div>
				<div class=\"modal-body\">
					<div class=\"infobox\">";
			if (empty($devicename['maintainer'])) {
					echo "<div class=\"alert alert-warning\" role=\"alert\">This version of crDroid is outdated or no longer supported. Check for other crDroid version or if you want to maintain it, read how to become maintainer @ <a href=\"https://github.com/crdroidandroid/android/blob/11.0/README.mkdn#3-how-to-become-an-official-maintainer\" target=\"_blank\" class=\"alert-link\">GitHub</a>.</div>";
				}
			echo "
					<table class=\"table table-sm table-borderless\">
					  <tbody>
					  	  <tr>
					  	  <th scope=\"row\"><i class=\"fas fa-copyright\"></i> OEM</th>
					  	  <td>" . $key . "</td>
					  	  </tr>
						  <tr>
						  <th scope=\"row\"><span class=\"fa fa-code\"></span> Codename</th>
						  <td>" . $devicecodename . "</td>
						  </tr>";
			if (!empty($devicename['maintainer'])) {
				echo "
						  <tr>
						  <th scope=\"row\"><i class=\"far fa-id-card\"></i> Maintainer</th>
						  <td>" . $devicename['maintainer'] . "</td>
						  </tr>";
			}
			if (!empty($devicename['nick'])) {
				echo "
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-id-card-alt\"></i> Nickname</th>
						  <td>" . $devicename['nick'] . "</td>
						  </tr>";
			}
			$size = (int)$devicename['size'];
			$zipsize = convertToMB($size);
				echo "
						  <tr>
						  <th scope=\"row\"><span class=\"fab fa-android\"></span> crDroid version</th>
						  <td>" . $devicename['crversion'] . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-business-time\"></i> Build date</th>
						  <td>" . beautifyDate($devicename['builddate']) . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-box-open\"></i> ZIP size</th>
						  <td>" . $zipsize . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-sitemap\"></i> Build type</th>
						  <td>" . $devicename['buildtype'] . "</td>
						  </tr>
					  </tbody>
					  </table>
					  <div class=\"buttons\">
					  	  <h5 class=\"text-left\">crDroid downloads:</h5>
						  <button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"window.open('" . $devicename['download'] . "','_blank')\"><i class=\"fa fa-arrow-alt-circle-down\"></i> Download latest version</button>
						  <button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('https://sourceforge.net/projects/crdroid/files/" . $devicecodename  . "/" . $version . ".x','_blank')\"'\"><i class=\"fas fa-folder-open\"></i> Download older versions</button>
						  <h5 class=\"text-left\">Useful links:</h5>
						  <div class=\"btn-group\">
  							<button type=\"button\" class=\"btn btn-warning btn-sm dropdown-toggle\"><i class=\"fa fa-headset\"></i> Support</button>
							<div class=\"dropdown-menu\">
								<a class=\"dropdown-item\" href=\"" . $devicename['forum'] . "\" target=\"_blank\"><i class=\"fas fa-bullhorn\"></i> Forum</a>";
			if (!empty($devicename['telegram'])){
				echo "			<a class=\"dropdown-item\" href=\"" . $devicename['telegram'] . "\" target=\"_blank\"><i class=\"fab fa-telegram-plane\"></i> Telegram</a>";
			}
				echo "
							</div>
						</div>			 
						  ";
				$changelogLink = "changelog/v" . $version . ".x/changelog_" . $devicecodename . ".txt";
				if (file_exists($changelogLink)){
					echo "
						<button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('" . $changelogLink . "','_blank')\"><i class=\"fas fa-list-alt\"></i> Changelog</button>";
				}
				if (!empty( $devicename['gapps'])){
					echo "
						  <button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"window.open('" . $devicename['gapps'] . "','_blank')\"><i class=\"fab fa-google\"></i> Gapps</button>";
				}
				if (!empty( $devicename['recovery'])){
					echo "
						  <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"window.open('" . $devicename['recovery'] . "','_blank')\"><i class=\"fas fa-terminal\"></i> Recovery</button>";
				}
				if (!empty( $devicename['firmware'])){
					echo "
						  <button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"window.open('" . $devicename['firmware'] . "','_blank')\"><i class=\"fas fa-microchip\"></i> Firmware</button>";
				}
				if (!empty( $devicename['paypal']) && !empty($devicename['maintainer'])){
					echo "
						  <button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"window.open('" . $devicename['paypal'] . "','_blank')\"><i class=\"fas fa-donate\"></i> Donate to maintainer</button>";
				}
				echo "
						  <button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('https://stats.crdroid.net/" . $devicecodename . "','_blank')\"><i class=\"fas fa-chart-line\"></i> Stats</button>
					  </div>
					</div>
				</div>
				<div class=\"modal-footer\">
				  <button type=\"button\" class=\"btn closebtn\" data-dismiss=\"modal\">Close</button>
				</div>
			  </div>
			</div>
		  </div>
			";
		}
	}
}

function ReadDeviceJSON($version, $id){
	$json_array = json_decode(file_get_contents('devices_handler/' . $version.'.json'), true);
	foreach($json_array as $key => $arrays){
		foreach($arrays as $devicecodename => $devicename){
			if ($devicecodename == $id){
				$img = null;
				$imgpath = "img/devices/" . $devicecodename .".png";
				if (file_exists($imgpath)){
					$img = "<img src=\"" . $imgpath ."\" />";
				} else {
					$img = "<span style=\"margin-top: 30px; margin-left: 15px; display:block; font-size: 150px;\"><i class=\"fas fa-image\"></i></span>";
				}

				if (empty($devicename['maintainer'])) {
					echo "<div class=\"alert alert-warning\" role=\"alert\">This version of crDroid is outdated or no longer supported. Check for other crDroid version in above tabs or if you want to maintain it, read how to become maintainer @ <a href=\"https://github.com/crdroidandroid/android/blob/11.0/README.mkdn#3-how-to-become-an-official-maintainer\" target=\"_blank\" class=\"alert-link\">GitHub</a>.</div>";
				}

				echo "
				<div class=\"imgbox\">
					" . $img . "
				</div>
				<div class=\"details\">
					<h3>crDroid for ". $devicename['device'] ."</h3>
					<hr>
					<table class=\"table table-sm table-borderless\">
					  <tbody>
					  	  <tr>
					  	  <th scope=\"row\"><i class=\"fas fa-copyright\"></i> OEM</th>
					  	  <td>" . $key . "</td>
					  	  </tr>
						  <tr>
						  <th scope=\"row\"><span class=\"fa fa-code\"></span> Codename</th>
						  <td>" . $devicecodename . "</td>
						  </tr>";
			if (!empty($devicename['maintainer'])) {
				echo "
						  <tr>
						  <th scope=\"row\"><i class=\"far fa-id-card\"></i> Maintainer</th>
						  <td>" . $devicename['maintainer'] . "</td>
						  </tr>";
			}
			if (!empty($devicename['nick'])) {
				echo "
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-id-card-alt\"></i> Nickname</th>
						  <td>" . $devicename['nick'] . "</td>
						  </tr>";
			}
			$size = (int)$devicename['size'];
			$zipsize = convertToMB($size);
				echo "
						  <tr>
						  <th scope=\"row\"><span class=\"fab fa-android\"></span> crDroid version</th>
						  <td>" . $devicename['crversion'] . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-business-time\"></i> Build date</th>
						  <td>" . beautifyDate($devicename['builddate']) . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-box-open\"></i> ZIP size</th>
						  <td>" . $zipsize . "</td>
						  </tr>
						  <tr>
						  <th scope=\"row\"><i class=\"fas fa-sitemap\"></i> Build type</th>
						  <td>" . $devicename['buildtype'] . "</td>
						  </tr>
					  </tbody>
					  </table>
					  <div class=\"buttons\">
					  	  <h5 class=\"text-left\">crDroid downloads:</h5>
						  <button type=\"button\" class=\"btn btn-success btn-sm\" onclick=\"window.open('" . $devicename['download'] . "','_blank')\"><i class=\"fa fa-arrow-alt-circle-down\"></i> Download latest version</button>
						  <button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('https://sourceforge.net/projects/crdroid/files/" . $devicecodename  . "/" . $version . ".x','_blank')\"'\"><i class=\"fas fa-folder-open\"></i> Download older versions</button>
						  <h5 class=\"text-left\">Useful links:</h5>
						  <div class=\"btn-group\">
  							<button type=\"button\" class=\"btn btn-warning btn-sm dropdown-toggle\"><i class=\"fa fa-headset\"></i> Support</button>
							<div class=\"dropdown-menu\">
								<a class=\"dropdown-item\" href=\"" . $devicename['forum'] . "\" target=\"_blank\"><i class=\"fas fa-bullhorn\"></i> Forum</a>";
			if (!empty($devicename['telegram'])){
				echo "			<a class=\"dropdown-item\" href=\"" . $devicename['telegram'] . "\" target=\"_blank\"><i class=\"fab fa-telegram-plane\"></i> Telegram</a>";
			}
				echo "
							</div>
						</div>			 
						  ";
				$changelogLink = "changelog/v" . $version . ".x/changelog_" . $devicecodename . ".txt";
				if (file_exists($changelogLink)){
					echo "
						<button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('" . $changelogLink . "','_blank')\"><i class=\"fas fa-list-alt\"></i> Changelog</button>";
				}
				if (!empty( $devicename['gapps'])){
					echo "
						  <button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"window.open('" . $devicename['gapps'] . "','_blank')\"><i class=\"fab fa-google\"></i> Gapps</button>";
				}
				if (!empty( $devicename['recovery'])){
					echo "
						  <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"window.open('" . $devicename['recovery'] . "','_blank')\"><i class=\"fas fa-terminal\"></i> Recovery</button>";
				}
				if (!empty( $devicename['firmware'])){
					echo "
						  <button type=\"button\" class=\"btn btn-secondary btn-sm\" onclick=\"window.open('" . $devicename['firmware'] . "','_blank')\"><i class=\"fas fa-microchip\"></i> Firmware</button>";
				}
				if (!empty( $devicename['paypal']) && !empty($devicename['maintainer'])){
					echo "
						  <button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"window.open('" . $devicename['paypal'] . "','_blank')\"><i class=\"fas fa-donate\"></i> Donate to maintainer</button>";
				}
				echo "
						  <button type=\"button\" class=\"btn btn-dark btn-sm\" onclick=\"window.open('https://stats.crdroid.net/" . $devicecodename . "','_blank')\"><i class=\"fas fa-chart-line\"></i> Stats</button>
				</div></div>";
				goto endme;
			} else {
				continue;
			}
		}
	}
	echo "There is no build information available for this version of crDroid <i class=\"far fa-sad-tear\"></i> <br>Check for other versions in the other tabs";
endme:
}

function GetLatestcrDroid($device) {
	// crDroid 4 if default
	$version = 4;
	
	if (DeviceExistsInBranch('v9.0', $device) == true) {
		$version = 5;
	}
	if (DeviceExistsInBranch('6', $device) == true) {
		$version = 6;
	}
	if (DeviceExistsInBranch('7', $device) == true) {
		$version = 7;
	}
return $version;
}
?>
