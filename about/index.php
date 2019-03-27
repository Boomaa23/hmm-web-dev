<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="staff-style.css">
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../fadein.css">
	<link rel="stylesheet" type="text/css" href="../utils/global-headers.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>
<body>
	<?php
		include('../include/menubar.php');
		include("../utils/display-helper.php");
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
	<script src="../utils/folding-helper.js"></script>
	<?php include('../include/footer.html'); ?>
</body>
</html>
