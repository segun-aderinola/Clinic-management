<?php include '../connect.php';?>
<?php 
include '../patdb.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- <link rel="stylesheet" href="css/hide.css"> -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kwara State University Clinic</title>
<!-- <link rel="stylesheet" type="text/css" href="css/staff.css"/> -->
<link rel="stylesheet">
<style type="text/css">
  .active a{
    background-color: #c6c6c6;
}

@charset "utf-8";
@import url("../webfonts/COPRGTB/stylesheet.css");

body {
	
	background:url(images/background.jpg) no-repeat center center fixed ;
	-webkit-background-size:cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
}


h1{
	text-align:center;
	font-family:"calibri";
	font-size:60px;
	padding-top:10px;
	letter-spacing:5px;
	
}
.table{
	background-color:rgba(0, 0, 0, 0.5);
	border:none;
	
	
}
.footer{
	background-color: rgb(255, 255, 255);
	height: 220px;
	color: #000000;
	font-family:"calibri";

	
}
.foot2{
	background-color: rgb(229, 229, 229);
	height: 40px;
	color: #000000;
	font-family:"calibri";
}
</style>

</head>
<script type="text/javascript" src="js/rightde.js"></script>
<body>

<header class="nav-down ">
	<nav style=" border-radius: 0px; height:20px;background-color:#FFF" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class="navbar-brand">Welcome <font color="#7eaefc"><?php echo $_SESSION['sadmun']; ?>!</font> You are logged in as <?php echo $_SESSION['admty']; ?> <a href="logout.php">Logout</a> </p>
  
</div>
</div>
</nav>
</header>

<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
<br>
<h1 class="text-center">Kwara State University Clinic<br /><small style="font-size:20px">Hospital Management System</small></h1></div>

</div>
</div>
<br><br><br>

<input id="admte" type="hidden" name="admtyp" value="<?php echo $_SESSION['admty']; ?>">
<input type="text" name="pat_id" value="<?php echo $row["pet_id"]; ?>">
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
	
<div class="page-header">
<h3 style="font-family:calibri;" class="text-center">Search for Patient Info</h3></div>
</div>
<table style="background-color: rgba(255,255,255,0.0);" class="table table-responsive" width="500" border="0"><form action="" method="post">
  <tr>
    <td><input style="font-size:12px" type="text" name="searvalu" class="form-control" placeholder="Enter Registration No / Mobile Number/ Email / First name or Blood Group" /></td>
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
	$self_query = "SELECT * FROM `patient` WHERE concat(`pet_id`, `pet_con`,`pet_em`,`pet_fn`,`pet_bg`) like '%$search%' ORDER BY `pet_id` DESC";
	$result = mysqli_query($con,$self_query);

	while($row = mysqli_fetch_array($result)) { ?>

<div style="padding:20px;  margin:5px; border-radius:5px; background-color:rgba(255, 255, 255, 0.3);"class="col-md-5 col-md-push-1">

<h4 style=" color:">
Patient Reg.No : <?php echo $row["pet_id"]; ?><br />
Patient Name : <?php echo $row["pet_fn"]; ?> <?php echo $row["pet_sn"]; ?><br />
OPD Doctor Registration No : <?php echo $row["Pet_opdid"]?>| <a target="_blank" href="admitdf.php?id= <?php echo $row["Pet_opdid"]; ?>" name="ad"> More Information </a>
</h4>

<dl class="dl-horizontal">

<dt style="font-size:12px;"><strong>Birth Day      : </strong></dt>
<dd style="font-size:12px;"><?php echo $row["pet_bd"]; ?></dd>

<dt style="font-size:12px;"><strong>Contact Number : </strong>
<dd style="font-size:12px;"><?php echo $row["pet_ac"]; ?> <?php echo $row["pet_con"]; ?></dd>

<dt style="font-size:12px;"><strong>Email: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["pet_em"]; ?></dd>

<dt style="font-size:12px;"><strong>Gender: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["pet_gen"]; ?></dd>

<dt style="font-size:12px;"><strong>Blood Group: </strong></dt></dt>
<dd style="font-size:12px;"><?php echo $row["pet_bg"]; ?></dd>

<dt style="font-size:12px;"><strong>Age: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["pet_age"]; ?></dd>

<dt style="font-size:12px;"><strong>Address: </strong></dt>
<dd style="font-size:12px;"><?php echo $row["pet_addr"]; ?></dd>

</dl>

<ul style="" class="nav nav-justified">
<li style="background-color:rgba(255, 255, 255, 0.3);"><a style="colour:#000" target="_blank" href="admit.php?id=<?php echo $row["pet_id"]; ?>" name="ad">Admit to Hospital</a></li>

</ul>

</div>

<?php }} ?>
</div>
</div>	
  

</div>
</div>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/petrej.js"></script>
<script src="js/hidenv.js"></script>
<script src="js/admty.js"></script>
<script type="text/javascript">
  var x = "Basic Administration"; 
  var y = "Super Administration";

if(document.getElementById("admte").value == x)
{
 document.getElementById("lock").style.display = 'none';
}else{
  document.getElementById("lock").style.display;
}

</script>
</body>
<footer>
	<?php 
	// include '../footer.php';

	?>
</footer>
</html>
