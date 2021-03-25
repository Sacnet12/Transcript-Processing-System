<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<?php require_once("PHPMail/PHPMailerAutoload.php")?>
<?php
$appiref=mt_rand(100000,7000000);
     $mactricno = $_POST['mactricno'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    
   $phoneno = $_POST['phoneno'];
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    
    $password = $_POST['password'];
    $passcon = $_POST['passcon'];
    $regdate=date("Y-m-d");
    $reciref=mt_rand(30000000,9000000000);
    if (empty($mactricno) || empty($surname) || empty($firstname) || empty($phoneno) || empty($email) || empty($username) || empty($passcon)){
  $_SESSION["ErrorMessage"]= "All Fields must be filled out";
  Redirect_to("logintrans.php");
    }
     elseif(!checkUserActivation2($mactricno)){
      $_SESSION["ErrorMessage"] = "Matric No. not found, Please call the Transcript Unit(07033303729) for enquiry";
      Redirect_to("index.php");
    }
    elseif(checkUserByStaffname($email)){
      $_SESSION["SuccessMessage"] = "Email already Exist, Proceed to login page";
      Redirect_to("index.php");
    }
    /* elseif(!checkUserActivation($mactricno)){
      $_SESSION["ErrorMessage"] = "Make payment for your Application to Proceed";
      Redirect_to("processing_pay.php");
    } */
    else if ($password!=$passcon){
        $_SESSION["ErrorMessage"] = 'Confirm Password do not match with Password';
      Redirect_to("index.php");
         
     }
   else{
        $password=md5($password);
        $code = md5(crypt(rand(), 'aa'));
        $query = "INSERT INTO profile (matricno, surnam, onames, phoneno, email, username, password, datereg, reset_code) VALUE ('$mactricno', '$surname', '$firstname', '$phoneno', '$email', '$username',  '$password', '$regdate', '$code')"; 
            $insert_row = mysqli_query($conn,$query); 
           if ($insert_row>0){
                 
                 $mail = new PHPMailer();
                 $mail->isSMTP();
                 $mail->Host='smtp.gmail.com';
                 $mail->Port=587;
                 $mail->SMTPSecure='tls';
                 $mail->SMTPAuth=true;
                 $mail->Username='sacnet2015@gmail.com';
                 $mail->Password='sackin82';
                 $mail->setFrom('sacnet2015@gmail.com');
                 $mail->addAddress($email);
                 $mail->isHTML(true);
                 $mail->Subject="Obafemi Awolowo University Transcript Processing System";
                 $mail->Body = "Hi! You requested a for Transcript Account to be created on Obafemi Awolowo University Transcript Processing System, Click here to <a href='process/p_account_verify.php?code=$code'>Activate</a> the Account.";
                 $mail->SMTPOptions=array("ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                    "allow_self_signed"=>false,
                 ));
                 if($mail->send()){
                    $_SESSION["SuccessMessage"]= "Account Created successfully, Please check your email for Account Verification";
                 Redirect_to("logintrans.php");

                 }
                 else{
                  echo $mail->ErrorInfo;
                 }
            /*send_mail([
                
                'to' => $email,
                'message' => $message,
                'subject' => 'Account Verficiation',
                'from' => 'eProfile System',
                
            ]);
            */
                 
            }
            else {
                
                 $_SESSION["ErrorMessage"]= "Error! Not Submitted";
                Redirect_to("index.php");
            }
         }


?>
