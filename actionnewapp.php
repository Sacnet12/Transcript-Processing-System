<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<?php
    $appiref=mt_rand(100000,70000000);
    $mactricno = $_POST['mactricno'];

    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $gradsess = $_POST['gradsess'];
    $gradsem = $_POST['gradsem'];
    $faculty = $_POST['faculty'];
    $degprog = $_POST['degprog'];
    $gradphoneno = $_POST['phone'];
    $grademail = $_POST['grademail'];
    $modedel = $_POST['modedel'];
    $modeloc = $_POST['modeloc'];
    $gradrecepname = $_POST['gradrecepname'];
    $gradrecepadd = $_POST['gradrecepadd'];
    $gradrecepemail = $_POST['gradrecepemail'];
    
    
    $regdate=date("Y-m-d");
    $reciref=mt_rand(300000000,9000000000);
    if (empty($mactricno) || empty($surname) || empty($firstname) || empty($gradsess) || empty($gradsem) || empty($degprog) || empty($faculty) || empty($gradphoneno) || empty($grademail) || empty($modedel) || empty($modeloc) || empty($gradrecepname) || empty($gradrecepadd)){
  $_SESSION["ErrorMessage"]= "All Fields must be filled out";
  Redirect_to("appapplnew.php");
    }
    
    /* elseif(!checkUserActivation($mactricno)){
      $_SESSION["ErrorMessage"] = "Make payment for your Application to Proceed";
      Redirect_to("processing_pay.php");
    } */
   
   else{
        $password=md5($password);
        $query = "INSERT INTO transcript_applications (AppRef, RegNo, surname, onames, GradSession, GradSemester,  DegreeProg, faculty, DateApplied, PhoneNo, AppEmail, RecRef,  ReceiverName, ReceiverAddress, ReceiverEmail, formDelivery, location) VALUE ('$appiref', '$mactricno', '$surname', '$firstname', '$gradsess', '$gradsem', '$degprog', '$faculty', '$regdate', '$gradphoneno', '$grademail','$appiref', '$gradrecepname', '$gradrecepadd', '$gradrecepemail', '$modedel', '$modeloc')"; 
            $insert_row = mysqli_query($conn,$query); 
           if ($insert_row>0){
                 $_SESSION["SuccessMessage"]= "New Application Submitted successfully, Make Payment for New Application ";
                 Redirect_to("appfilesucse.php");
                 
            }
            else {
                
                 $_SESSION["ErrorMessage"]= "Error! Not Submitted";
                Redirect_to("appapplnew.php");
            }
         }


?>
