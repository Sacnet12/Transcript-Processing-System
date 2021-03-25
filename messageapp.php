<?php 
    
    require_once("include/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php

if(isset($_POST['submit']))
{
     $Reg = $_SESSION["Reg_id"];
    $message = $_POST['message'];
   
    $regdate=date("Y-m-d");
    
   
     
            $query = "INSERT INTO complains(RegNo, content, dates) VALUE ('$Reg', '$message', '$regdate')"; 
            $insert_row = mysqli_query($conn, $query); 
            if ($query){

                $_SESSION["SuccessMessage"]= "Your message submitted successfully, Transcript Officer will response soon";
                Redirect_to("messageapp.php");
            }
            else {
               $_SESSION["Message"]= "Message not submitted";
                Redirect_to("messageapp.php");
            }


}
    ?>
<?php confirm();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | Transcripts</title>

   

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
     <h5 style="color:#fff; font-size: 15px;margin-left: 8%">Name: <?php echo $_SESSION["surname"];?> <?php echo $_SESSION["firstname"];?></h5>


</div>
          </div>
            <div class="cont1">
     

         <ul>
              <li><a href="appfilesucse.php">Dashboard</a></li>
          <li><a href="appimacentry.php">Apply</a></li>
              <li><a href="appfilesucse.php">Track Application</a></li>
             
             
             <li><a href="processingstat.php">View Status</a></li>
             <li><a href="messageapp.php">Compose</a></li>
             
             <li><a href="logout.php">Logout</a></li>
             
             
         </ul>
            </div>
    </div>
    <div class="col-sm-9" style="background-color:#e2d9d9;">
    <div class="plateacc">
        
           
       
        <h3 style="padding-top:2rem; text-shadow: .1rem .1rem .5rem black; margin-top: 6%">Applicant's Complain</h3>
        <div class="heading-underline1"></div>
        <hr>
  
<form action="" method="post" enctype="multipart/form-data">
   <?php echo Message(); 
        echo SuccessMessage(); 
    ?>


    <div>
        <label>Message/Complain</label>
        <textarea type="text" name="message" id="edit" class="form-control"></textarea>
        
        
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