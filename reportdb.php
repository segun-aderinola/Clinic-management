<?php 
	include "connect.php";

	class report
	{
		public function upload_report($pat_id,$report, $prescribe,$doc_name){
			global $con;
			$query = $con->query("insert into pat_appointment(pat_id, report_by,report_stmt, prescription) values ('$pat_id','$doc_name','$report','$prescribe')");
			if($query)
			{
				echo "<div class='alert alert-success text-center'> Report Saved Successfully </div>";
				echo "<script> document.getElementById('type_report').style.display=none; </script>";
			}
		}

		public function view_report($id)
		{
			global $con;

			$query= $con->query("select * from pat_appointment where pat_id = '$id'");
			
			$result = mysqli_fetch_assoc($query);
			
			return $result;

			header('location:patientreport.php');
			}
		}
	


 ?>
