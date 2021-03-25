 <?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php confirm();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | Transcript</title>

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
    
           
       
        <h3 style="padding-top:8%; text-shadow: .1rem .1rem .5rem black;">Transcript Applicant Details</h3>
        <div class="heading-underline1"></div>
        <hr>
        <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
  <span id="state"></span>
          
 <table class="table table-striped" style="width:95%; font-size:12px; overflow-x:scroll; margin-right: 1%; margin-top:30px; margin-left:5%;background:#fff;">
          
                        <tr>
                            <th>No</th>
                            <th>App. Ref No.</th>
                            <th>Mat. No.</th>
                            <th>Full Name</th>
                            <th>email</th>
                            
                            <th>Delivery Method</th>
                            
                            
                            <th>Date Applied</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                         $id = $_SESSION['Matricno'];
                    
                                $query=mysqli_query($conn, "SELECT * FROM transcript_applications WHERE RegNo='$id' ORDER BY DateApplied desc");
                                $result=mysqli_num_rows($query);
                    $srno=0;
                    while($result=mysqli_fetch_assoc($query)){
                        $id=$result["Id"];
                        
                        $srno++;
                        ?>

                        <tr>
                            <td><?php 
                                    echo $srno;
                                
                            ?></td>
                            <td><?php echo $result['AppRef']; ?></td>
                            <td><?php echo $result['RegNo']; ?></td>
                            <td><?php echo $result['surname']; ?>
                            <?php echo $result['onames']; ?></td>
                            <td><?php echo $result['AppEmail'];?></td>
                            <td><?php echo $result['formDelivery'];?> <?php echo $result['location'];?></td>
                            <td> <?php echo $result['DateApplied'];?></td></td>
                            
                            <td><?php if ($result['paystatus']=='0') {?>
                                <span class="btn btn-warning btn-sm" style="font-size: 10px">Pending</span>
                            <?php  } if ($result['paystatus']=='1') {?>
                                <span class="btn btn-success btn-sm " style="font-size: 10px">Payment Received</span>
                          
                            <?php } ?></td>
                        
                            
                            <td> <a onclick = "return confirm('Click Ok to view Details?')" href="applicationdetails.php?dell=<?php echo $result['AppRef']; ?>"><span>Details</span> </a> |
                                <a onclick = "return confirm('Are you sure want to Edit?')" href="editprofile.php?dell=<?php echo $result['AppRef']; ?>"><span>Edit</span> </a>
                                |
                                <?php if ($result['paystatus']=='0') {?>
                                <a  href="ala_trspay_init.php?dell=<?php echo $result['RegNo']; ?>" style="color:red"><span>Pay</span> </a>
                            <?php  } if ($result['paystatus']=='1') {?>

                          
                            <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>        
                    </table>
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
    
        
</body>

</html>