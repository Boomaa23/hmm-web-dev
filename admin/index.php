<?php include "../include/auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="icon" href="http://www.impactmania.com/im/wp-content/uploads/2018/12/impactmania-favicon-57.jpg">
	<title>HMM Admin Editor</title>
</head>
<body>
	<?php
		$files = glob("../data/json/*.json", GLOB_BRACE);
		foreach($files as $file) {
			$fileArray = json_decode(file_get_contents($file));
			$file = trim(basename($file, ".json"));
			if($fileArray != array("","","","","","")) {
				echo '<a href="modify-staff.php?src=' . $file . '">' . $fileArray[0] . ' - ' . $fileArray[1] . ' (' . $file . ')</a><br />';
			} else {
				echo '<a href="modify-staff.php?src=' . $file . '">NEW PROJECT - (' . $file . ')</a><br />';
			}
		}
		include("../include/footer.html");
	?>
	<br />	
		
	<!-- add a project -->
	<form action="../about/staff-action.php?dest=add" method="post">
		<input type="submit" value="Add another Project">
	</form>
	
	<!-- remove a project -->
	<form action="../about/staff-action.php?dest=remove" method="post">
		<input type="text" name="project" required>
		<input type="submit" value="Remove a Project">
	</form>
</body>
</html>