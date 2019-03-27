<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../about/staff-style.css">
	<link rel="stylesheet" type="text/css" href="../style-fixes.css">
	<link rel="stylesheet" type="text/css" href="../fadein.css">
	<?php echo '<link rel="icon" href="' . file_get_contents("../utils/icon.txt") . '">'; ?>
</head>
<body>
	<?php include('../include/menubar.php');?>
	<div class="submenubar-body">
		<span class="submenubar-header"><h1>Case Studies<hr width="300px" /></h1></span>
	<div class="table-container"align="center">
		<table cellspacing="25">
		<?php
		$files = glob("../data/project/json/*.json", GLOB_BRACE);
		$ct = 0;
		foreach($files as $file) {
			$fileArray = json_decode(file_get_contents($file));
			if($fileArray != array("","","",array(""))) {
				$contributors = array();
				for($i = 0;$i < sizeof($fileArray[3]);$i++) {
					$fn = '../data/staff/json/' . $fileArray[3][$i] . '.json';
					if(file_exists($fn)) {
						array_push($contributors, json_decode(file_get_contents($fn))[0]);
					}
				}
				$p = '../data/project/img/' . basename($file, ".json") . '.png';
				if(!file_exists($p)) {
					//$x = '../images/project_placeholder.png';
					$p = "http://www.impactmania.com/im/wp-content/uploads/2018/10/Impact-Mania_logo-2.png";
				}
				if($ct % 2 != 0) {
					// left side picture
					echo '<tr>
						<td class="table-studentname table-left table-element">
							<a class="inner-studentname">' . implode(", ", $contributors) . '</a>
						</td>
						<td colspan="2" class="table-projectname table-right table-element">
							<a class="inner-projectname">' . $fileArray[0] . '</a>
						</td>
					</tr>
					<tr>
						<td class="table-studentpicture table-left table-element">
							<img class="inner-studentpicture" src="' . $p . '">
						</td>
						<td colspan="2" class="table-projectbrief table-right table-element">
							<span class="inner-projectbrief">' . $fileArray[1] . '</span>
						</td>
					</tr>';

				} else {
					// right side picture
					echo '<tr>
						<td colspan="2" class="table-projectname table-left table-element">
							<a class="inner-projectname" href="../data/project/web/' . basename($file, ".json") . '/">' . $fileArray[0] . '</a>
						</td>
						<td class="table-studentname table-right table-element">
							<a class="inner-studentname">' . implode(", ", $contributors) . '</a>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="table-projectbrief table-left table-element">
							<span class="inner-projectbrief">' . $fileArray[1] . '</span>
						</td>
						<td class="table-studentpicture table-right table-element">
							<img class="inner-studentpicture" src="' . $p . '">
						</td>
					</tr>';
				}
			}
			echo '<tr>
					<td colspan="3"><hr /></td>
				</tr>';
			$ct++;
		}
		?>
		</table>
	</div>
	</div>
	<?php include('../include/footer.html'); ?>
</body>
</html>
