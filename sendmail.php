<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'fiveroofs', 'fiveroofs', 'fiveroofsdatabase');

//Output any connection error
if ($mysqli->connect_error) {
	die('Error : (' . $mysqli->connect_errno. ')' . $mysqli->connect_error);
}

// using real_escape to prevent sql injections
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$message = mysqli_real_escape_string($mysqli, $_POST['message']);

$email2 = "shreshthbhatt2510@gmail.com";
$subject = "Text message";

if ((strlen($email) > 50) || (strlen($email) < 2)) {
	echo "Invalid email";
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	echo "eformat";
} else {

	// MAILER

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);

	//$mail->SMTPDebug = 3;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'shreshthbhatt2510@gmail.com';
	$mail->Password = 'basketball2510';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->AddReplyTo($email);
	$mail->From = $email2;
	$mail->FromName = $email;
	$mail->addAddress('shreshthbhatt2510@gmail.com', 'Admin');

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBoady = 'This is the body in plain text for non-html clients';

	if (!$mail->send()) {
		echo "Message could not be sent";
		echo "Mailer error" . $mail->ErrorInfo;
	} else {
		echo "Received";
	}

	header("refresh:2; url=index.php");
}
