<?php 
    
    require_once("include/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>

<?php confirm();



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apply | Transcripts</title>

   

    </style>
    <link rel="stylesheet" href=css/style.css> 
    
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/owl_002.css" rel="stylesheet">
    
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
   
    <link rel="stylesheet" href=css/bootstrap.min.css>
     <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ddsmoothmenu.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css">
  <link rel="stylesheet" href="build/css/demo.css">

 

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
        
           
       
        <h3 style="padding-top:8.5%; text-shadow: .1rem .1rem .5rem black;">New Application</h3>
        <div class="heading-underline1"></div>
        <hr>
 
<form method="post" action="actionnewapp.php" enctype="multipart/form-data">
   <?php echo Message(); 
        echo SuccessMessage(); 
    ?>

    <?php
        $suname = $_SESSION['Names'];
        
     list($surname, $othername, $middlename) = explode(' ', $suname);
      

     ?>
    <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Matric. No</span> </label>
                    
                                        
                    <input type="text" name="mactricno" id="name"  value="<?php echo $_SESSION['RegNo'] ?>" readonly class="form-control py-2">
            
                </div>
            </div>
            <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Surname</span></label>
                    <input type="text" name="surname" id="name" readonly value="<?php echo $surname ?>" class="form-control py-2">
                  </div>
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Other Names</span></label>
                    <input type="text" name="firstname" id="name" readonly value="<?php echo $othername ?> <?php echo $middlename ?>" class="form-control py-2">
                  </div>
                  
              </div>
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Graduation Session</span></label>
                   
                   <SELECT class="form-control" name="gradsess">
                                 <option value="" class="selected">Select Year</option>
                              <?php
                      $currsession=date('Y');
                        for ($j = 1990; $j <= $currsession; $j++){
                          $y1 = $j;
                          $y2 = $j + 1;
                          $session  = $y1 . "/" . $y2;
                          ?>
                          <option value="<?php echo $y1; ?>"><?php echo $session; ?></option>
                        <?php
                          
                        }
                      
                        ?>
                              
                                                                 
                          </SELECT>
                  </div>
                  
                <div class="col">
                    <label for="name"><span class="input-group-addon">Graduation Semester</span></label>
                    
                     <SELECT class="form-control" name="gradsem">
                                 <option value="" class="selected">Select Semester</option>
                             
                          <option value="Ham">Hamattan</option>
                          <option value="Rain">Rain</option>
                        
                      
                        ?>
                              
                                                                 
                          </SELECT>
                  </div>
              </div>
               <div class="row">
                <div class="col">
        <label>Faculty</label>
                     <SELECT class="form-control" name="faculty"  onchange="toggleLGA(this);" id="state">
                                 <option value="" class="selected">Select Faculty</option>
                              <option value="Art">Art</option>
                              <option value="Agriculture">Agriculture</option>
                              <option value="Basic Medical Sciences">Basic Medical Sciences</option>
                              <option value="Clinical Sciences">Clinical Sciences</option>
                              <option value="Environmental Design and Management">Environmental Design and Management</option>
                              <option value="Densitry">Densitry</option>
                              <option value="Education">Education</option>
                              <option value="Law">Law</option>
                              <option value="Pharmarcy">Pharmarcy</option>
                              <option value="Science">Science</option>
                              <option value="Social and Management Sciences">Social and Management Sciences</option>
                              <option value="Technology">Technology</option>
                              
                                                                 
                          </SELECT>
        
    </div>
              
                 
                <div class="col">
                    <label for="name"><span class="input-group-addon">Degree Programme</span></label>
                    

                    <select name="degprog" id="lga" class="form-control select-lga" required>
                </select>
                  </div>
                 
            </div>
        <div class="row">           
                <div class="col">
                    <label for="name"><span class="input-group-addon">Phone Number</i></span></label><br>
                    <input type="tel" name="phone" value="" maxlength="15" minlength="10" id="phone" class="form-control" style="width: 100%">
                  </div>

                  <div class="col">
                    <label for="name"><span class="input-group-addon">Applicant's email</span></label>
                    <input type="email" name="grademail" value=""   id="name" class="form-control py-2">
                  </div>
              
                 </div> 
      <div class="row"> 
                
             
                <div class="col">
                    <label for="name"><span class="input-group-addon">Form of Delivery</i></span></label>
                    <select name="modedel" class="form-control" id="selectBox" onchange="changeFunc();">
                                    <option value="" class="selected">Select Mode of Delivery</option>
                                   
                                    <option id="electronic" value="Electronic mode">Electronic Delivery</option>
                                    <option id="paper" value="Paper">Paper</option> 
                     </select>
                  </div>
                 </div>  
                 <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Location</span></label>
                    <select name="modeloc" class="form-control" id="stateSel" size="1">
                                    <option value="" class="selected">Select Delivery Method</option>
                                   <option value="Nigeria">Nigeria</option>
                                   <option value="Outside Nigeria">Outside Nigeria</option>
                                    
                                                      
                     </select>
                  
              </div>
            </div>
             
              <div class="row">
                <div class="col">
                    <label for="name"><span class="input-group-addon">Recipient Name</span></label>
                    <input type="text" name="gradrecepname" id="name" value="" class="form-control py-2">
                  </div>
                 <div class="col">
                    <label for="name"><span class="input-group-addon">Details Address of the Recepient</span></label>
                    <input type="text" name="gradrecepadd" value="" id="name" class="form-control py-2">
                  </div>
                  <div class="col" style="display: none" id="textboxes">
                    <label for="name"><span class="input-group-addon">Recepient Email</span></label>
                    <input type="email" name="gradrecepemail" value=""  class="form-control py-2">
                  </div>
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
    <script src="build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
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

function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="Electronic mode"){
$('#textboxes').show();
}
else {

$('#textboxes').hide();
}
}
  </script>
    <script src="js/lga.js"></script>  

</body>

</html>