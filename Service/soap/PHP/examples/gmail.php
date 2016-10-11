<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

$email = $_REQUEST["email"];
$name = $_REQUEST["name"];
$msg = $_REQUEST["msg"];
/*
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "krishsrikanth2@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "localhost123";

//Set who the message is to be sent from
$mail->setFrom('krishsrikanth2@gmail.com', 'Srikanth Krishnamurthy');

//Set an alternative reply-to address
$mail->addReplyTo('krishsrikanth2@gmail.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($email, $name);

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = $msg;

//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
*/

    $mail = new PHPMailer();
    $mail->SMTPSecure = 'tls';
    $mail->Username = "srikanth90.krish@hotmail.com";
    $mail->Password = "chicku0890";
    $mail->AddAddress("srikanth90.krish@gmail.com");
    $mail->FromName = "My Name";
    $mail->Subject = "My Subject";
    $mail->Body = "My Body";
    $mail->Host = "smtp.live.com";
    $mail->Port = 587;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->From = $mail->Username;
    $mail->Send();
	
	echo $mail->ErrorInfo;
	/*
//send the message, check for errors
if (!$mail->send()) {
    echo "Fail" . $mail->ErrorInfo;
    echo "Fail";
} else {
    echo "success";
}
*/