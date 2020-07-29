<?php include 'connect.php';?>
<?php 
@session_start();
include 'session_check.php';
include 'reportdb.php';

if(isset($_SESSION['error']))
{
	$msg = $_SESSION['error'];
	echo "<script> alert('<?php $msg ?>'); </script>";
}

if(isset($_POST['send_report']))
{
	$report = $_POST['report'];
	$report = mysqli_real_escape_string($con,$report);

	$prescribe = $_POST['prescription'];
	$prescribe = mysqli_real_escape_string($con,$prescribe);

	$doc_name = $_POST['doc_name'];
	$doc_name = mysqli_real_escape_string($con,$doc_name);
	$pat_id=$_SESSION["pat_reg_id"];
	

	$upload = new report();
	$upload->upload_report($pat_id, $report, $prescribe, $doc_name);
}
if(isset($_POST['view_report'])){
	$id = $_POST['pat_id'];
	$id = mysqli_real_escape_string($con, $id);

	$viewReport = new report();
	$result = $viewReport-> view_report($id);
	
}

?>
<?php include 'redirect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/hide.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kwara State University Clinic</title>
<link rel="stylesheet" type="text/css" href="css/staff.css"/>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<link rel="stylesheet">
<style type="text/css">
  .active a{
    background-color: #c6c6c6;
}


h3{
	text-align:center;
	font-family:"calibri";
	font-size:40px;
	padding-top:10px;
	letter-spacing:5px;
	
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

#rep
{
	resize: none;
}
#presc
{
	resize: none;
}
.hov
{
	height: 40px;
	text-align: center;
	padding: 8px;
	font-size: 16px;
}

#hov:hover{
text-decoration: none;
}
#plus
{
	float: right;background-color:#265a88;
	padding:12px;
	border:0;
	border-radius: 10px;
	color: white;
	position: relative;
	margin-top: -10px;
}

.table
{
	background: white;
	margin-top:10px;
}

thead
{
	background: #3c763d;
	color: white;
}
.btn-st
{
	background-color:#265a88;
	width: 150px;
	height: 30px;
	color: white;
	padding: 0;
}

