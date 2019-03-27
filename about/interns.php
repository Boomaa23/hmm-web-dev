<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="staff-style.css">
	<link rel="stylesheet" type="text/css" href="../utils/style-fixes.css">
</head>
<body>
	<div class="submenubar-body">
	<div class="table-container" align="center">
		<table cellspacing="25">
		<?php
		$files = glob("../data/staff/json/*.json", GLOB_BRACE);
		$ct = 0;
		foreach($files as $file) {
			$fileArray = json_decode(file_get_contents($file));
			$picture = '../data/staff/img/' . basename($file, ".json") . '.png';
			if($fileArray != array("","","","") && $fileArray[3] === "intern") {
				if($ct % 2 != 0) {
					leftPicture($fileArray, $file, null, $picture);
				} else {
					rightPicture($fileArray, $file, null, $picture);
				}
				echo '<tr>
						<td colspan="3"><hr /></td>
					</tr>';
				$ct++;
			}
		}
		?>
		</table>
	</div>
	</div>
</body>
</html>
