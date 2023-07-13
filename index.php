<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST['submit']))
{
	$to      = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	try {
		    //Server settings
		    $mail->SMTPDebug = FALSE;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'creart.alkesh@gmail.com';                     //SMTP username
		    $mail->Password   = 'rqddkeekysjeqxeg';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom('creart.alkesh@gmail.com', 'PHP Summer Internship');
		    $mail->addAddress($to, '');     //Add a recipient
		               
		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    

		    $mail->send();
		    echo "<script>alert('You Message is been sent successfully');</script>";
		} 
		catch (Exception $e) 
		{
    		echo "<script>alert('Something went wrong..');</script>";
		}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Email-Sender</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1 align="center">Email Sender Web App</h1>
	</div>
	<div class="content">
		<br/><br/><br/>
		<form method="post">
		<table  align="center" cellpadding="10" cellspacing="0">
			<tr>
				<td>To</td>
				<td><input type="text" name="to"></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td><input type="text" name="subject"></td>
			</tr>
			<tr>
				<td>Message</td>
				<td>
					<textarea name="message">
						
					</textarea>
				</td>
			</tr>
			<tr>
				
				<td colspan="2" align="center"><input type="submit" name="submit" value="Send"></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="footer">
		<h1 align="center">@copyright</h1>
	</div>
</body>
</html>