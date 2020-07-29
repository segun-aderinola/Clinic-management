<?php
	$con = mysqli_connect("localhost","root","");
	date_default_timezone_set ("Africa/Lagos");
	mysqli_select_db($con,"kwasu_clinic");
	if(!$con){
			die("Failed to connect");
			}
?>
