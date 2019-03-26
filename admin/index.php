<?php include "../include/auth.php"; ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="admin-style.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
	<title>HMM Admin Editor</title>
</head>
<body>
	<?php
		$projects = glob("../data/project/json/*.json", GLOB_BRACE);
		foreach($projects as $file) {
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","",array(""))) {
				echo '<a href="modify-projects.php?src=' . $file . '">' . $fileArray[0] . '</a>';
			} else {
				echo '<a href="modify-projects.php?src=' . $file . '">NEW PROJECT</a>';
			}
			$x = "'" . $file ."'";
			echo ' - <input id="' . $file . '" value="' . $file . '" readonly size="7"></input>
			<button onclick="copyToClipboard(' . $x . ')"><img src="../paste.png" height="20"></img></button><br />';
		}
		?>

		<!-- add a project -->
		<form action="../data/data-action.php?dest=projectAdd" method="post">
			<input class="mod" type="submit" value="Add another Project">
		</form>

		<!-- remove a project -->
		<form action="../data/data-action.php?dest=projectRemove" method="post">
			<input class="mod" type="text" name="project" placeholder="Project ID" required>
			<input class="mod" type="submit" value="Remove a Project">
		</form><br />

		<?php
		$staff = glob("../data/staff/json/*.json", GLOB_BRACE);
		foreach($staff as $file) {
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","")) {
				echo '<a href="modify-staff.php?src=' . $file . '">' . $fileArray[0] . '</a>';
			} else {
				echo '<a href="modify-staff.php?src=' . $file . '">NEW STAFF</a>';
			}
			$x = "'" . $file ."'";
			echo ' - <input id="' . $file . '" value="' . $file . '" readonly size="7"></input>
			<button onclick="copyToClipboard(' . $x . ')"><img src="../paste.png" height="20"></img></button><br />';
		}
		include("../include/footer.html");
	?>
	<!-- add a staff -->
	<form action="../data/data-action.php?dest=staffAdd" method="post">
		<input class="mod" type="submit" value="Add another Staff">
	</form>

	<!-- remove a staff -->
	<form action="../data/data-action.php?dest=staffRemove" method="post">
		<input class="mod" type="text" name="staff" placeholder="Staff ID" required>
		<input class="mod" type="submit" value="Remove a Staff">
	</form>
</body>
<script type="text/javascript" src="../utils/jsutils.js"></script>
</html>
