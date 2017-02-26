<?php
if ($_POST['submit'] == "Cancel") {
	//header( "location: index.php");
	return;
}
if(isset($_GET["email_send"])) {
	$email = $_POST['email'];
	$body = $_POST['content'];
	$admin_email = "bogdan@imb-plus.tv";
	//$admin_email = "urabo@litech.net";
	//$admin_email = "urabo@hotmail.com";
	//$admin_email = "urabod@gmail.com";
	//$admin_email = "info@hyalual.ca";
	//$admin_email = "info@hyalual-ca.mail.protection.outlook.com";
	$subject = "Email to Hyalua deLux";
	
	/*
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    try {
        $mail->Host = 192.168.205.19;
        $mail->Port = 25;
        $mail->SMTPDebug  = 2;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "mymailadress@mysite.com";
        $mail->Password = "mypassword";

        $mail->From = "mymailaddress@mysite.com";
        $mail->FromName = "My Mail Address";
        $mail->SetFrom("mymailaddress@mysite.cm", "My Mail Address");

        $mail->AddAddress('toaddress@mysite.com');

        $mail->Subject = "Test for subject";
        $mail->MsgHTML("Test my mail body");

        if ($mail->Send()) {
            $result = 1;
        } else {
            $result = "Error: " . $mail->ErrorInfo;
        }
    } catch (phpmailerException $e) {
        $result = $e->errorMessage();
    } catch (Exception $e) {
        $result = $e->getMessage();
    }

    return $result;	
	*/
	
/*
echo "<br/>~~~1~~~";
require_once('PHPMailer-FE_v4.1/_lib/class.phpmailer.php');
$mail = new PHPMailer(true);
print_r($mail);

//exit;
//echo json_encode(array("result" => print_r($mail)));

$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "outlook.office365.com";
//$mail->Host = "pod51014.outlook.com";
$mail->Port = 587;
$mail->Username = "info@hyalual.ca";
$mail->Password = "hyalual7&";
$mail->Subject = $subject;
$mail->Body = "Body xxx";
$mail->SingleTo = $admin_email;
//$mail->to = array($admin_email);
//$mail->address = $admin_email;
/* ... addaddres, reply, subject, message -> the usual stuff you need ... /
echo "<br/>~~~2~~~";
if($mail->Send())
	echo "<br/>OK";
else
	echo "<br/>Error";
//$mail->Send();
echo "<br/>~~~3~~~";
return;
*/
	/*
	$headers = "From: $email\r\n"; 
	$headers .= "Reply-to: urabo@litech.net\r\n";
	$headers .= "Errors-to: urabo@litech.net\r\n"; 
	$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 
	*/
	
$headers = 'From: '.$email."\r\n".'X-Mailer: PHP/'.phpversion()."\r\n";
$headers .= 'Cc: urabo@hotmail.com'."\r\n";
$headers .= 'Bcc: urabo@litech.net'."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	//if(mail('$email','Your Request for your password renewal','This is in response to your request to change your password. Please click on the link below to reset the password for your account on ProEdgeWire.com\n\n'.site_url().'?cod=$encrptID&doc=$encrptEmail\n(If the link doesn\'t work, please copy and paste it into your browser.)\n\nIf you require further assistance, please email us at: admin@proedgemedia.com\n\nThis is an automated message. You cannot reply directly to this e-mail.','From: admin@proedgewire.com','-f admin@proedgewire.com'))
	
	//SendMail("Hyal", $admin_email, "Client", $email, $subject, $body, $headers);
	
	if(mail($admin_email,$subject,$body,$headers))
		echo json_encode(array("result" => "success"));
	else
		echo json_encode(array("result" => "There is some system problem in sending your message.<br/>Please phone to us +1(416)729-7370"));
		
		/*
		require_once ABSPATH.WPINC.'/class-phpmailer.php';
		require_once ABSPATH.WPINC.'/class-smtp.php';
		$phpmailer = new PHPMailer();
		$phpmailer->SMTPAuth = true;
		$phpmailer->Username = $admin_email;
		//$phpmailer->Password = 'proedge2011';
		$phpmailer->Password = 'PEM2013';
		 
		$phpmailer->IsSMTP(); // telling the class to use SMTP
		$phpmailer->Host       = "smtpout.secureserver.net"; // SMTP server
		$phpmailer->From   	   = $admin_email;
		$phpmailer->FromName   = "ProEdgeWire Admin";
		$phpmailer->Subject    = "Your Request for your password renewal.";
		$phpmailer->Body       = $body;
		$phpmailer->AltBody    = $body;
		$phpmailer->WordWrap   = 50; // set word wrap
		$phpmailer->MsgHTML($body);
		$phpmailer->AddAddress($email,'');
		//$phpmailer->AddAddress($email, 'ProEdgeWire Administrator');
		//$phpmailer->AddAttachment("images/phpmailer.gif");             // attachment
		if(!$phpmailer->Send())
			echo json_encode(array("result" => "There is some system problem in sending login details to your address.<br/>Please contact site-admin.<br/>".$phpmailer->ErrorInfo));
		*/
		//if(mail("$email","Your Request for your password renewal","This is in response to your request to change your password. Please click on the link below to reset the password for your account on ProEdgeWire.com\n\n".site_url()."?cod=$encrptID&doc=$encrptEmail\n(If the link doesn't work, please copy and paste it into your browser.)\n\nIf you require further assistance, please email us at: admin@proedgewire.com\n\nThis is an automated message. You cannot reply directly to this e-mail.","$headers"))
	return;
}

function SendMail($ToName, $ToEmail, $FromName, $FromEmail, $Subject, $Body, $Header)
{
	$SMTP = fsockopen("smtpout.secureserver.net", 25);

	$InputBuffer = fgets($SMTP, 1024);

	fputs($SMTP, "HELO sitename.com\n");
	$InputBuffer = fgets($SMTP, 1024);
	fputs($SMTP, "MAIL From: $FromEmail\n");
	$InputBuffer = fgets($SMTP, 1024);
	fputs($SMTP, "RCPT To: $ToEmail\n");
	$InputBuffer = fgets($SMTP, 1024);
	fputs($SMTP, "DATA\n");
	$InputBuffer = fgets($SMTP, 1024);
	fputs($SMTP, "$Header");
	fputs($SMTP, "From: $FromName <$FromEmail>\n");
	fputs($SMTP, "To: $ToName <$ToEmail>\n");
	fputs($SMTP, "Subject: $Subject\n\n");
	fputs($SMTP, "$Body\r\n.\r\n");
	fputs($SMTP, "QUIT\n");
	$InputBuffer = fgets($SMTP, 1024);

	fclose($SMTP);
	
	return true;
} 
?>
