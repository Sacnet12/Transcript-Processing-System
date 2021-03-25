<?php  require_once("includes/function.php");?>
 <?php require_once("lib/sessions.php"); ?>
 <?php  require_once("includes/funct.php"); ?>
 
 
 ?>
 <?php 
 

$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
           
                if (isset($_GET["id"])) {
                    $idFromurl=$_GET["id"];
                 	$query=mysqli_query($conn, "UPDATE staffreg SET status='1' WHERE id='$idFromurl'");
			 		if ($query>0){
					$_SESSION["SuccessMessage"]= "Access Suspended successfully";
					Redirect_to("staappfile.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Access not suspended, try again";
					Redirect_to("staappfile.php");
					}
				}
				 elseif (isset($_GET["iid"])) {
                    $idFromurl=$_GET["iid"];
                 	$query=mysqli_query($conn, "UPDATE transcript_applications SET ProcessingStatus='1' WHERE AppRef='$idFromurl'");
			 		if ($query>0){
					$_SESSION["SuccessMessage"]= "Transcript Payment Confirmed";
					Redirect_to("allcertpayme.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not successfull, try again";
					Redirect_to("allcertpayme.php");
					}
				}
				elseif (isset($_GET["acc"])) {
                    $idFromurl=$_GET["acc"];
                 	$query=mysqli_query($conn, "UPDATE biodata SET status='1' WHERE id='$idFromurl'");
			 		if ($query>0){
					$_SESSION["SuccessMessage"]= "Access granted successfully";
					Redirect_to("studstatus.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Access not granted, try again";
					Redirect_to("studstatus.php");
					}
                }
                elseif (isset($_GET["idis"])) {
                    $idFromurl=$_GET["idis"];
			 		$query=mysqli_query($conn, "UPDATE transcript_applications SET ProcessingStatus='0' WHERE AppRef='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Payment Unconfirm";
					Redirect_to("allcertpayme.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("allcertpayme.php");
					}
				}
				elseif (isset($_GET["dist"])) {
                    $idFromurl=$_GET["dist"];
			 		$query=mysqli_query($conn, "UPDATE minut SET status='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Documents not ready for the Meeting";
					Redirect_to("viewaged.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("viewaged.php");
					}
				}
				 elseif (isset($_GET["idd"])) {
                    $idFromurl=$_GET["idd"];
			 		$query=mysqli_query($conn, "UPDATE minut SET status1='1' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Documents verified to have been used for the Meeting";
					Redirect_to("viewaged.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("viewaged.php");
					}
				}
				elseif (isset($_GET["disa"])) {
                    $idFromurl=$_GET["disa"];
			 		$query=mysqli_query($conn, "UPDATE staffprom SET status='1' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Promotion Approved";
					Redirect_to("mempro.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("mempro.php");
					}
				}
				 elseif (isset($_GET["ena"])) {
                    $idFromurl=$_GET["ena"];
			 		$query=mysqli_query($conn, "UPDATE staffprom SET status1='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Promotion Exercise under processing";
					Redirect_to("mempro.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("mempro.php");
					}
				}
				elseif (isset($_GET["disaa"])) {
                    $idFromurl=$_GET["disaa"];
			 		$query=mysqli_query($conn, "UPDATE transcle SET status='1' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Study Leave/Sabbatical/Secondment Request Approved";
					Redirect_to("stafftrans.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("stafftrans.php");
					}
				}
				 elseif (isset($_GET["enaa"])) {
                    $idFromurl=$_GET["enaa"];
			 		$query=mysqli_query($conn, "UPDATE transcle SET status='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Study Leave/Sabbatical/Secondment Request  not Approved";
					Redirect_to("stafftrans.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("stafftrans.php");
					}
				}elseif (isset($_GET["isaa"])) {
                    $idFromurl=$_GET["isaa"];
			 		$query=mysqli_query($conn, "UPDATE transclee SET status='1' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Staff Transfer Request Approved";
					Redirect_to("tran.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("tran.php");
					}
				}
				 elseif (isset($_GET["naa"])) {
                    $idFromurl=$_GET["naa"];
			 		$query=mysqli_query($conn, "UPDATE transclee SET status1='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Staff Transfer Request  not Approved";
					Redirect_to("tran.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("tran.php");
					}
				}
				elseif (isset($_GET["diss"])) {
                    $idFromurl=$_GET["diss"];
			 		$query=mysqli_query($conn, "UPDATE minut SET status1='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Documents not ready for the Meeting";
					Redirect_to("viewaged.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("viewaged.php");
					}
				}
				 elseif (isset($_GET["dis"])) {
                    $idFromurl=$_GET["dis"];
			 		$query=mysqli_query($conn, "UPDATE staffreg SET status='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Access Granted successfully";
					Redirect_to("staappfile.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Access not Granted, try again";
					Redirect_to("staappfile.php");
					}
		        }
		       elseif (isset($_GET["sus"])) {
                    $idFromurl=$_GET["sus"];
			 		$query=mysqli_query($conn, "UPDATE biodata SET status='0' WHERE id='$idFromurl'");
			 		if ($query){
					$_SESSION["SuccessMessage"]= "Access Suspended successfully";
					Redirect_to("studstatus.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Access not Suspend, try again";
					Redirect_to("studstatus.php");
					}
		        }
                if (isset($_GET['del'])) {
                    $idFromurl=$_GET["del"];
                    $query = mysqli_query($conn, "DELETE FROM regist WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Member Details Deleted successfully";
					Redirect_to("endmin.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("endmin.php");
					}
				}
				if (isset($_GET['des'])) {
                    $idFromurl=$_GET["des"];
                    $query = mysqli_query($conn, "DELETE FROM reviewpanel WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Document Deleted successfully";
					Redirect_to("facview.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("facview.php");
					}
				}
				if (isset($_GET['dell'])) {
                    $idFromurl=$_GET["dell"];
                    $query = mysqli_query($conn, "DELETE FROM staffreg WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Document Deleted successfully";
					Redirect_to("staappfile.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("staappfile.php");
					}
				}
				if (isset($_GET['dells'])) {
                    $idFromurl=$_GET["dells"];
                    $query = mysqli_query($conn, "UPDATE transcript_applications SET TransgenStatus='1' WHERE AppRef='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Transcript Generation Confirmed";
					Redirect_to("staappcerfileoff.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("staappcerfileoff.php");
					}
				}

				if (isset($_GET['delts'])) {
                    $idFromurl=$_GET["delts"];
                    $query = mysqli_query($conn, "UPDATE transcript_applications SET TransApproStatus='1' WHERE AppRef='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Transcript Approved Confirmed to be Ready";
					Redirect_to("transcriptsappro.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("transcriptsappro.php");
					}
				}
				elseif (isset($_GET['delst'])) {
                    $idFromurl=$_GET["delst"];
                    $query = mysqli_query($conn, "UPDATE transcript_applications SET TransApproStatus='0' WHERE AppRef='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Transcript Not Yet Ready";
					Redirect_to("transcriptsappro.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("transcriptsappro.php");
					}
				}
				elseif (isset($_GET['detls'])) {
                    $idFromurl=$_GET["detls"];
                    $date=date("Y-m-d");
                    $query = mysqli_query($conn, "UPDATE transcript_applications SET TransSentStatus='1', dateSent='$date' WHERE AppRef='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Transcript Confirmed to have been printed and Sent";
					Redirect_to("procesessprint.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("procesessprint.php");
					}
				}

				elseif (isset($_GET['detlt'])) {
                    $idFromurl=$_GET["detlt"];

                    $query = mysqli_query($conn, "UPDATE transcript_applications SET TransSentStatus='0' WHERE AppRef='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Transcript not Printed";
					Redirect_to("procesessprint.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("procesessprint.php");
					}
				}

				if (isset($_GET['delt'])) {
                    $idFromurl=$_GET["delt"];
                    $query = mysqli_query($conn, "DELETE FROM transcle WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Document Deleted successfully";
					Redirect_to("stafftrans.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("stafftrans.php");
					}
				}if (isset($_GET['elt'])) {
                    $idFromurl=$_GET["elt"];
                    $query = mysqli_query($conn, "DELETE FROM transclee WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Document Deleted successfully";
					Redirect_to("tran.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("tran.php");
					}
				}
				if (isset($_GET['dels'])) {
                    $idFromurl=$_GET["dels"];
                    $query = mysqli_query($conn, "DELETE FROM regist WHERE id='$idFromurl'");
                    if ($query){
					$_SESSION["SuccessMessage"]= "Agenda and Paper Record Deleted successfully";
					Redirect_to("viewaged.php");
					}
					else{
					$_SESSION["ErrorMessage"]= "Operation not Succssfull, try again";
					Redirect_to("viewaged.php");
					}
				}
				
       
?>
			
 