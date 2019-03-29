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
</head>
<body>
	<?php
		include('../include/menubar.php');
		include("../utils/php/display-helper.php");
	?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>About Us<hr width="300px" /></h1></span>
		<div class="accordion-container">
			<button class="accordion">ImpactMania</button>
			<div class="panel">
			  <?php include("im-history.php"); ?>
			</div>

			<button class="accordion">Principal Investigators / Project Leaders</button>
			<div class="panel">
			  <?php include("head.php"); ?>
			</div>

			<button class="accordion">Affiliated Faculty, Organizations, Program Leaders</button>
			<div class="panel">
			  <?php include("faculty.php"); ?>
			</div>

			<button class="accordion">Interns</button>
			<div class="panel">
			  <?php include("interns.php"); ?>
			</div>

			<button class="accordion">Technology Resources</button>
			<div class="panel">
			  <?php include("tech.php"); ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../utils/js/folding-helper.js"></script>
	<?php include('../include/footer.html'); ?>
</body>
</html>
