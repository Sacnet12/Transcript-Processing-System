<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Appointments & Promotions Committee</title>

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

<?php

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $password = $_POST['password'];
    $conpass = $_POST['confirm'];
    $FILES = $_FILES['image']['name'];
    $files = $_FILES['image']['size'];
    $filet = $_FILES['image']['type'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $regdate=date("Y-m-d");
    $extensions= array("jpeg", "jpg", "png");
    $array = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($array));
    if (empty($title) || empty($surname) || empty($firstname) || empty($gender) || empty($username) || empty($email) || empty($phoneno) || empty($password) || empty($conpass)){
  $_SESSION["ErrorMessage"]= "All Fields must be filled out";
  Redirect_to("cxtam.php");
    }
    elseif(checkUserByStaffname($username)){
      $_SESSION["ErrorMessage"]= "Username Already Exit";
      Redirect_to("cxtam.php");
    }
    elseif (in_array($file_ext, $extensions)===false){
      $_SESSION["ErrorMessage"] = 'Only png, jpg and jpeg are allow';
      Redirect_to("cxtam.php");
    }
    else if ($files >102400){
      $_SESSION["ErrorMessage"] = 'Resize the picture, it must not be more than 1MB';
      Redirect_to("cxtam.php");
    }
    else if ($password!=$conpass){
        $_SESSION["ErrorMessage"] = 'Passwords entered do not match';
      Redirect_to("cxtam.php");
         
     }

     else
     {
         $password=md5($password);
         $query = "INSERT INTO regist(title, surname, firstname, gender, username, email, phoneno,   password, image, regdate) VALUE ('$title', '$surname', '$firstname', '$gender', '$username', '$email', '$phoneno',  '$password', '$FILES', '$regdate')"; 
            $insert_row = mysqli_query($conn,$query); 
            move_uploaded_file($tmp_image, "file/".$FILES);
            if ($query){

                $_SESSION["SuccessMessage"]= "Registration Successfull";
                Redirect_to("cxtam.php");
            }
            else {
               $_SESSION["Message"]= "Registration Successfull";
                Redirect_to("cxtam.php");
            }

}
}
    ?>

 

</head>
<body>

<?php 
     include_once 'includes/header.php';
     ?>

   

<div class="container-fluid">
    <div class="row">
            <div class="col-sm-4" style="background-color:#e2d9d9;">
            <div class="cont2">
            <p style="padding-top:5px; padding-left:20px; font-size:18px; color:rgb(190,143,14);">MAIN ADMIN PANEL</p>
     
          </div>
            <div class="cont1">
     

         <ul>
             <li><a href="meeag.php">Applications</a></li>
             
             
             
         </ul>
            </div>
    </div>
    <div class="col-sm-8" style="background-color:#e2d9d9;">
    <div class="plateacc">
        
           
       
        <h3 style="padding-top:2rem; text-shadow: .1rem .1rem .5rem black;">Transcript Application</h3>
        <div class="heading-underline1"></div>
        <hr>
  <span id="state"></span>
<form action="" method="post" enctype="multipart/form-data">
   <?php echo Message(); 
        echo SuccessMessage(); 
    ?>

<div>
        <label>Title</label>
        <SELECT class="form-control" name="title" required>
            <option value="" class="selected">Select title</option>
            <option value="Mr.">Mr.</option>
            <option value="Miss">Miss</option>
            <option value="Mrs.">Mrs.</option>
            
                                    
        </SELECT>
     </div>
     <div>
        <label>ID</label>
        <input type="text" name="surname"  class="form-control" readonly required="" >
        
    </div>
    <div>
        <label>Surname</label>
        <input type="text" name="surname"  class="form-control"  readonly required="" >
        
    </div>
    <div>
        <label>Firstname</label>
        <input type="text" name="firstname"  readonly  class="form-control" >
        
    </div>
    <div>
        <label>Sex</label>
        
        <input type="text" name="sex"  readonly class="form-control" >
        
     </div> 
     <div>
        <label>Year of Graduation</label>
        <input type="text" name="yeargrad"  readonly class="form-control" >
    
    </div> 
    <div>
        <label>Email</label>
        <input type="email" name="email" required="" class="form-control" placeholder="Enter your Email">
    </div>
    <div>
        <label>Receiver's Name/Institution Name</label>
        <input type="text" name="receivername" required="" class="form-control" placeholder="Enter your Receiver Full Name">
    
    </div>
      <div>
        <label>Receiver's Address</label>
        <input type="text" name="receiveradd" class="form-control" placeholder="Enter your Receiver Full Name">
    
    </div>                       
                      
    
    
    <br>
    <div>
                            <input type="submit" name="submit" class="btn btn-outline-info col-md-3" value='Signup' style="float:right">
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