<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require'vendor/autoload.php';
require 'mailpass.inc.php';

$mysql_hostname  =  "localhost"; // host name
$mysql_user  =  "root"; // username
$mysql_password  =  ""; // password
$mysql_database  =  "web_assignment"; //database name
$db  =  mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);
if($db){
}else{
	echo mysqli_error($db);
}

if(isset($_POST['reset-request-submit'])){
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);
	$url = "create-new-password.php?selector=" .$selector. "&validator=" .bin2hex($token);
	$expires = date("u") + 1800;
	require '../connect.php';
	$userEmail = $_POST["email"];
	$sql = "DELETE FROM pwdreset WHERE pwdResetEmail='$userEmail'";
	$stmt = mysqli_query($db,$sql);
	if(!$stmt){
		echo "Oops! This service is currently not available please try sometime later...";
		exit();
	}else{
	
	}
	$hashedToken = password_hash($token, PASSWORD_DEFAULT);
	$sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES ('$userEmail','$selector','$hashedToken','$expires')";
	$stmt = mysqli_query($db,$sql);
	if(!$stmt){
		echo "There was an error in inserting";
		exit();
	}else{
		
	}
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP(); 
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = Email;
    $mail->Password   = PASS;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->setFrom(Email, "Let's Talk");
    $mail->addAddress($userEmail);
    $mail->addReplyTo(Email, 'Information');
    $mail->isHTML(true);
    $mail->Subject = 'Reset Your Password';
   $mail->Body    = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore the email.</p><br>
        <p>Here is your password reset link: <br>
        <a href = "' .$url.'"> '.$url.'</a></p><img alt="PHPMailer" src="cid:my-attach">';
    $mail->AddEmbeddedImage('../images/part1.jpg', 'my-attach', '../images/part1.jpg');
    $mail->send();
header("Location: ../reset-password.php?reset=success");
 }
 catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}

