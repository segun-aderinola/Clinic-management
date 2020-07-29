<?php include 'connect.php';?>
<?php include 'redirect.php';

  $id=$_REQUEST['id'];
  $rid=$_REQUEST['rid'];
  $mid=$_REQUEST['mid'];

  $query = "DELETE FROM `admit_pet` WHERE `admit_petid`=$id";
  $result = mysqli_query($con,$query) or die ( mysqli_error($con));
  $rquery="UPDATE `hospi_room` SET `room_avilabl`= 'AV',`room_petID`='No Patient' WHERE `room_id` = '$rid'";
  $result = mysqli_query($con,$rquery) or die (mysqli_error($con));

  if($result === TRUE)
  {
    echo "<div class='alert alert-success text-center'>Patient has been Discharged</div>";
    header('location:admite.php');
  }
?>