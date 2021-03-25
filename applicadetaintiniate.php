<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php konfiirm();?>
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
     <h5 style="color:#fff; font-size: 15px;margin-left: 8%">Welcome, <?php echo $_SESSION["surname"];?> <?php echo $_SESSION["firstname"];?></h5>
     <div style="width:96%; height:50px; background-color: #fff; margin-left: 8%">
           
            <?php 
                $queryapproved=mysqli_query($conn, "SELECT COUNT(*) FROM transcript_applications WHERE paystatus='0'");
                $result=mysqli_fetch_assoc($queryapproved);
                $total=array_shift($result);
                if ($total>0){

                ?>

                <span class="label pull-right label-success" style="margin-left: 30%">Total: <?php echo $total; ?></span>
                <?php } ?>

         </div>

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
             <li><a href="mailsender.php">Mail</a></li>
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
    
           
       
        <h3 style="padding-top:8%; text-shadow: .1rem .1rem .5rem black;">All TRANSCRIPT APPLICATIONS</h3>
        <div style="width:35%;float:right">
                    <form action="" class="navbar-form navbar-right" style="margin-right: 10px">
                            <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search the table">
                            <div class="input-group-append">
                            
                             </div> &nbsp;
                             <button class="btn btn-primary btn-sm" name="searchbutton" style="float: right">Search</button>
                            </div>
                            
                        </form>
                    </div>
        <div class="heading-underline1"></div>
        <hr>
        <?php echo Message(); 
        echo SuccessMessage(); 
    ?>
          <div class="table-responsive">
           
                    <table class="table table-striped table-bordered" style="width:98%; font-size:12px; overflow-x:auto; margin-right: 10%; margin-top:30px; margin-left:3%;background:#fff;">
          
                        <tr>
                            <th>No</th>
                            <th>App. Ref No.</th>
                            <th>Mat. No.</th>
                            <th>Full Name</th>
                            <th>email</th>
                            
                            <th>Delivery Method</th>
                            
                            <th>Location</th>
                            <th>Recipient Ref. No</th>
                            <th>Recipient Full Details</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                         if (isset($_GET['searchbutton'])){
                                $search = $_GET['search'];
                                $query = mysqli_query($conn, "SELECT * FROM transcript_applications WHERE RegNo LIKE '%$search%' OR surname LIKE '%$search%' OR onames LIKE '%$search%' OR AppRef LIKE '%$search%' OR RecRef LIKE '%$search%' OR formDelivery LIKE '%$search%' OR location LIKE '%$search%' OR DateApplied LIKE '%$search%'");
                              }
                              else{
                                $query=mysqli_query($conn, "SELECT * FROM transcript_applications ORDER BY DateApplied desc");}
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
                            <td><?php echo $result['formDelivery'];?></td>
                            <td><?php echo $result['location'];?></td>
                            <td><?php echo $result['RecRef'];?></td>
                            <td><?php echo $result['ReceiverName'];?>
                            <?php echo $result['ReceiverAddress'];?></td>
                            <td><?php echo $result['DateApplied'];?></a></td>
                            <td><?php if ($result['appStatus']=='0') {?>
                                <span class="btn btn-warning btn-sm" style="font-size: 10px">Pending</span>
                            <?php  } if ($result['appStatus']=='1') {?>
                                <span class="btn btn-success btn-sm " style="font-size: 10px">Under Processing</span>
                          
                            <?php } ?></td>
                            
                            <td> <a onclick = "return confirm('Click Ok to view Details?')" href="applicdetails.php?dell=<?php echo $result['AppRef']; ?>"><span>Details</span> </a>
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