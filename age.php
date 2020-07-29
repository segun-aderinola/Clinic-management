<?php
	if(isset($_POST['submit']))
	{
		date_default_timezone_set('Africa/Lagos');

		$dateOfBirth = $_POST['dob'];

		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));

	echo $diff->format('%y');
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Age</title>
 </head>
 <body>
 <form method="post">
 	<input type="date" name="dob">
 	<input type="submit" name="submit" value="submit">
 </form>
 </body>
 </html>