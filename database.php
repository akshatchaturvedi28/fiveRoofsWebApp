<?php

session_start();

$con = mysqli_connect('localhost','fiveroofs','fiveroofs');  // setting a connection (host, username, password)

if (!$con)
{
	echo "Not Connected to server";
}

if (!mysqli_select_db($con, 'fiveroofsdatabase'))
{
	echo "database not selected";
}


$name = $_POST['name'];
$email_id = $_POST['email_id'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "insert into clients(name, email_id, subject, message) values ('$name', '$email_id', '$subject', '$message')";

if(!mysqli_query($con, $sql)){

	echo "Message not sent";
}
else
{
	echo "Message sent";
}

header("refresh:2; url=contact-us.php");

?>