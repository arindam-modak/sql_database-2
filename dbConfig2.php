<!--
	File Name - dbConfig2.ph
	Database configuration file
-->

<?php
	$con = mysqli_connect("localhost", "root", "");
	
	mysqli_select_db($con, "abc");
?>
