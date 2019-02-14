<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<!-- project viewer/form -->
	<?php
		$files = glob("../staff/staff_data/json/*.json", GLOB_BRACE);
		foreach($files as $file) {
			echo '<form action="../staff/staff_action.php?dest=action" method="post" enctype="multipart/form-data">';
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			echo '<input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />' . 
			'<input type="text" name="stud_name" value="' . $fileArray[1] . '" required><br />' .
			'<input type="file" name="img"></input><br />';
			
			$tmp_disp = "";
			if(!file_exists('../staff/staff_data/img/' . $file . '.png')) {
				$tmp_disp = 'display:none;';
				echo 'No Image Found';
			}
			echo '<img src="../staff/staff_data/img/' . $file . '.png" style="max-width:500px;' . $tmp_disp . '"><br />';
			
			echo '<textarea name="proj_desc" cols="70" rows="15" required>' . $fileArray[2]. '</textarea><br />' .
			'<input type="text" name="filename" value="' . $file . '" readonly><br />' .
			'<input type="submit"></form>' .
			'<br /><br />';
		}
	?>
	
	<!-- add a project -->
	<form action="../staff/staff_action.php?dest=add" method="post">
		<input type="submit" value="Add another Project">
	</form>
	
	<!-- remove a project -->
	<form action="../staff/staff_action.php?dest=remove" method="post">
		<input type="text" name="project" required>
		<input type="submit" value="Remove a Project">
	</form>
</body>
</html>