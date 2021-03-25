n<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php lonfiirm();?>
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
     <h5 style="color:#fff; font-size: 15px;margin-left: 8%">Name: <?php echo $_SESSION["surname"];?> <?php echo $_SESSION["firstname"];?></h5>
     

</div>
          </div>
            <div class="cont1">
     

         <ul>
              <li><a href="staappcerfileoff.php">Dashboard</a></li>
             <li><a href="allappreceived.php">All Applications</a></li>
             <li><a href="logout.php">Logout</a></li>

             
             
             
         </ul>
            </div>
    </div>
    <div class="col-sm-9" style="background-color:#e2d9d9;">
    
           
       
        <h3 style="padding-top:8%; text-shadow: .1rem .1rem .5rem black;">APPLICATIONS DETAILS</h3>
       
        <div class="heading-underline1"></div>
        <hr>
        <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
         <?php if (isset($_GET['dell'])) {
                    $idFromurl=$_GET["dell"];
                    $query = mysqli_query($conn, "SELECT * FROM transcript_applications WHERE AppRef='$idFromurl'");
                    $result=mysqli_fetch_array($query);
                    $reg=$result['RegNo'];
                   
          
        }
           ?>
                   <table class="table" style="width:70%; content-align:center; font-size:14px; overflow-x: scroll; margin-top:30px; margin-right: 10%; margin-left:10%; background:#fff;background-color: #fff">

                         <tr>
                            <td style="width:40%">Application Reference No</td>
                            <td style="width:60%"><?php echo $result["AppRef"]  ?></td>
                            
                            
                        </tr>
                         <tr>
                            <td style="width:40%">Application Status</td>
                            <td style="width:60%"><?php if ($result["paystatus"]=='0') {?>
                                <span class="btn btn-warning btn-sm" style="font-size: 10px">Pending</span>
                            <?php  } if ($result["paystatus"]=='1') {?>
                                <span class="btn btn-success btn-sm " style="font-size: 10px">Paid</span>
                          
                            <?php } ?></td>
                            
                            
                        </tr>
                        
                        <tr>
                            <td style="width:40%">Date Applied</td>
                            <td style="width:60%"><?php echo $result["DateApplied"]  ?></td>
                            
                            
                        </tr>

                        <tr>
                            <td style="width:40%">Full Name</td>
                            <td style="width:60%"><?php echo $result["surname"] ?> <?php echo $result["onames"] ?></td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Faculty</td>
                            <td style="width:60%"><?php echo $result["faculty"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Phone Number</td>
                            <td style="width:60%"><?php echo $result["PhoneNo"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Email</td>
                            <td style="width:60%"><?php echo $result["AppEmail"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Session</td>
                            <td style="width:60%"><?php echo $result["GradSession"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Degree Programme</td>
                            <td style="width:60%"><?php echo $result["DegreeProg"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Programme Duration</td>
                            <td style="width:60%"><?php echo $result["GradPart"]; ?> </td>
                            
                            
                        </tr>
                         <tr>
                            <td style="width:40%">Mode of Delivery</td>
                            <td style="width:60%"><?php echo $result["formDelivery"]; ?> <?php echo $result["location"]; ?> </td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Recipient Name</td>
                            <td style="width:60%"><?php echo $result["ReceiverName"]; ?></td>
                            
                            
                        </tr>
                        <tr>
                            <td style="width:40%">Recipient Address</td>
                            <td style="width:60%"><?php echo $result["ReceiverAdd"]; ?></td>
                            
                            
                        </tr>
                                  
                    </table>



    
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
    
        
</body>

</html>