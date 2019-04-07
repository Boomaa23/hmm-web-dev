<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="staff-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/display-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/global-headers.css">
	<link rel="stylesheet" type="text/css" href="../utils/css/folding-style.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
	<title>About Us | Human Mind and Migration</title>
</head>
<body>
	<?php
		include('../include/menubar.php');
		include("../utils/php/display-helper.php");
	?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>About Us<hr width="300px" /></h1></span>
		<div class="accordion-container">
			<button class="accordion" onclick="clickFunc('im')">ImpactMania</button>
			<div class="panel" id="im">
			  <?php include("im-history.php"); ?>
			</div>

			<button class="accordion" onclick="clickFunc('head')">Principal Investigators / Project Leaders</button>
			<div class="panel" id="head">
			  <?php include("head.php"); ?>
			</div>

			<button class="accordion" onclick="clickFunc('faculty')">Affiliated Faculty, Organizations, Program Leaders</button>
			<div class="panel" id="faculty">
			  <?php include("faculty.php"); ?>
			</div>

			<button class="accordion" onclick="clickFunc('interns')">Interns</button>
			<div class="panel" id="interns">
			  <?php include("interns.php"); ?>
			</div>

			<button class="accordion" onclick="clickFunc('tech')">Technology Resources</button>
			<div class="panel" id="tech">
			  <?php include("tech.php"); ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../utils/js/folding-helper.js"></script>
	<?php include('../include/footer.html'); ?>
	<script type="text/javascript">
	function clickFunc(n) {
		window.location.hash = "#" + n;
	}
	</script>
</body>
</html>
