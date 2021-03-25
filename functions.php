<?php
require_once("include/function.php");
//Database Main Object




function upload_image($image){
    
  //create image directory if doesn't exists    
  if(!is_dir(APPROOT.'/images')){
       mkdir(APPROOT.'/images');
  }

  if($image['error']==4){
      die('image file not uploaded');
  }
  
  if($image['type']!='image/png'){
       die('Only, png image files are allowed');
  }
    
  $image_info = pathinfo($image['name']);
  extract($image_info);
  $image_convention = $filename . time() . ".$extension";

  if(move_uploaded_file($image['tmp_name'], APPROOT . "/images/" . $imageConvention)){
      return $image_convention;
  }else{
      return false;
  }  
    
}


//format: 24 September, 2018
function cTime($timestamp){
    return date('j F, Y', $timestamp);
}



//checking user by email
function checkUserByEmail($email){
    
    //make database connection
    global $conn;
    
     //make the statement
     $stmt = $conn->prepare(
            'SELECT * FROM biodata WHERE email=?'
     );
    
     //bind the paramters
     $stmt->bind_param('s', $email);
    
     //execute
     $stmt->execute();
    
     
     //store the result
     $stmt->store_result();
    
     //return number of rows 
     return $stmt->num_rows;
}


//checking user by username
function checkUserByUsername($username){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM staffreg WHERE StaffReg=?'
     );
    
     $stmt->bind_param('s', $username);
    
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkPin($serial){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM regpin WHERE serial_id=? AND status=1'
     );
    
     $stmt->bind_param('s', $serial);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkUserByUsername1($username){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM profile WHERE matricno=?'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkSubjectCode($code){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM subjects WHERE code=?'
     );
    
     $stmt->bind_param('s', $code);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkChapterName($docname){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM content WHERE doctitle=?'
     );
    
     $stmt->bind_param('s', $docname);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkModName($modlist){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM content WHERE modchap=?'
     );
    
     $stmt->bind_param('s', $modlist);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkSubjectAssign($codename){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM subjectassign WHERE subcode=?'
     );
    
     $stmt->bind_param('s', $codename);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkUserByStaffname($username){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM profile WHERE email=?'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkUserByStaffname1($username){
    
    global $conn;
    
   
     $stmt = $conn->prepare(
            'SELECT * FROM staffreg WHERE staffreg=?'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}



//check user activation
function checkUserActivation($username){
    
    global $conn;
    
    //Store them into database
     $stmt = $conn->prepare(
            'SELECT * FROM staffreg WHERE StaffReg=? and status=0'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
function checkUserActivation2($username){
    
    global $conn;
    
    //Store them into database
     $stmt = $conn->prepare(
            'SELECT * FROM studentsdetails WHERE RegNo=?'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}

function checkUserActivation1($username){
    
    global $conn;
    
    //Store them into database
     $stmt = $conn->prepare(
            'SELECT * FROM transcript_applications WHERE RegNo=? AND paystatus'
     );
    
     $stmt->bind_param('s', $username);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}
//redirection reuseable function
function redirect($file){
    header("Location:".URLROOT.'/'.$file); 
}


//setting a msg
function setMsg($name, $value, $class = 'success'){
    if(is_array($value)){
        $_SESSION[$name] = $value;
    }else{
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }

}

//getting a msg
function getMsg($name){
    if(isset($_SESSION[$name])){
        $session=$_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
}


function getUserById($user_id){
    
    global $conn;
    
    //Store them into database
     $stmt = $conn->prepare(
            'SELECT * FROM biodata WHERE id=?'
     );
    
     $stmt->bind_param('i', $user_id);
    
     $stmt->execute();
    
     //get the data
     $result = $stmt->get_result();
    
     return $result->fetch_object();
}



function verifyUserAccount($code){
    
    global $conn;
    
  
     $stmt = $$conn->prepare(
            "UPDATE biodata SET is_active = 1 , reset_code = '' WHERE reset_code = ?"
     );
    
     $stmt->bind_param('s', $code);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->affected_rows;
}



function checkUserByCode($code){
    
    global $conn;
    
    //Store them into database
     $stmt = $conn->prepare(
            'SELECT * FROM biodata WHERE reset_code = ?'
     );
    
     $stmt->bind_param('s', $code);
    
     $stmt->execute();
    
     $stmt->store_result();
    
     return $stmt->num_rows;
}

//If user is logged In
function isUserLoggedIn(){
    if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
        return true;
    }else{
        return false;
    }
}





 //Send the email mail
function send_mail($detail=array()){


    if(!empty($detail['to']) && !empty($detail['message']) && !empty($detail['subject']) && !empty($detail['from'])){
        $mail = new PHPMailer(true); 
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.ifecisrg.org.ng';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@ifecisrg.org.ng';                 // SMTP username
        $mail->Password = '?Tg8YMvwj?+|';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@proteinwriter.com', $detail['from']);
        $mail->addAddress($detail['to'], '');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $detail['subject'];
        $mail->Body    = $detail['message'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
              return false;
            } else {
                return true;
            }

    }else{

        die('Your Mail Handler requires four main paramters');

    }
   


}



