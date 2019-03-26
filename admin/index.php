<?php include "../include/auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
	<title>HMM Admin Editor</title>
</head>
<body>
<table><td>
	<table>
	<?php
		$projects = glob("../data/project/json/*.json", GLOB_BRACE);
		foreach($projects as $file) {
			echo "<tr><td>";
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","","")) {
				echo '<a href="modify-projects.php?src=' . $file . '">' . $fileArray[0] . ' - (' . $file . ')</a><br />';
			} else {
				echo '<a href="modify-projects.php?src=' . $file . '">NEW PROJECT - (' . $file . ')</a><br />';
			}
			echo "</td></tr>";
		}
		echo "</table></td><td><table>";
		
		$staff = glob("../data/staff/json/*.json", GLOB_BRACE);
		foreach($staff as $file) {
			echo "<tr><td>";
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","","")) {
				echo '<a href="modify-staff.php?src=' . $file . '">' . $fileArray[0] . ' - (' . $file . ')</a><br />';
			} else {
				echo '<a href="modify-staff.php?src=' . $file . '">NEW STAFF - (' . $file . ')</a><br />';
			}
			echo "</td></tr>";
		}
		echo "</table></td>";
		include("../include/footer.html");
	?>
	</table>
	<br />
		
	<!-- add a project -->
	<form action="../data/data-action.php?dest=projectAdd" method="post">
		<input type="submit" value="Add another Project">
	</form>
	
	<!-- remove a project -->
	<form action="../data/data-action.php?dest=projectRemove" method="post">
		<input type="text" name="project" placeholder="Project ID" required>
		<input type="submit" value="Remove a Project">
	</form>
	<br />
	
	<!-- add a staff -->
	<form action="../data/data-action.php?dest=staffAdd" method="post">
		<input type="submit" value="Add another Staff">
	</form>
	
	<!-- remove a staff -->
	<form action="../data/data-action.php?dest=staffRemove" method="post">
		<input type="text" name="staff" placeholder="Staff ID" required>
		<input type="submit" value="Remove a Staff">
	</form>
</body>
</html>