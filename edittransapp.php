<?php 
    
    require_once("include/function.php");
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
    <title>Edit Profile | Transcripts</title>

   

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
    <div class="plateacc">
        
           
       
        <h3 style="padding-top:8.5%; text-shadow: .1rem .1rem .5rem black;">Edit Transcript Application</h3>
        <div class="heading-underline1"></div>
        <hr>
  <?php 
      if (isset($_GET['dell'])) {
        $idFromurl=$_GET["dell"];  
        $query=mysqli_query($conn, "SELECT * FROM transcript_applications WHERE AppRef='$idFromurl'");

  $result=mysqli_fetch_array($query);
  $reg=$result['RegNo'];
}

  ?>
<form method="post" action="actionupdate.php" enctype="multipart/form-data">
   <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
    <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Matric. No</span> </label>
                    
                                        
                    <input type="text" name="mactricno" id="name" value="<?php echo $result['RegNo']; ?>" readonly class="form-control py-2">
            
                </div>
            </div>
            <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Surname</span></label>
                    <input type="text" name="surname" id="name" value="<?php echo $result['surname']; ?>" class="form-control py-2">
                  </div>
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Firstname</span></label>
                    <input type="text" name="firstname" id="name" value="<?php echo $result['onames']; ?>" class="form-control py-2">
                  </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Graduation Session</span></label>
                    <input type="text" name="gradsess" id="name" value="<?php echo $result['GradSession']; ?>" readonly class="form-control py-2">
                    
                  </div>
                  
                <div class="col">
                    <label for="name"><span class="input-group-addon">Graduation Semester</span></label>
                    <input type="text" name="gradsem" value="<?php echo $result['GradSemester']; ?>" readonly id="name" class="form-control py-2">
                    
                  </div>
              </div>
               <div class="row">
                <div class="col">
        <label>Faculty</label>
        <input type="text" name="faculty" id="name" value="<?php echo $result['faculty']; ?>" readonly class="form-control py-2">
        
    </div>
              
                 
                <div class="col">
                    <label for="name"><span class="input-group-addon">Degree Programme</span></label>
                    <input type="text" name="degprog" readonly value="<?php echo $result['DegreeProg']; ?>" id="name" class="form-control py-2">
                  </div>
                 
            </div>
        <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Graduation Part</span></label>
                    <input type="text" name="gradpart" readonly id="name" value="<?php echo $result['GradPart']; ?>" class="form-control py-2">
                                           
                  </div>
              
                  
                
                </div>
                <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Applicant's Phone Number</i></span></label>
                    <input type="text" name="gradphoneno" value="<?php echo $result['PhoneNo']; ?>" maxlength="11" minlength="11" id="name" class="form-control py-2">
                  </div>
                   
                <div class="col">
                    <label for="name"><span class="input-group-addon">Applicant's email</span></label>
                    <input type="email" name="grademail" value="<?php echo $result['AppEmail']; ?>"   id="name" class="form-control py-2">
                  </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Form of Delivery</i></span></label>
                    <input type="text" name="modedel" id="myText" value="<?php echo $result['formDelivery']; ?>" maxlength="11" minlength="11" id="name" class="form-control py-2">
                  </div>
                   
                <div class="col">
                    <label for="name"><span class="input-group-addon">Location</span></label>
                    <input type="text" name="modeloc"  id="myTexts" value="<?php echo $result['location']; ?>" class="form-control py-2">
                  </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Update Form of Delivery</span></label>
                    <select class="form-control" onchange="myFunctions(event);" id="countySel">
                                    <option value="" class="selected">Select Delivery Method</option>
                                   
                                    <option value="Electmode">Electronic Delivery</option>
                                    <option value="couriermode">Courier Delivery</option> 
                     </select>
                  </div>
                <div class="col">
                    <label for="name"><span class="input-group-addon"> Update Location</span></label>
                    <select class="form-control" onchange="myFunction(event);" id="stateSel" size="1">
                                    <option value="" class="selected">Select Delivery Method</option>
                                   <option value="Nigeria">Nigeria</option>
                                   <option value="Out Nigeria">Out Nigeria</option>
                                    
                                                      
                     </select>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Recipient Name</span></label>
                    <input type="text" name="gradrecepname" id="name" value="<?php echo $result['ReceiverName']; ?>" class="form-control py-2">
                  </div>
                 <div class="col">
                    <label for="name"><span class="input-group-addon">Details Address of the Recepient</span></label>
                    <input type="text" name="gradrecepadd" value="<?php echo $result['ReceiverAdd']; ?>" id="name" class="form-control py-2">
                  </div>
              </div>
    
    
    <br>
    <div>
                            <input type="submit" name="submit" class="btn btn-outline-info col-md-3" value='Update' style="float:right">
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
    <script type="text/javascript">
    function myFunction(e) {
    document.getElementById("myTexts").value = e.target.value
}
function myFunctions(e) {
    document.getElementById("myText").value = e.target.value
}
function myFunctionss(e) {
    document.getElementById("myTextss").value = e.target.value
}
function myFunctionse(e) {
    document.getElementById("myTextse").value = e.target.value
}
  </script>
        
</body>

</html>