<?php
if(file_exists('staff_data/img/' . $_POST["project"] . '.png')) {
	unlink('staff_data/img/' . $_POST["project"] . '.png');
}
	unlink('staff_data/json/' . $_POST["project"] . '.json');
	header("refresh:0; url=../admin/modify_staff.php");
?>