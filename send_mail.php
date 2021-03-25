<?php 
	if(isset($_POST['email_data'])){
		require 'PHPMail/PHPMailerAutoload.php';
		$output = '';
		foreach($_POST['email_data'] as $row)
		{
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port =587;
			$mail->SMTPAuth = true;
			$mail->Username = 'sacnet2015@gmail.com';
			$mail->Password = 'sackin82';
			$mail->SMTPSecure = 'tls';
			$mail->setFrom('sacnet2015@gmail.com');
			$mail->FromName = 'OAUTranscript';
			$mail->addAddress($row["email"], $row["name"]);
			$mail->wordwrap = 50;
			$mail->IsHTML(true);
			$subject = $row['subject'];
			$mail->Subject = $subject;
			$body = $row['body'];
			$mail->Body = $body;
			$file = "mailfold/" .basename($row['file']);
			$mail->addAttachment($file);
			$mail->AltBody = '';
			 $mail->SMTPOptions=array("ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                    "allow_self_signed"=>false,
                 ));
			$result = $mail->Send();

			if(!$result)
			{
				$output .=html_entity_decode("Not Send");
			}
		}
		if($output == '')
		{
			echo 'ok';
		}
		else{
			echo $output;
		}
	}

?>