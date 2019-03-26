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
?>
