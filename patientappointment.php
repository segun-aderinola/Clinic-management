<?php include 'connect.php';?>
<?php
include 'session_check.php'; 

	
	if(!(isset($_SESSION['doc_username'])))
	{
		$_SESSION['noAccess'] = "<script> alert('You have no access'); </script>";
		header("location:menu.php");
	}



	if(isset($_POST["btn_search"]))
	{
		$search = $_POST["search"];
		// echo $search;
		// $search = filter_var($search, FILTER_SANITIZE_STRING);
		$sel = "SELECT * FROM `patient` WHERE pat_reg_id= '$search'";
		$qry = $con->query($sel);
		if(mysqli_num_rows($qry) ==1)
		{
			$_SESSION['pat_reg_id'] = $search;
			header('location:patientreport.php');
		}
		else {
			echo "<script> alert('Patient Doesnt Exist'); </script>";
		}
		

	}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/hide.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kwara State University Clinic</title>
<link rel="stylesheet" type="text/css" href="css/staff.css"/>
<link rel="stylesheet">
<style type="text/css">
  .active a{
    background-color: #c6c6c6;
}

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
      <p class="navbar-brand">Welcome <font color="#7eaefc"> Dr. <?php echo @$sessionFetch; ?>!</font> <a href="logout.php">Logout</a> | <a href="menu.php">Menu</a> </p>

  
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

<!-- <input id="admte" type="text" name="admtyp" value="<?php echo $_SESSION['admty']; ?>"> -->
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
	<div class="page-header">
<h3 style="font-family:calibri;" class="text-center">Search for Patient Info</h3></div>
</div>
<table style="background-color: rgba(255,255,255,0.0);" class="table table-responsive" width="500" border="0">

<?php
$query = $con->query("select * from patient");
$data = mysqli_fetch_assoc($query);
?>
	<form method="post">
  <tr>
    <td>
		<!-- <input type="text" name="pat_id" value="<?php echo $data["pat_reg_id"]; ?>"> -->
    	
    	<input style="font-size:12px" type="text" name="search" class="form-control" placeholder="Enter Registration No" />
    </td>
  </tr>
  <tr align="center">
    <td align="center">
    	<button name="btn_search" class="btn  btn-default btn-block">Search</button>
    </td>
  </tr>
</form>
</table>
</div>
</div>
  
</div>
</div>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
	
</footer>
</html>
