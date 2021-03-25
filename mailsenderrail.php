<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php

if(isset($_POST['submit']))
{
        $subject = $_POST['subject'];
     
    $message = $_POST['message'];
   $file = $_FILES['attach']['name'];
   $filet = $_FILES['attach']['tmp'];
   $files = $_FILES['attach']['size'];
   $extensions= array("pdf");
    $array = explode('.', $_FILES["attach"]["name"]);
    $file_ext = strtolower(end($array));
    $target="mailfold/".basename($_FILES["attach"]["name"]);
    if(empty($subject) || empty($message)){
      $_SESSION["ErrorMessage"] = 'Fields cannot be Empty';
  Redirect_to("mailsenderrail.php");
    }
    elseif (in_array($file_ext, $extensions)===false){
  $_SESSION["ErrorMessage"] = 'Only PDF are allow';
  Redirect_to("mailsenderrail.php");
}
else if ($files > 256000){
  $_SESSION["ErrorMessage"] = 'Size must not be more than 250KB';
  Redirect_to("mailsenderrail.php");
}
else{
   
    $regdate=date("Y-m-d");
    
   
     
            $query = "INSERT INTO mailmessage(subject, mailbody, filename, created_on) VALUE ('$subject', '$message', '$file', '$regdate')"; 
            $insert_row = mysqli_query($conn, $query); 
            move_uploaded_file($_FILES['attach']["tmp_name"], $target);
            if ($query){
                $querys = mysqli_query($conn, "SELECT id FROM mailmessage WHERE mailbody='$message'");
                
                $results = mysqli_fetch_array($querys);
                $resut=$results['id'];
                $_SESSION["SuccessMessage"] = "Mail Message Created successfully, proceed to select the Recipient";
                Redirect_to("mailsender.php?dell={$resut}");
            }
            else {
               $_SESSION["Message"]= "Message not submitted";
                Redirect_to("mailsenderrail.php");
            }
}

}
    ?>
<?php konfiirm();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Transcript</title>

    <style type="text/css">
        
#message {
  display:none;
  width: 300px;
  background: #f2f2f2;
  color: #000;
  font-size: 12px;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 0px;
  font-size: 12px;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: 25px;
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: 25px;
}


    </style>
    <link rel="stylesheet" href=css/style.css> 
    
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/owl_002.css" rel="stylesheet">
    
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
   
    <link rel="stylesheet" href=css/bootstrap.min.css>
     <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ddsmoothmenu.css">


 

</head>
<body>

<?php 
     include_once 'includes/header.php';
     ?>

   

<div class="container-fluid">
    <div class="row">
            <div class="col-sm-3" style="background-color:#e2d9d9;">
            <div class="cont2">
            <p style="padding-top:5px; padding-left:20px; font-size:18px; color:rgb(190,143,14);">APPLICANT DASHBOARD</p>
            
    <div style="margin-right:3%;width:80%">
     <h5 style="color:#fff; font-size: 15px;margin-left: 8%">Welcome, <?php echo $_SESSION["surname"];?> <?php echo $_SESSION["firstname"];?></h5>
     <div style="width:96%; height:50px; background-color: #fff; margin-left: 8%">
           
            <?php 
                $queryapproved=mysqli_query($conn, "SELECT COUNT(*) FROM transcript_applications WHERE paystatus='0'");
                $result=mysqli_fetch_assoc($queryapproved);
                $total=array_shift($result);
                if ($total>0){

                ?>

                <span class="label pull-right label-success" style="margin-left: 30%">Total: <?php echo $total; ?></span>
                <?php } ?>

         </div>

</div>
          </div>
            <div class="cont1">
     <?php if($_SESSION['Role']=="Officer2"){
     echo '

         <ul>
              <li><a href="staffcerfileoff.php">Dashboard</a></li>
              <li><a href="allcertpayme.php">Paid Applications</a></li>
             <li><a href="procesessprint.php">Print Transcript</a></li>
             <li><a href="logout.php">Logout</a></li>
             
             
             
         </ul>
         ';
       }
       elseif ($_SESSION['Role']=="Officer1") {

        echo '

          <ul>
              <li><a href="staappcerfileoff.php">Dashboard</a></li>
             <li><a href="allappreceived.php">All Applications</a></li>
             <li><a href="logout.php">Logout</a></li>
             
             
             
         </ul>


        ';
         
       }
       elseif ($_SESSION['Role']=="Admin") {

        echo '

          
         <ul>
                <li><a href="applicadetaintiniate.php">Dashboard</a></li>
                 <li><a href="transcriptsappro.php">Approve Transcript</a></li>
                <li><a href="payconfermed.php">Paid Applications</a></li>
               <li><a href="staappfile.php">View User</a></li>
               <li><a href="assignfac.php">Assign Faculty</a></li>
             <li><a href="assigbstag.php">Assign Role</a></li>
             <li><a href="sappffreg.php">Add User</a></li>
             <li><a href="mailsenderrail.php">Mail</a></li>
             <li><a href="logout.php">Logout</a></li>
             
             
             
         </ul>
        ';
         
       }
       else{
          $_SESSION["ErrorMessage"]= "Access Denied, You are not authorized to view this page";
          Redirect_to("stafflogin.php");

       }
         ?>
            </div>
       
    </div>
    <div class="col-sm-9" style="background-color:#e2d9d9;">
    <div class="plateacc">
        
           
       
        <h3 style="padding-top:2rem; text-shadow: .1rem .1rem .5rem black; margin-top: 6%">Bulk Mail System</h3>
        <div class="heading-underline1"></div>
        <hr>
  
<form action="" method="post" enctype="multipart/form-data">
   <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
    <div>
        <label>Mail Subject</label>
        <input type="text" name="subject" class="form-control">
        
        
    </div>

    <div>
        <label>Mail Message</label>
        <textarea type="text" name="message" id="edit" class="form-control"></textarea>
        
        
    </div>
    <div>
        <label>Add File (Optional)</label>
        <input type="file" name="attach" class="form-control">
        
        
    </div>
    
    
    <br>
    <div>
                            <input type="submit" name="submit" class="btn btn-outline-info col-md-3" value='Submit' style="float:right">
                        </div>
</form>
             

    </div>
    </div>
    </div>
    </div>
<footer>
        <div class="row justify-content-center">
            <div class="col-md-5 text-center contact-grdr center-grid wow fadeInLeft" data-wow-duration="1400ms" data-wow-delay="800ms" style="visibility: hidden; animation-duration: 1400ms; animation-delay: 800ms; animation-name: none;">
               <hr class="socket">
            &copy; Computer Center <script>document.write(new Date().getFullYear());</script> <br>
            
                
                Obafemi Awolowo University<br>
                Ile-Ife<br>
                Nigeria<br>

                
            </div>
            </div>
</footer>
<script type="text/javascript" src="js/jquery.min.js"></script>
    
    <script type="text/javascript" language="javascript" src="js/ddsmoothmenu.js">


/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
<script src="js/jquery_3.45.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
        
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
</script>
<script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
<script src="js/wow.js"></script>
              <script>
              new WOW().init();
              </script>
      
      <script src="js/wow.js"></script>
    <script type="text/javascript" src="js/image_slide.js"></script>
    
    <script src="js/bootstrap.js"></script>
   
   
    
    <script src="js/jquery.js"></script>
    <script src="js/customjs.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
      <script>
        ClassicEditor
            .create( document.querySelector( '#edit' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        
</body>

</html>