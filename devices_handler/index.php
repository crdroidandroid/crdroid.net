<?php
$ver = null;
if (isset($_GET['regenerate'])){
	$ver = $_GET['regenerate'];
}

function CountJSON($version){
	$folderPath = 'v' . $version . '.x/';
	$file = glob($folderPath . '*.json');
	$countFile = 0;
	if ($file != false){
		$countFile = count($file);
	}
	return $countFile;
}

function WriteTmpJSON($version, $writedata){
	$file = $version . '.json.tmp';
	file_put_contents($file, $writedata.PHP_EOL, FILE_APPEND);
}

function WriteJSON($version){
	$tmpfile = $version . '.json.tmp';
	$writefile = $version . 'convert.json';
	if (file_exists($tmpfile)){
		if (file_exists($writefile)){
			unlink($writefile);
		}
		rename($tmpfile,$writefile);
	}
}

function FinalizeJSON($version){
	WriteJSON($version);
	$input = json_decode(file_get_contents($version.'convert.json'), true);
	$output = $version . '.json';
	$records = [];
	foreach($input as $key => $value){
		$brand = $value[0]['oem'];
		unset($value[0]['oem']);
		$records[$brand][$key] = $value[0];
	}
	ksort($records);
	$data = json_encode($records, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
	file_put_contents($output, $data);
	unlink($version.'convert.json');
}

function deleteDir($path) {
    if (empty($path)) { 
        return false;
    }
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}

function moveChangelog($version){
	$dir = 'v' . $version . '.x';
	$dirNew = '../changelog/v' . $version . '.x/';
	unlink($dir . '/initial support/createjson.sh');
	rmdir($dir . '/initial support');
	mkdir($dirNew, 0777, true);
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
			//exclude unwanted 
				if (strpos($file, '.md')) continue;
				if (strpos($file, '.json')) continue;

				if (rename($dir.'/'.$file, $dirNew.'/'.$file)){
					//move done
				}else {
					//move fail
				}
			}
			closedir($dh);
		}
	}
}

function updateStats($version){
	file_get_contents("https://[server:port]/updatestats?version=" . $version);
}

function CompileJSON($version) {
	WriteTmpJSON($version, '{');
	$files = glob('v' . $version . '.x/*.json', GLOB_BRACE);
	$tab = "\t";
	$countto = CountJSON($version);
	$countup = 0;
	foreach($files as $file) {
		++$countup;
		$json = file_get_contents($file);
		$json_data = json_decode($json,true);
		if($json_data === null) {
			continue;
		}
		
		$oem=$json_data['response'][0]['oem'] ?? null;
		$codename=str_replace('v' . $version . '.x/','',str_replace('.json','',$file));
		$device=$json_data['response'][0]['device'] ?? null;
		$maintainer_arr=explode("(", $json_data['response'][0]['maintainer']);
		$maintainer=$maintainer_arr[0] ?? null;
		$nick=str_replace(")","",$json_data['response'][0]['maintainer']) ?? null;
		$nick_arr=explode("(", $nick);
		$nick=$nick_arr[1] ?? null;
		$crversion=$json_data['response'][0]['version'] ?? null;
		$builddatea_arr=explode("-", $json_data['response'][0]['filename']);
		$builddate=$builddatea_arr[2] ?? null;
		$buildtype=$json_data['response'][0]['buildtype'] ?? null;
		$download=$json_data['response'][0]['download'] ?? null;
		$gapps=$json_data['response'][0]['gapps'] ?? null;
		$recovery=$json_data['response'][0]['recovery'] ?? null;
		$firmware=$json_data['response'][0]['firmware'] ?? null;
		$paypal=$json_data['response'][0]['paypal'] ?? null;
		$telegram=$json_data['response'][0]['telegram'] ?? null;
		$size=$json_data['response'][0]['size'] ?? null;
		$forum=$json_data['response'][0]['forum'] ?? null;
		$md5=$json_data['response'][0]['md5'] ?? null;

		if (is_null($oem) || is_null($codename) || is_null($device) || is_null($maintainer) || is_null($crversion) || is_null($builddate) || is_null($buildtype) || is_null($download) || is_null($forum)) {
			goto nextDevice;
		}

		WriteTmpJSON($version, $tab . '"' . $codename . '": [');
		WriteTmpJSON($version, $tab . $tab . "{");
		WriteTmpJSON($version, $tab . $tab . $tab . '"oem": "' . ucfirst($oem) . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"device": "' . $device . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"maintainer": "' . trim($maintainer) . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"nick": "' . $nick . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"crversion": "' . $crversion . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"builddate": "' . $builddate . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"buildtype": "' . $buildtype . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"download": "' . $download . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"gapps": "' . $gapps . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"recovery": "' . $recovery . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"firmware": "' . $firmware . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"paypal": "' . $paypal . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"telegram": "' . $telegram . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"size": ' . $size . ',');
		WriteTmpJSON($version, $tab . $tab . $tab . '"forum": "' . $forum . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"md5": "' . $md5 . '"');
		WriteTmpJSON($version, $tab . $tab . '}');
		if ($countup == $countto){
			WriteTmpJSON($version, $tab . ']');
		}else{
			WriteTmpJSON($version, $tab . '],');
		}
	}
nextDevice:
	WriteTmpJSON($version, '}');
	FinalizeJSON($version);
	moveChangelog($version);
	deleteDir('v' . $version . '.x');
	updateStats($version);
}

if (!$ver == null){
	CompileJSON($ver);
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method){
		case 'GET':
			$response=array();
			$response=array('message' =>'Generated JSON data for crDroid v' . $ver);
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Methods: GET, POST");
			header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
			header('Content-Type: application/json');
			echo json_encode($response);
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
} else {
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method){
		case 'GET':
			$response=array();
			$response=array('message' =>'Invalid version');
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Methods: GET, POST");
			header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
			header('Content-Type: application/json');
			echo json_encode($response);
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
}
?>
