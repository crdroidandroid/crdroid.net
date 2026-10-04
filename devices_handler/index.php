<?php
$ver = null;
if (isset($_GET['regenerate'])){
	$ver = $_GET['regenerate'];
}
$debug = isset($_GET['debug']) && $_GET['debug'] === 'true';

function debug_log($message) {
	global $debug;
	if ($debug) {
		echo "<!-- DEBUG: " . htmlspecialchars($message) . " -->\n";
	}
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
	debug_log("FinalizeJSON: Writing JSON for version " . $version);
	WriteJSON($version);
	$convertFile = $version . 'convert.json';
	if (!file_exists($convertFile)) {
		debug_log("FinalizeJSON: ERROR - convert file does not exist: " . $convertFile);
		return;
	}
	$raw = file_get_contents($convertFile);
	debug_log("FinalizeJSON: convert file size: " . strlen($raw) . " bytes");
	$input = json_decode($raw, true);
	if ($input === null) {
		debug_log("FinalizeJSON: ERROR - JSON decode failed: " . json_last_error_msg());
		return;
	}
	debug_log("FinalizeJSON: Decoded " . count($input) . " entries");
	$output = $version . '.json';
	$records = [];
	foreach($input as $key => $value){
		$brand = $value[0]['oem'];
		unset($value[0]['oem']);
		$records[$brand][$key] = $value[0];
	}
	ksort($records);
	$data = json_encode($records, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
	debug_log("FinalizeJSON: Writing output file: " . $output . " (" . strlen($data) . " bytes)");
	file_put_contents($output, $data);
	unlink($convertFile);
	debug_log("FinalizeJSON: Completed");
}

function CompileFullJSON() {
    $fileNames = ['6.json', '7.json', '8.json', '9.json', '10.json', '11.json', '12.json', '13.json'];
    $merged = [];

    foreach ($fileNames as $fileName) {
        if (file_exists($fileName)) {
            $jsonData = json_decode(file_get_contents($fileName), true);
            $fileNameNoExt = basename($fileName, ".json");

            foreach ($jsonData as $vendorKey => $vendorValues) {
                foreach ($vendorValues as $name => $device) {
                    $merged[$vendorKey][$name][$fileNameNoExt] = $device;
                }
            }
        }
    }

    ksort($merged);
    foreach ($merged as $vendorKey => $vendorValues) {
        ksort($merged[$vendorKey]);
    }

    file_put_contents('compiled.json', json_encode($merged, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
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
	debug_log("Starting CompileJSON for version: " . $version);
	WriteTmpJSON($version, '{');
	$files = glob('v' . $version . '.x/*.json', GLOB_BRACE);
	debug_log("Found " . count($files) . " JSON files in v" . $version . ".x/");
	$tab = "\t";
	$countto = CountJSON($version);
	debug_log("CountJSON returned: " . $countto);
	$countup = 0;
	foreach($files as $file) {
		++$countup;
		debug_log("Processing file: " . $file);
		$json = file_get_contents($file);
		$json_data = json_decode($json,true);
		if($json_data === null) {
			debug_log("  JSON decode failed for: " . $file);
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
		$sha256=$json_data['response'][0]['sha256'] ?? null;

		if (is_null($oem) || is_null($codename) || is_null($device) || is_null($maintainer) || is_null($crversion) || is_null($builddate) || is_null($buildtype) || is_null($download) || is_null($forum)) {
			debug_log("  Skipping device due to missing fields: oem=" . var_export($oem, true) . ", codename=" . var_export($codename, true) . ", device=" . var_export($device, true) . ", maintainer=" . var_export($maintainer, true) . ", crversion=" . var_export($crversion, true) . ", builddate=" . var_export($builddate, true) . ", buildtype=" . var_export($buildtype, true) . ", download=" . var_export($download, true) . ", forum=" . var_export($forum, true));
			continue;
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
		WriteTmpJSON($version, $tab . $tab . $tab . '"md5": "' . $md5 . '",');
		WriteTmpJSON($version, $tab . $tab . $tab . '"sha256": "' . $sha256 . '"');
		WriteTmpJSON($version, $tab . $tab . '}');
		if ($countup == $countto){
			WriteTmpJSON($version, $tab . ']');
		}else{
			WriteTmpJSON($version, $tab . '],');
		}
	}
	debug_log("Finished processing all files. countup=" . $countup . ", countto=" . $countto);
	WriteTmpJSON($version, '}');
	debug_log("Calling FinalizeJSON for version: " . $version);
	FinalizeJSON($version);
	debug_log("FinalizeJSON completed");
	moveChangelog($version);
	debug_log("moveChangelog completed");
	deleteDir('v' . $version . '.x');
	debug_log("deleteDir completed");
	updateStats($version);
	debug_log("updateStats completed");
}

if (!$ver == null){
	CompileJSON($ver);
	CompileFullJSON();
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
