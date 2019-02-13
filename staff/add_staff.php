<?php
	include('../phputils.php');
	file_put_contents('staff_data/json/' . generateRandomString(8) . '.json', json_encode(array("","","")));
	header("refresh:0; url=../admin/modify_staff.php");
?>