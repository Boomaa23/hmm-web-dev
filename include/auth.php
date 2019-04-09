<?php
if (authMain() == "admin") {
	authCheck();
} else {
	die("You do not have the adequate credentials to view this page.");
}

function authMain() {
	if(isset($_SERVER['PHP_AUTH_PW']) && isset($_SERVER['PHP_AUTH_USER'])) {
		if (password_verify($_SERVER['PHP_AUTH_PW'], '$2y$10$G94Gl2RQbnJ1pSCVzgH3ke4RL1br5.hfMm9WtIHAm/2gz3s/nQGCi')
			&& $_SERVER['PHP_AUTH_USER'] === 'admin') {
			return "admin";
		} else {
			header('WWW-Authenticate: Basic realm="Secure Site"');
			header('HTTP/1.0 401 Unauthorized');
			die('This site requires authentication');
		}
	} else {
		header('WWW-Authenticate: Basic realm="Secure Site"');
		header('HTTP/1.0 401 Unauthorized');
		die('This site requires authentication');
	}
}

function authCheck() {
	if (authMain() == "admin") {
		return true;
	} else {
		return false;
	}
}
?>
