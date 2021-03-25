<?php  require_once("includes/function.php");?>
<?php require_once("lib/sessions.php");?>
<?php require_once("includes/funct.php");?>
<?php require_once("functions.php");?>
<?php
if (isset($_POST['Submit'])){


    
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
   $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    if (empty($username) || empty($password)){
        $_SESSION["ErrorMessage"]= "All Fields must be filled out";
        Redirect_to("logintrans.php");
    }
    elseif(!checkUserByUsername1($username)){
    $_SESSION["ErrorMessage"]= "Wrong Matric No., try again";
    Redirect_to("logintrans.php");
    } 
    else{   
     
        $accfou=login_att($username, $password);
        $_SESSION["User_id"]=$accfou["id"];
        
       
        
        $_SESSION["Username"]=$accfou["username"];
        $_SESSION["surname"]=$accfou["surnam"];
        $_SESSION["firstname"]=$accfou["onames"];
         $_SESSION["Matricno"]=$accfou["matricno"];
        $_SESSION["PhoneNo"]=$accfou["phoneno"];
        $_SESSION["email"]=$accfou["email"];
        
        
        

        if ($accfou){
            
               $_SESSION["User_id"];
               Redirect_to("appfilesucse.php");
            
        }
        else{
            $_SESSION["ErrorMessage"]= "Wrong Matric No, try again";
            Redirect_to("logintrans.php");
        }
        

  
}
}
?>
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
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ddsmoothmenu.css">
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
                        <div class="row">
                        <div class="col-sm-9">
                            <h2 style="padding-top:6%; padding-left:2%;margin-top: 10%;  padding-right:4%; font-size: 20px; text-align: center; color:rgb(190, 143, 14); text-shadow:.1rem .1rem .2rem black">TRANSCRIPT APPLICATION</h2>  
                       
        </div>
        <div class="col-sm-3"  style="margin-top: 4%; background-color: #fff">
             <div class="card" style="width: 100%; height:auto;  background:#fff; opacity: 0.8; margin-left:0%; padding-left:30px;  padding-right:30px;
                                margin-top: 25%; margin-bottom: 15%;  padding-bottom:5%;  border-radius: 10px 10px 10px 10px;">
                            <h2 style="padding-top:6%; padding-left:2%;  padding-right:4%; font-size: 20px; text-align: center; color:rgb(190, 143, 14); text-shadow:.1rem .1rem .2rem black">LOGIN</h2>   
                <form action="" method="post">

                    <br>
              <div>
                        <?php echo Message(); 
                                echo SuccessMessage(); 
                        ?>
</div><br>
                  <div class="form-group">
                    <label for="name"><span class="input-group-addon"><i class="fa fa-user"></i></span>Matric. No</label>
                    
                                        
                    <input type="text" name="username" id="name" class="form-control py-2">
            
                </div>
        
                                  <div class="form-group">
                    <label for="name"><span class="input-group-addon"><i class="fa fa-lock"></i></span> Password</label>
                    <input type="password" name="password" id="name" class="form-control py-2">
                  </div>
            
                        <div>
                            <input type="submit" name="Submit" class="btn btn-outline-info col-md-3" value='Login' style="float:right; margin-top:5px;">
                        </div>
                <p>You have not Applied? <a href="/trans" style="text-decoration: none; color:#blue">Click to Apply</a></p>
                </div>    
            </form>  
            </div>
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
</body>
</html>