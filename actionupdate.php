<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<?php
    $mactricno = $_POST['mactricno'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $gradsess = $_POST['gradsess'];
    $gradsem = $_POST['gradsem'];
    $faculty = $_POST['faculty'];
    $degprog = $_POST['degprog'];
    $gradpart = $_POST['gradpart'];
    $gradadd = $_POST['gradadd'];
    $gradphoneno = $_POST['gradphoneno'];
    $grademail = $_POST['grademail'];
    $modedel = $_POST['modedel'];
    $modeloc = $_POST['modeloc'];
    $gradrecepname = $_POST['gradrecepname'];
    $gradrecepadd = $_POST['gradrecepadd'];
    
    $regdate=date("Y-m-d");
    
    
    
        $password=md5($password);
        $query = "UPDATE transcript_application SET RegNo='$mactricno', surname='$surname', firstname='$firstname', GradSession='$gradsess', GradSemester='$gradsem', faculty='$faculty', DegreeProg='$degprog', GradPart='$gradpart', DateApplied='$regdate', Address='$gradadd', PhoneNo='$gradphoneno', Email='$grademail', formDelivery='$modedel', Location='$modeloc', ReceiverName='$gradrecepname', RecipientAdd='$gradrecepadd'"; 
            $insert_row = mysqli_query($conn,$query); 
           if ($query){
                 $_SESSION["SuccessMessage"]= "Applicant Details Updated successfully";
                 Redirect_to("appfilesucse.php");
                 
            }
            else {
                
                 $_SESSION["ErrorMessage"]= "Error! Not Updated";
                Redirect_to("editprofile.php");
            }
         


?>
