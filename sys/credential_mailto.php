<?php
	require 'credential.php';
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$email = "shahrul941013@gmail.com";
	$link = "https://www.supercryptofinance.com/k8/login.php";
	
	$mail = new PHPMailer;

	//$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                     // Enable SMTP authentication
	$mail->Username = EMAIL;          // SMTP username
	$mail->Password = PASS; // SMTP password
	$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; 
	
	//send email
				$mail->setFrom(EMAIL);
				$mail->addAddress($email);   // Add a recipient

				$mail->isHTML(true);  // Set email format to HTML

				$bodyContent = '<h1>Please verify your Email</h1>';
				$bodyContent .= '<p>By clicking in this link:</p>
								<p><b>Your Email</b> : '.$email.'</p>
								<p><b>Link</b> :'.$link.'</p>
								<p></p>
								<p>Anda boleh mengubah kata laluan selepas mengakses sistem ini.</p>';

				$mail->Subject = '';
				$mail->Body    = $bodyContent;

				if(!$mail->send()) {
					//echo"<script>alert('Pendaftaran Sub-Admin Tidak Berjaya');document.location.href='../senarai_sa.php?jabatan=$jabatan';</script>";
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} 
				else { 
				echo 'Message has been sent';
				}
				
	
?>