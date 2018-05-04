<?php
include 'handler.php';
is_NeedUpdate();

if (file_exists('update.xml')) {
	$xml = simplexml_load_file('update.xml');
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
            <span class='ti-mobile'> Device name: " . $v->devicename . "</span><br>
            <span class='ti-receipt links'> Device codename: <a href='https://crdroid.net/" . $k . "' rel='bookmark'>" . $k . "</a></span></br>
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
	echo "<div class='timestamp'>Showing devices from cache set " . date("F d Y H:i:s.", filemtime('update.xml')). "</div>";
}
?>