<?php include "../include/auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="icon" href="http://www.impactmania.com/im/wp-content/uploads/2018/12/impactmania-favicon-57.jpg">
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
				echo '<a href="modify-staff.php?src=' . $file . '">' . $fileArray[0] . ' - (' . $file . ')</a><br />';
			} else {
				echo '<a href="modify-staff.php?src=' . $file . '">NEW PROJECT - (' . $file . ')</a><br />';
			}
			echo "</td></tr>";
		}
		echo "</table></td><td><table>";
		
		$students = glob("../data/student/json/*.json", GLOB_BRACE);
		foreach($students as $file) {
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
	<br />	
	</table>
		
	<!-- add a project -->
	<form action="../data/data-action.php?dest=projectAdd" method="post">
		<input type="submit" value="Add another Project">
	</form>
	
	<!-- remove a project -->
	<form action="../data/data-action.php?dest=projectRemove" method="post">
		<input type="text" name="project" required>
		<input type="submit" value="Remove a Project">
	</form>
	
	<!-- add a student -->
	<form action="../data/data-action.php?dest=studentAdd" method="post">
		<input type="submit" value="Add another Staff">
	</form>
	
	<!-- remove a student -->
	<form action="../data/data-action.php?dest=studentRemove" method="post">
		<input type="text" name="student" required>
		<input type="submit" value="Remove a Staff">
	</form>
</body>
</html>