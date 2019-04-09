<?php
function trim_text($input, $length) {
	if (strlen($input) <= $length) {
		return $input;
	} else {
		$last_space = strrpos(substr($input, 0, $length), ' ');
		return substr($input, 0, $last_space) . '...';
	}
}

function generateRandomString($length) {
	return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' , ceil($length/strlen($x)) )),1,$length);
}

function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	if($path !== "project/web") {
		rmdir($path);
	}
 	return;
}

function email($data, $subject, $target) {
	if(is_array($data)) {
		$data = json_encode($data);
	}
	if(is_array($target)) {
		for($t = 0;$t < sizeof($target);$t++) {
			if(mb_check_encoding($target[$t], 'UTF-8')) {
				$at = strpos($target[$t], "@");
				$dot = strpos($target[$t], ".");
				if(!(($at && $dot) || ($at < $dot) || ($at != 0))) {
					unset($target[$t]);
				}
			} else {
				unset($target[$t]);
			}
		}

		if(sizeof($target) > 0) {
			mail(implode(", ", $target), $subject, $data);
		}
	} else {
		mail($target, $subject, $data);
	}
}
?>
