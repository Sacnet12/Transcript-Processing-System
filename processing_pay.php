<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | APPOINTMENTS & PROMOTIONS COMMITTEE</title>
    <link rel="stylesheet" href=css/style.css> 
    
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl.css" rel="stylesheet">
    <link href="css/owl_002.css" rel="stylesheet">
    
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen"/>
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ddsmoothmenu.css">

     <style type="text/css">
        
#message {
  display:none;
  width: 300px;
  background: #f3f5f5;
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/jquery_004.js"></script>
    <script src="js/jquery_002.js"></script>
    <script src="js/jquery_003.js"></script>
    <script src="js/customjs.js"></script>
    <script src="js/main.js"></script>
    <script>
var stateObject = {
"Electronic": {"Nigera", "Outside Nigeria"},
"Paper": {"Nigera", "Outside Nigeria"},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),

for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
   
   
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="img/oaulog.png" style="width:440px; height:75px;"></a>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
 <div class="collapse navbar-collapse" id="navbarResponsive">
            
        </div>
    </nav>
<div class="container-fluid">
<div class="row justify-content-center">
        
        <div class="col-sm-12">
                        <div class="containerrr">
                          
                        <div class="platereeg">
                            <h2 style="padding-top:5%; padding-left:10%;  padding-right:10%; font-size: 30px; text-align: center; color:rgb(190, 143, 14); text-shadow:.1rem .2rem black">TRANSCRIPT PAYMENT DETAILS</h2> 
                        <div>
                            <?php echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    </div>
               
            </div>  
            </div>           
                </div>
    
</div>
</div>
<footer>
        <div class="row justify-content-center">
            <div class="col-md-5 text-center contact-grdr center-grid wow fadeInLeft" data-wow-duration="1400ms" data-wow-delay="800ms" style="visibility: hidden; animation-duration: 1400ms; animation-delay: 800ms; animation-name: none;">
            <br>
                
            <hr class="socket">
            &copy; Computer Center <script>document.write(new Date().getFullYear());</script> <br>
            
                
                Obafemi Awolowo University<br>
                Ile-Ife<br>
                Nigeria<br>
                
                
            </div>

        </div>
</footer>
<script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
</script> 
</body>
</html>