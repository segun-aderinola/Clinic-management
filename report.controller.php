<?php 
require 'connect.php';


        if(isset($_GET['id']))
        {
            $id = mysqli_real_escape_string($con,$_GET['id']);

            $query = "delete from pat_appointment where rep_id = '$id'";
            $exe = $con->query($query);

            if($exe=== TRUE){
                $message = "<div class='alert alert-danger'> Report Deleted Successfully </div>";
                header('location: patientreport.php');
            } 
            
        }
        
        
        $post = $_POST["function"];
        $error = "";
        if($post == "updateReport")
        {
            $id = mysqli_real_escape_string($con, $_POST['id']);
            $report = mysqli_real_escape_string($con, $_POST["report"]);
            $pres = mysqli_real_escape_string($con, $_POST["prescribe"]);
            $docName = mysqli_real_escape_string($con, $_POST["docName"]);

            if(empty($report) || empty($pres))
            {
                $error = "This field can not be empty";
            }
            
            else{
            $query = "update pat_appointment set report_stmt = '$report', prescription = '$pres', update_by = '$docName' where rep_id = '$id'";
            $exe = $con->query($query);
            
            if($exe===TRUE){
                $_SESSION['error'] = "Update Success";
                // header('location: patientreport.php');
                // echo "<script>alert('Report Updated Successfully');</script>";
            } 
            
                // return json_encode(['message'=>$error]);
            }
        }
?>