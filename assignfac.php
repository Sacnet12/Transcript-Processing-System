<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php 
if (isset($_POST['Submit'])){
  $codename =filter_input(INPUT_POST, 'faculty', FILTER_SANITIZE_STRING); 
  $suname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
  
    
    
    $admin=$_SESSION["Reg_id"];
    
    $currenttime = time();
    $status='0';
    $datetime=date("Y-m-d");

    global $conn;
  $query =mysqli_query($conn, "INSERT INTO facassign(facname, name, enterBy, datereg) VALUES('$codename', '$suname', '$admin', '$datetime')");
  
  if ($query){

      $_SESSION["SuccessMessage"]= "Faculty Assigned Successfully";
      Redirect_to("assignfac.php");
      
    }
}
?>
<?php konfiirm();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin |Transcript</title>

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
        
           
       
        <h3 style="padding-top:2rem; text-shadow: .1rem .1rem .5rem black; padding-top: 10%">Assign Faculty</h3>
        <div class="heading-underline1"></div>
        <hr>
        <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
 <form method="post" id="myForm" action="">
                    <?php echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    <br>
              <div>
                  


</div><br>

        <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Assign Faculty</span></label>
                          <SELECT class="form-control" name="faculty">
                              <option value="" class="selected">Select Faculty</option>
                              <option value="Art">Art</option>
                              <option value="Agriculture">Agriculture</option>
                              <option value="Basic Medical Sciences">Basic Medical Sciences</option>
                              <option value="Clinical Sciences">Clinical Sciences</option>
                              <option value="Environmental Design and Management">Environmental Design and Management</option>
                              <option value="Densitry">Densitry</option>
                              <option value="Education">Education</option>
                              <option value="Law">Law</option>
                              <option value="Pharmary">Pharmarcy</option>
                              <option value="Science">Science</option>
                              <option value="Social and Management Sciences">Social and Management Sciences</option>
                              <option value="Technology">Technology</option>
                              
                                                                 
                          </SELECT>
                  </div>
                </div>

                  <div class="row">
                    <div class="col">
                    <label for="name"><span class="input-group-addon">Available Staff</span> </label>
                    
                                        
                    <select class="form-control" id="categoryselect" name="name">
              <?php 
          global $conn;
          $view=mysqli_query($conn, "SELECT * FROM staffreg");
          $result=mysqli_num_rows($view);
          while($result=mysqli_fetch_assoc($view)){
            $id=$result["id"];
            $surname=$result['surname'];
            $firstname=$result['firstname'];
            ;?>
            <option><?php echo $surname; ?>
                        <?php echo $firstname; ?>
                        </option>
          <?php } ?>
          
              </select>
            
                </div>
            </div>
                
                 
            <div class="row">
                <div class="col">
                        
                            <input type="submit" class="btn btn-outline-info col-md-3" name="Submit" value='Assign' style="float:right; margin-top:5px;color:#000;border-color:#000">
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