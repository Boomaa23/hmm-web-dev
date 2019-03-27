<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="staff-style.css">
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
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
			if($fileArray != array("","","","") && $fileArray[3] === "tech") {
				if($ct % 2 != 0) {
					// left side picture
					echo '<tr>
						<td class="table-studentname table-left table-element">
							<a class="inner-studentname">' . null . '</a>
						</td>
						<td colspan="2" class="table-projectname table-right table-element">
							<a class="inner-projectname">' . $fileArray[0] . '</a>
						</td>
					</tr>
					<tr>
						<td class="table-studentpicture table-left table-element">
							<img class="inner-studentpicture" src="../data/staff/img/' . basename($file, ".json") . '.png">
						</td>
						<td colspan="2" class="table-projectbrief table-right table-element">
							<span class="inner-projectbrief">' . $fileArray[1] . '</span>
						</td>
					</tr>';
				} else {
					// right side picture
					echo '<tr>
						<td colspan="2" class="table-projectname table-left table-element">
							<a class="inner-projectname">' . $fileArray[0] . '</a>
						</td>
						<td class="table-studentname table-right table-element">
							<a class="inner-studentname">' . null . '</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="table-projectbrief table-left table-element">
							<span class="inner-projectbrief">' . $fileArray[1] . '</span>
						</td>
						<td class="table-studentpicture table-right table-element">
							<img class="inner-studentpicture" src="../data/staff/img/' . basename($file, ".json") . '.png">
						</td>
					</tr>';
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
