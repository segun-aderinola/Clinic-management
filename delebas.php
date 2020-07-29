<?php
include 'connect.php';
$id=$_REQUEST['id'];
$query = "DELETE FROM `basic_admin` WHERE `basad_id`=$id";
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: deletebasicad.php");
?>
