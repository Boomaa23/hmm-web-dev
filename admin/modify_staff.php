<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		$files = glob("../staff/staff_data/json/*.json", GLOB_BRACE);
		foreach($files as $file) {
			echo '<form action="../staff/staff_action.php" method="post" enctype="multipart/form-data">';
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			echo '<input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />' . 
			'<input type="text" name="stud_name" value="' . $fileArray[1] . '" required><br />' .
			'<input type="file" name="img"></input><br />' .
			'<img src="../staff/staff_data/img/' . $file . '.png" style="max-width:500px;"><br />' .
			'<textarea name="proj_desc" cols="70" rows="15" required>' . $fileArray[2]. '</textarea><br />' .
			'<input type="text" name="filename" value="' . $file . '" readonly><br />' .
			'<input type="submit"></form>' .
			'<br /><br />';
		}
	?>
	<form action="../staff/add_staff.php" method="post">
		<input type="submit" value="Add another Project">
	</form>
	<form action="../staff/remove_staff.php" method="post">
		<input type="text" name="project" required>
		<input type="submit" value="Remove a Project">
	</form>
</body>
</html>