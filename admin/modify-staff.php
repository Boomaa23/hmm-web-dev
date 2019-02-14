<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
	<!-- project viewer/form -->
	<?php
			$file = $_GET["src"];
			$fileArray = json_decode(file_get_contents('../staff/staff-data/json/' . $file . '.json'));
			echo '<form action="../staff/staff-action.php?dest=action" method="post" enctype="multipart/form-data">';
			
			echo '<a>Project Name: </a><input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />';
				
			echo '<a>Student Name: </a><input type="text" name="stud_name" value="' . $fileArray[1] . '" required><br /><br />' .
			'<a>Image Upload Type: </a><br /><input type="radio" name="img_type" value="student" ><a>Student Picture</a><br />'.
			'<input type="radio" name="img_type" value="project" ><a>Project Picture</a><br />'.
			'<input type="radio" name="img_type" value="none" checked="checked"><a>None (no upload)</a><br /><br />'.
			'<a>Image Upload: </a><br /><input type="file" name="img"></input><br />';
			
			$tmp_disp = "";
			if(file_exists('../staff/staff-data/img/student/' . $file . '.png')) {
				echo '<a href="../staff/staff-data/img/student/' . $file . '.png" style="max-width:500px;">Current Student Picture</a><br />';
			} else {
				echo 'No Student Picture Found <br />';
			}
			
			$tmp_disp = "";
			if(file_exists('../staff/staff-data/img/project/' . $file . '.png')) {
				echo '<a href="../staff/staff-data/img/project/' . $file . '.png" style="max-width:500px;">Current Project Picture</a><br />';
			} else {
				echo 'No Project Picture Found <br />';
			}
			
			
			echo '<br /><a>Project Description:</a><br /><textarea name="proj_desc" cols="70" rows="15" required>' . $fileArray[2]. '</textarea><br />' .
			'<a>Student Description:</a><br /><textarea name="stud_desc" cols="70" rows="15" required>' . $fileArray[3]. '</textarea><br />' .
			'<a>Student ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br />' .
			'<input type="submit"></form>' .
			'<br /><br />';
		
	?>
	
</body>
</html>