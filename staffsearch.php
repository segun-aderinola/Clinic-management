<?php include 'redirect.php'; ?>
<?php include 'connect.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kwara State University Clinic</title>
<link rel="stylesheet" type="text/css" href="css/staff.css"/><script type="text/javascript" src="js/rightde.js"></script>
<style type="text/css">
  .active a{
    background-color: #c6c6c6;
}

</style>
</head>
<body>
<link rel="stylesheet" href="css/hide.css">
<header class="nav-down ">
<?php include_once('navbar.php');?>
</header>
<br>
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12 ">
<h1 class="text-center ">Kwara State University Clinic<br /><small style="font-size:20px">Hospital Management System</small></h1></div>
</div>
</div><br><br><br>
<input id="admtee" type="hidden" name="admtyp" value="<?php echo $_SESSION['admty']; ?>">
<div class="container-fluid">
<div class="row">
  <ul class="nav  nav-justified" style="background-color:#FFF;">
  <li style="font-family:calibri; font-size:16px;"><a style="color:#000" href="staff.php"><strong>Add Staff</strong></a></li>
  <li style="font-family:calibri; font-size:16px;"><a style="color:#000" href="staffdetails.php"><strong>Staff Details</strong></a></li>
  <li class="active" style="font-family:calibri; font-size:16px;"><a style="color:#000" href="staffsearch.php"><strong>Staff Search</strong></a></li>
  <li style="font-family:calibri; font-size:16px;"><a style="color:#000" href="staffactmem.php"><strong>Active Staffs</strong></a></li>
  <li id="lock" style="font-family:calibri; font-size:16px;"><a style="color:#000" href="supadmst.php"><strong>Staff Modifications</strong></a></li>
  </ul>
</div></div>

<div class="container">
<div class="row">
<div class="col-md-6 col-md-push-3">
<br />
<div class="page-header">
<h3 style="font-family:calibri;" class="text-center">Search for Staff Info</h3></div>
</div>
<table style="background-color: rgba(255,255,255,0.0);" class="table table-responsive" width="500" border="0"><form action="" method="post">
  <tr>
    <td><input style="font-size:12px" type="text" name="searvalu" class="form-control" placeholder="Enter Registration No / Mobile Number/ Email / First name or Staff Member Type" /></td>
  </tr><tr align="center">
    <td align="center"><button name="filter"  type="submit" class="btn  btn-default btn-block">Search</button></td>
  </tr></form>
</table>
</div>
</div>
</div>
<div class="container">
<div class="row">
<?php
if (isset($_POST['filter'])){
	$search = ($_POST['searvalu']);
	$self_query = "SELECT * FROM `staff` WHERE concat(`staffID`, `smtel`,`smemail`,`staff_fname`,`smtype`,`smwoti`) like '%$search%' ORDER BY `staffID` DESC";
	$result = mysqli_query($con,$self_query);

	while($row = mysqli_fetch_array($result)) { ?>

<div style="padding:20px;  margin:5px; border-radius:5px; background-color:rgba(255, 255, 255, 0.3);"class="col-md-5 col-md-push-1">

<h4>
Patient Reg.No : <?php echo $row["staffID"]; ?><br />
Patient Name : <?php echo $row["staff_fname"]; ?> <?php echo $row["staff_lname"]; ?><br />
</h4>

<dl class="dl-horizontal">

<dt style="font-size:12px;"><strong>Birth Day : </strong></dt>
<dd style="font-size:12px;"><?php echo $row["smbd"]; ?></dd>

<dt style="font-size:12px;"><strong>Contact Number : </strong>
<dd style="font-size:12px;"><?php echo $row["telcode"]; ?> <?php echo $row["smtel"]; ?></dd>

<dt style="font-size:12px;"><strong>Email: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["smemail"]; ?></dd>

<dt style="font-size:12px;"><strong>Gender: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["smgender"]; ?></dd>

<dt style="font-size:12px;"><strong>Memeber Type: </strong></dt></dt>
<dd style="font-size:12px;"><?php echo $row["smtype"]; ?></dd>

<dt style="font-size:12px;"><strong>Memeber Working Time: </strong></dt></dt>
<dd style="font-size:12px;"><?php echo $row["smwoti"]; ?></dd>

<dt style="font-size:12px;"><strong>Address: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["smaddr"]; ?></dd>

</dl>

<ul class="nav nav-justified">
<li style="background-color:rgba(255, 255, 255, 0.3);"><a  href="supadmst.php" name="ad">Staff Details Modifications</a></li>
</ul>

</div>

<?php }} ?>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/hidenv.js"></script>
<script type="text/javascript">
  var x = "Basic Administartion"; 
  var y = "Super Administartion";

if(document.getElementById("admtee").value == x)
{
 document.getElementById("lock").style.display = 'none';
}else{
  document.getElementById("lock").style.display;
}

</script>
</body>
<footer>
	<?php include 'footer.php';?>
</footer>
</html>
