<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Transcripts Software</title>
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
                      
                          
                        <div class="card" style="max-width: 55%; height:auto;  background:#fff; opacity: 0.8; margin-left:20%; padding-left:30px;  padding-right:30px;
                                margin-top: 15%;  margin-bottom: 5%; padding-bottom:5%; padding-top: 1%;  border-radius: 10px 10px 10px 10px;">
                        <div class="card-header" style="width: 100%; background-color: rgb(29, 20, 78)">
                            <h2 style="padding-left:10%;  padding-right:10%; font-size: 18px; text-align: center; color:rgb(190, 143, 14); text-shadow:.1rem .2rem black">CREATE ACCOUNT</h2> 
                            <p style="color: rgb(190, 143, 14)">Applied before? <a href="logintrans.php" style="text-decoration: none; color:#fff">Login</a></p>
                            <p style="color:#fff; font-size: 16px;">Instruction</p>
                            <ul>
                                <li style="color:red; font-size: 16px;">Please provide accurate data</li>
                                <li style="color:red; font-size: 16px;">Carefully fill this form as any mistake will lead to wrong response</li>
                            </ul>

                        </div>
                            
                <form method="post" id="myForm" action="actionprocess.php">
                    <?php echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    <br>
              <div>
                       
</div><br>
                  
                <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Surname</span></label>
                    <input type="text" name="surname" id="name" class="form-control py-2">
                  </div>
              </div>
                   <div class="row">
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Other Names</span></label>
                    <input type="text" name="firstname" id="name" class="form-control py-2">
                  </div>
              </div>
                <div class="row">
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Email</span></label>
                    <input type="email" name="email" id="name" class="form-control py-2">
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Phone Number</span></label>
                    <input type="text" name="phoneno" id="name" maxlength="15" minlength="15" class="form-control py-2">
                  </div>
              </div>
            
                   <div class="row">
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Username</span></label>
                    <input type="text" name="username" id="name" class="form-control py-2">
                  </div>
              </div>
                 <div class="row">
                <div class="col">
                         <label>Create Password </label>
                        <input type="password" id="password" name="password" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value=""  placeholder="Your Password">
                                               
                    </div>
                    </div>
                 <div class="row">
                    <div id="message">
                        <h3 style="font-size:14px;">Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div> 
                  <div class="col">
                    <label for="name"><span class="input-group-addon">Confirm Password</span></label>
                    <input type="password" name="passcon" id="name" class="form-control py-2">
                  </div>
              </div>
            <div class="row">
                <div class="col">
                        
                            <input type="submit" class="btn btn-outline-info col-md-3" value='Create' style="float:right; margin-top:5px;color:#000;border-color:#000">
                        </div>
                
                </div>  

            </form>  
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