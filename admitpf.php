<?php include 'connect.php';?>
<?php include 'admitdb.php';?>
<?php include 'redirect.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Health Care hospital</title>
<link rel="stylesheet" type="text/css" href="css/staff.css"/>
<script type="text/javascript" src="js/rightde.js"></script>
</head>
<body>
<?php include_once('navbar.php');?>
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">

<h1 class="text-center ">Health Care Hospital<br /><small style="font-size:20px">Hospital Management System</small></h1></div>

</div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">

<div class="page-header">
<h3 style="font-family:calibri;" class="text-center">Admited Patient Information</h3></div>
<br />

<div class="container">
<div class="row ">
<div class="col-md-4 col-md-offset-4 col-xs-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title text-center">Admited Patient Information</h3>
</div>
<center>
<div class="panel-body">
<div>

<?php
$id=$_REQUEST['id'];
$query = "SELECT * FROM admit_pet WHERE pet_id='".$id."'";
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);

?>

  <form method="post" action="">
<div align="left">Patient ID:</div>
    <input disabled value="<?php echo $row["pet_id"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient ID" >
<div align="left">Patient Name:</div>
    <input disabled    value="<?php echo $row["admit_name"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient Name">
<div align="left">Patient Mobile:</div>
    <input disabled    value="<?php echo $row["admit_con"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient Contact number">
<div align="left">Patient Blood Group:</div>
    <input disabled value="<?php echo $row["admit_bg"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient Blood Group">
<div align="left">Patient Disease:</div>
        <input disabled value="<?php echo $row["pet_des"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient Disease">
<div align="left">Patient Age:</div>
                <input disabled    value="<?php echo $row["admit_age"]; ?>" style="margin:5px;  border-radius:0px" type="text" class="form-control" placeholder="Patient Age">
  </form>

<tr><td colspan="2" style="padding:5px">
<br /><br />
<script type="text/javascript">
document.write('<?php echo $success; ?>');
    </script>
</td>
  </tr>

</div>
</div>
</div>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<footer>
	<?php include 'footer.php';?>
</footer>
</html>
