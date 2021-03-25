<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<?php

    $staffno = $_POST['mactricno'];

    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    
    $phoneno = $_POST['phoneno'];
    
    $password = $_POST['password'];
    $passcon = $_POST['passcon'];
    $regdate=date("Y-m-d");
    
    if (empty($staffno) || empty($surname) || empty($phoneno) || empty($password) || empty($passcon)){
  $_SESSION["ErrorMessage"]= "All Fields must be filled out";
  Redirect_to("sappffreg.php");
    }
    elseif(checkUserByStaffname1($staffno)){
      $_SESSION["SuccessMessage"] = "Staff Already Registered";
      Redirect_to("stafflogin.php");
    }
    /* elseif(!checkUserActivation($mactricno)){
      $_SESSION["ErrorMessage"] = "Make payment for your Application to Proceed";
      Redirect_to("processing_pay.php");
    } */
    else if ($password!=$passcon){
        $_SESSION["ErrorMessage"] = 'Confirm Password do not match with Password';
      Redirect_to("sappffreg.php");
         
     }
   else{
        $password=md5($password);
        $query = "INSERT INTO staffreg (StaffReg, surname, firstname, PhoneNo, password, regdate) VALUE ('$staffno', '$surname', '$firstname', '$phoneno', '$password', '$regdate')"; 
            $insert_row = mysqli_query($conn,$query); 
           if ($insert_row>0){
                 $_SESSION["SuccessMessage"]= "Staff details submitted Successfully";
                 Redirect_to("sappffreg.php");
                 
            }
            else {
                
                 $_SESSION["ErrorMessage"]= "Error! Not Submitted";
                Redirect_to("sappffreg.php");
            }
         }


?>
