
<?php
include 'connect.php';

if(isset($_POST['submit']))
  {
	$pet_fname  = $_POST['fname'];
	$pet_sname  = $_POST['lname'];
	$pet_add    = $_POST['addr'];
	$pet_type   = $_POST['bg'];
	$pet_bd     = $_POST['smbdd'];
	$pet_cont   = $_POST['tel'];
	$pet_em	 = $_POST['email'];
	$pet_gender = $_POST['gender'];
    $insittedby = $_POST["sadmun"];

	$dd = mt_rand(1000,mt_rand(1000, 100000));
    
	
	 

	 date_default_timezone_set('Africa/Lagos');


		$today = date("Y-m-d");
		$pet_age = date_diff(date_create($pet_bd), date_create($today))->format('%y');


	  	$checkeml="SELECT pet_em from patient where pet_em ='$pet_em'";
		  $checktel="SELECT pet_con from patient where pet_con ='$pet_cont'";
	  	$checkreg_id=$con->query("SELECT pat_reg_id from patient where pat_reg_id ='$dd'");
		  
	//    //Execute select SQL Querry
   		$logPermition=mysqli_query($con,$checkeml);
		$logPermitiontel=mysqli_query($con,$checktel);

   		//read sigle row of result set
   		$row=mysqli_fetch_array($logPermition);
		$rowem=mysqli_fetch_array($logPermitiontel);
		$row_reg = mysqli_fetch_array($checkreg_id);

	  if($pet_type == "syst" | $pet_gender == "syg")
	  {
		  $gestwterr = '<br/ ><div style="font-size:12px" align="center" class="alert alert-danger">Registration Unsuccessful, please fill all fields</div>';
		}
		else
		{
			  if($row['pet_em']==$pet_em)
			  {
			  $emlduperr = '<br/ ><div style="font-size:12px" align="center" class="alert alert-danger">The Email address you entered is already in use!</div>';
			  if($rowem['pet_con']==$pet_cont)
			  {
				  $conduperr = '<br/ ><div style="font-size:12px" align="center" class="alert alert-danger">The Contact Number you entered is already in use!</div>';
			  }
			  if($row_reg["pat_reg_id"]==$dd)
			  {
				$conduperr = '<br/ ><div style="font-size:12px" align="center" class="alert alert-danger">An Error has Occured, Please try again!!!</div>';
			  }

		}
		else
		{
			
    $query = "INSERT INTO `patient`
	  (`pat_reg_id`, `pet_fn`, `pet_sn`, `pet_addr`, `pet_con`, `pet_em`, `pet_gen`, `pet_bd`, `pet_age`, `pet_bg`,`Insert_admunname`)
	  VALUES('$dd','$pet_fname','$pet_sname','$pet_add','$pet_cont','$pet_em','$pet_gender','$pet_bd',$pet_age,'$pet_type','$insittedby')";

	  if(mysqli_query($con,$query))
	  {
		  		   $success =  '<div align="center" class="alert alert-success">Registration Successful !</div>';
				   echo '<script type="text/javascript">';

				   echo 'alert("Registration Successful")';
				   echo '</script>';
	  		}
		}
	  }
  }
?>
