<!DOCTYPE html>
<html>
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
	<!-- project viewer/form -->
	<?php
			$file = $_GET["src"];
			$fileArray = json_decode(file_get_contents('../data/json/' . $file . '.json'));
			echo '<form action="../about/staff-action.php?dest=action" method="post" enctype="multipart/form-data">
			
			<a>Project Name: </a><input type="text" name="proj_name" value="' . $fileArray[0] . '" required><br />
			<a>Student Name: </a><input type="text" name="stud_name" value="' . $fileArray[1] . '" required><br /><br />
			
			<a>Project Image Upload: </a><br /><input type="file" name="proj_img"></input><br /><br />
			<a>Student Image Upload: </a><br /><input type="file" name="stud_img"></input><br /><br />';

			$tmp_disp = "";
			if(file_exists('../data/img/project/' . $file . '.png')) {
				echo '<a href="../data/img/project/' . $file . '.png" style="max-width:500px;">Current Project Image</a><br />';
			} else {
				echo 'No Project Image Found <br />';
			}
			
			$tmp_disp = "";
			if(file_exists('../data/img/student/' . $file . '.png')) {
				echo '<a href="../data/img/student/' . $file . '.png" style="max-width:500px;">Current Student Image</a><br />';
			} else {
				echo 'No Student Image Found <br />';
			}
			
			echo '<br /><a>Project Description:</a><br /><textarea name="proj_desc" cols="70" rows="15" required>' . $fileArray[2]. '</textarea><br />
			<a>Student Description:</a><br /><textarea name="stud_desc" cols="70" rows="15" required>' . $fileArray[3]. '</textarea><br />
			<a>Student ID: </a><input width="20px" type="text" name="filename" value="' . $file . '" readonly><br />
			<input type="submit">
			</form><br />
			<a href="../admin/"><button>Back to admin browser</button></a>';
			
			
	?>
	
</body>
</html>