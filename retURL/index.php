<?php
require("./PHPMailer/class.phpmailer.php");

$do = $_REQUEST['do'];
switch($do) {
	case "process":
	
	$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$campaign = $_POST['utm_campaign'];
	$utm_source = $_POST['utm_source'];

	if($_POST['utm_source'] == ""){ 
		$utm_source = "Online"; 
	} 
	else{ 
		$utm_source = $_POST['utm_source'];
	}
	
	$process = "";
	function smtpmail($subject , $body, $email_cus, $name)
		{
			
			$naamgeadresseerde = "Kidz Village";
			$emailadres = "webmaster@bigfans.io";
			//verstuur nieuwsbrief
			$mail = new PHPMailer();
			$mail->IsSMTP(true);         
			$mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้                        
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->Host     = "mail.bigfans.io"; //  mail server ของเรา
			$mail->Port =465; // พอร์ท
			$mail->Username = "webmaster@bigfans.io"; // account SMTP
			$mail->Password = "nmb=KhPDBETk"; // รหัสผ่าน SMTP
			// Geef aan dat het een HTML mail betreft
			$mail->IsHTML(true);
			$mail->AddReplyTo('webmaster@bigfans.io', 'Kidz Village');
			$mail->SetFrom($emailadres,$naamgeadresseerde);
			
			
			$mail->AddAddress($email_cus, $name);
			/*$mail->AddAddress("pensinee@raimonland.com","Pensinee Detphuttiwat");
			$mail->AddBCC("bleclub_5@live.com","Vanlop Ninkhuha");*/
			
			$mail->IsHTML(true);  
			$mail->Subject = $subject; // Subject aanpassen // ข้อความ ที่จะส่ง(ไม่ต้องแก้ไข)
			$mail->Body = $body;
			$mail->Send(); 
			$process = "Success";
			     
			return $result;
		}
		
		
		function smtpmail_dm($subject , $body, $email_cus, $name)
		{
			
			$naamgeadresseerde = "Administrator - Kidz Village";
			$emailadres = "webmaster@bigfans.io";
			//verstuur nieuwsbrief
			$mail = new PHPMailer();
			$mail->IsSMTP(true);         
			$mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้                        
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->Host     = "mail.bigfans.io"; //  mail server ของเรา
			$mail->Port = 25; // พอร์ท
			$mail->Username = "webmaster@bigfans.io"; // account SMTP
			$mail->Password = "8lYlkG4W@nDp1z"; // รหัสผ่าน SMTP
			// Geef aan dat het een HTML mail betreft
			$mail->IsHTML(true);
			$mail->AddReplyTo("no-reply@kidz-village.ac.th", "No Reply - Kidz-Village");
			$mail->SetFrom($emailadres,$naamgeadresseerde);
			
			
			$mail->AddAddress('info@kidz-village.ac.th', 'Info - Kidz Village');
			// $mail->AddCC('vanlop.n@gmail.com', 'Vanlop Ninkhuha');
			// $mail->AddAddress('rakkhit@blueskyproperty.co.th', 'Rakkhit');
			// $mail->AddCC('nopavut@marketrue-consulting.com', 'Nopavut Yongpatana');
			/*$mail->AddAddress('surangkanang@blueskyproperty.co.th', 'surangkanang');
			$mail->AddCC('beeby88@gmail.com', 'Bee');
			$mail->AddCC('rakkhit.rak@gmail.com', 'Rakkhit');*/
			$mail->AddBCC("vanlop.n@gmail.com","Vanlop Ninkhuha");
			
			$mail->IsHTML(true);  
			$mail->Subject = $subject; // Subject aanpassen // ข้อความ ที่จะส่ง(ไม่ต้องแก้ไข)
			$mail->Body = $body;
			$mail->Send(); 
			$process = "Success";
			     
			return $result;
		}
		
		// $subject = "Thank you for your registration at ".$project_name;
		// $msg = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		// $msg = $msg.'<div align="center"><a href="http://www.blueskyproperty.co.th"><img src="http://www.blueskyproperty.co.th/img/thankyoumail.jpg" /></a></div>';
		
		
		$subject_dm = "Online Register Kidz Village";
		$msg_dm = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$msg_dm = $msg_dm.'Name: '.$fullname.'<br>';
		$msg_dm = $msg_dm.'Email: <a href="mailto:'.$email.'">'.$email.'</a><br>';
		$msg_dm = $msg_dm.'Telephone: '.$phone.'<br>';
		$msg_dm = $msg_dm.'Campaign: '.$campaign.'<br>';
		$msg_dm = $msg_dm.'Source: '.$utm_source.'<br>';
		
		
		// smtpmail($subject, $msg, $email, $fullname);
		smtpmail_dm($subject_dm, $msg_dm, $email, $fullname);

		header("Location: http://kidzlearningcentre.kidz-village.ac.th/thankyou/?ret=success");	

	break;
	case "":
	header("Location: http://www.kidz-village.ac.th/");
	break;
}
?>
