
<?php 
    
    require_once("includes/function.php");
    require_once("lib/sessions.php");
    require_once("includes/funct.php");
    require_once "lib/PHPMailer-master/PHPMailerAutoload.php";
    require_once("functions.php")

    
?>
<?php 

    $name = $_POST['name'];
    $role = $_POST['role'];
    $parts  = explode(' ', $name);
    $firstname = $parts[1];
    $surname = $parts[0];
    $currenttime = time();
  $datetime=date("Y-m-d");
  $admin=$_SESSION["Username"];
  
    global $conn;
    $editFrom=$_GET['edit'];
    $query =mysqli_query($conn, "UPDATE staffreg SET regdate='$datetime', role='$role' WHERE surname='$surname' AND firstname = '$firstname'");
    if ($query){
    $_SESSION["SuccessMessage"]= "Updated successfully";
    Redirect_to("staappfile.php");
    }
    else{
    $_SESSION["ErrorMessage"]= "Update fails to submit, try again";
    Redirect_to("staappfile.php");
    }
  
?>