button 
{
	border: 0;
	border-radius: 3px;
}
.btn-st:hover
{
	color: wheat;
}
#en_dis
{
	float: right;
	font-size:16px;
	color:antiquewhite;
	padding:5px;
	background-color:brown;
	margin-top:10px;
	font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
#en_dis:hover
{
	cursor: pointer;
	background-color:#3c763d;
}

#dis_en
{
	float: right;
	font-size:16px;
	color:antiquewhite;
	padding:5px;
	background-color:brown;
	margin-top:10px;
	font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
#dis_en:hover
{
	cursor: pointer;
	background-color:#3c763d;
}

/* #task
{
	background-color:#265a88;
	padding:5px;
	border:0;
	border-radius: 10px;
	color: white;
} */
</style>

</head>
<!-- <script type="text/javascript" src="js/rightde.js"></script> -->
<body>

<header class="nav-down ">
	<nav style=" border-radius: 0px; height:20px;background-color:#FFF" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <p class="navbar-brand">Welcome <font color="#7eaefc">Dr. <?php echo @$sessionFetch; ?>!</font> <a href="logout.php">Logout</a> </p>
</div>
</div>
</nav>
</header>

<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
<br>
<h3 class="text-center">Kwara State University Clinic<br /></h3></div>

</div>
</div>
<br><br><br>

<input id="admte" type="hidden" name="admtyp" value="<?php echo $_SESSION['admty']; ?>">

<div class="alert alert-success" style="font-size: 20px;text-align:center;width:40%;margin:auto;"> Patient`s Report</div>
<div class="container" style="margin-top: 10px;">
<form action="" method="post">
<?php
// echo $_SESSION['pat_reg_id'];
if(isset($_SESSION['pat_reg_id']))
{
	$search = $_SESSION['pat_reg_id'];
	$select_report = $con->query("SELECT * FROM `pat_appointment` WHERE pat_id = '$search'");
	$self_query = "SELECT * FROM `patient` WHERE pat_reg_id = '$search'";
	$result = mysqli_query($con,$self_query);

	while($row = mysqli_fetch_array($result)) { ?>

<div class="jumbotron" style="padding:20px;border-radius:5px; background-color:rgba(255, 255, 255, 0.3);">
<div class="row">
	<div class="col-sm-6">
		
	<input type="hidden" name="doc_name" id="docName" value="Dr. <?php echo $sessionFetch;?>">
		<button class="btn-success" id="click_profile" style="font-size: 18px;"><span class="glyphicon glyphicon-book"></span> Profile</button>
		<span class="glyphicon glyphicon-plus" id="plus"></span>

		<div id="type_report" style="display: none;">
			<div class="report" style="margin-top:10px;">
				<textarea name="report" id="rep" cols="60" rows="10" class="form-control" placeholder="Type Report here" required></textarea>
			</div>
			<div class="describe" style="margin-top:10px;">
				<textarea name="prescription" id="presc" cols="40" rows="3" class="form-control" placeholder="Type Prescription here" required></textarea>
			</div>
			<div class="text-danger message"></div>
			<div class="text-center" style="margin-top:10px;">
				<button class="btn btn-success btn-sm" name="send_report" id="send_rep">Save Report</button>
			</div>
		</div>


		<div class="show_record">
		<table class="table table-responsive">
					<thead>
						<th>S/N</th>
						<th>Visit Date</th>
						<th>Report</th>
						<th>Report By</th>
						<th></th>
					</thead>
		<?php
		if(mysqli_num_rows($select_report) > 0)
		{
			while($dd = mysqli_fetch_assoc($select_report))
			{?>
					<tbody>
						<tr id="<?php echo $dd['rep_id']; ?>">
							<td>
								<?php echo $dd['rep_id']; ?>
									<input type="hidden" name="rep_id" class="report_id" value="<?php echo $dd['rep_id']; ?>">
							</td>
							<td><?php echo $dd['report_date']; ?></td>
							
							<td><a href="patientreport.php?id=<?php echo $dd['rep_id']; ?>" id="reprep" class="btn-sm btn-primary">Report</a></td>
							<td><?php echo $dd['report_by']; ?> </td>
							<td><button class="btn-danger btn-sm remove"><span class="glyphicon glyphicon-trash"></span></button></td>
						</tr>
					</tbody>
			<?php }
		}
		else{ echo "<div class='alert alert-danger text-center' style='margin-top:40px;'><span class='glyphicon glyphicon-info-sign' style='margin-right:10px;'></span>No Record Yet</div>"; }
		?>
				</table>
				<div class="request_report">
					<?php 
					if(isset($_GET['id']))
					{
						$id = $_GET['id'];
						$id = mysqli_real_escape_string($con, $id);

						$query = "select * from pat_appointment where rep_id = '$id'";
						$execute = $con->query($query);
						if($data = mysqli_fetch_assoc($execute)){
							?>
			<div class="report" style="margin-top:10px;">
			<textarea name="report" id="lol" cols="60" rows="10" class="form-control show_rep" placeholder="" style="resize: none;" disabled required><?php echo $data["report_stmt"]; ?></textarea>
		</div>

		<div class="describe" style="margin-top:10px;">
			<textarea name="prescription" id="lwkmd" cols="40" rows="3" class="form-control show_pres" placeholder="" style="resize: none;" disabled required><?php echo $data["prescription"]; ?></textarea>
		</div>
		<input type="hidden" value="<?php echo $data["rep_id"]; ?>" id="get_id">

		<button class="btn-sm btn-primary" style="margin-top: 10px;display:none" id="update_report"> Update</button>
		<p id="en_dis">Enable Fields</p>
						<?php }
					}
					?>
			
				</div>	
	</div>
	</div>

	
	
	

	<div class="col-sm-6" style="background-color: #FFF;height:350px;display:none;" id="show_profile">
		<h4 class = "alert alert-danger">
Patient Reg.No : <?php echo $row["pat_reg_id"]; ?><br />
Patient Name : <?php echo $row["pet_fn"]; ?> <?php echo $row["pet_sn"]; ?><br />

</h4>

<dl class="dl-horizontal">

<dt style="font-size:16px;"><strong>Birth Day: </strong></dt>
<dd style="font-size:16px;"><?php echo $row["pet_bd"]; ?></dd>

<dt style="font-size:16px;"><strong>Contact Number: </strong>
<dd style="font-size:16px;"><?php echo $row["pet_ac"]; ?> <?php echo $row["pet_con"]; ?></dd>

<dt style="font-size:16px;"><strong>Email: </strong></dt>
<dd style="font-size:16px;"><?php echo $row["pet_em"]; ?></dd>

<dt style="font-size:16px;"><strong>Gender: </strong></dt>
<dd style="font-size:16px;"><?php echo $row["pet_gen"]; ?></dd>

<dt style="font-size:16px;"><strong>Blood Group: </strong></dt></dt>
<dd style="font-size:16px;"><?php echo $row["pet_bg"]; ?></dd>

<dt style="font-size:16px;"><strong>Age: </strong></dt>
<dd style="font-size:16px;"><?php echo $row["pet_age"]; ?></dd>

<dt style="font-size:16px;"><strong>Address: </strong></dt>
<dd style="font-size:16px;"><?php echo $row["pet_addr"]; ?></dd>

</dl>

<ul class="">
<a style="color:white;" target="_blank" id="hov" href="admit.php?id=<?php echo $row["pet_id"]; ?>" name="ad">
<li style="background-color:#3e8f3e;color:white;" class="hov">
Admit to Hospital</li></a>

</ul>
	</div>
</div>
</div>

<?php }} ?>

</form>
</div>
</div>


</div>
</div>
</div>

<script>
$(document).ready(function()
{

$("#send_rep").on("click", function(){
	// e.preventDefault();
	// alert(0);
	var rep = $("#rep").val();
	var pres = $("#presc").val();
	if(rep == "")
	{
		$(".show_rep").css("border", "1px solid red");
		$(".message").html("Field can not be Empty");
	}
	else
	{
		$(".show_rep").css("border", "1px solid blue");
		$(".message").html(" ");
	}
	
	if(pres=="")
	{
		$(".show_pres").css("border", "1px solid red");
		$(".message").html("Field can not be Empty");
	}
	else
	{
		$(".show_pres").css("border", "1px solid blue");
		$(".message").html(" ");
	}
});

$("#en_dis").on("click", function(){
	$(".show_rep").attr("disabled",false);
	$(".show_pres").attr("disabled",false);
	$("#update_report").css("display", "block");
	$(this).html("Disable Fields").css("background-color", "#3c763d");
	$(this).css("margin-top","-30px");
	$(this).attr("id", "dis_en");

});
$("#dis_en").on("click", function(){
	$(".show_rep").attr("disabled",true);
	$(".show_pres").attr("disabled",true);

	$(this).html("Enable Fields").css("background-color", "brown");;
	$(this).attr("id=en_dis");

});


$("#update_report").on("click", function(e){
	// e.preventDefault();
	var report = $("#lol").val();
	var pres = $("#lwkmd").val();
	var docName = $("#docName").val();
	var id = $("#get_id").val();
	
	// Validate Entry

	if(report == "")
	{
		$("#lol").css("border", "1px solid red");
		$(".message").html("Field can not be Empty");
	}
	else
	{
		$("#lol").css("border", "1px solid blue");
		$(".message").html(" ");
	}
	if(pres=="")
	{
		$("#lwkmd").css("border", "1px solid red");
		$(".message").html("Field can not be Empty");
	}
	else
	{
		$("#lwkmd").css("border", "1px solid blue");
		$(".message").html(" ");
	}


	$.ajax({
		url: "report.controller.php",
		type: "post",
		data: {
			"function": "updateReport",
			"id": id,
			"prescribe": pres,
			"report": report,
			"docName": docName
		},
		// dataType: "json",
		success: function(tx){
			
			var message = 'Update Success';
			
		}
	});
	
});

$(".remove").on("click", function(){
	var id = $(this).parents("tr").attr("id");
	if(confirm("Are you sure to remove this record ?"))
	{
		$.ajax({
			url: "report.controller.php",
			type: "GET",
			data: { id: id },
			success: function(data){
				// $("#"+id).remove();
				
				alert("Record Deleted Successfully");
			}
		});
	}
});

$("#click_profile").click(function(e){

	e.preventDefault();
	$("#show_profile").toggle();


});

$("#plus").click(function()
{
$(".request_report").css("display", "none");
$("#type_report").toggle();
});


});
</script>
</body>
<footer>
	
</footer>
</html>
