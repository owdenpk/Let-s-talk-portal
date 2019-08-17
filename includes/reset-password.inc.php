<?php

if(isset($_POST['reset-password-submit'])){
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$pwd = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$m = 0;

	// echo $selector;
	// echo $validator;
	// echo $pwd;
	// echo $passwordRepeat;

	if(empty($pwd) || empty($passwordRepeat)){
		header("location: ../create-new-password.php?newpwd=empty");
		exit();
}elseif ($pwd != $passwordRepeat) {
	header("location: ../create-new-password.php?newpwdsame");
	exit();
}else{

}

$currentDate = date("u");

require '../connect.php';

$sql = "SELECT * FROM pwdreset WHERE pwdResetSelector='$selector' AND pwdResetExpires >= '$currentDate'";

		

		$result = mysqli_query($db,$sql); 
		if(!$row = mysqli_fetch_assoc($result)){
			echo "You need to re-submit your reset request.";
			exit();
		}else{
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

			if($tokenCheck == false){
				echo "You need to re-submit your reset request";
				exit();
			}elseif ($tokenCheck === true) {
				$tokenEmail = $row['pwdResetEmail'];
$userEmail = $row['pwdResetEmail'];
				$sql = "SELECT * FROM user WHERE email = '$tokenEmail' ";
		
	   	
	   	$result = mysqli_query($db,$sql);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "Email you entered doesn't match our records";
			exit();
		}else{
			$newPwsHash = sha1($pwd);
			$sql = "UPDATE user SET password='$newPwsHash' WHERE
			email = '$tokenEmail'";
	
		if(mysqli_query($db,$sql)){
$m+=1;
$k = "done update";
		}
		$sql = "DELETE FROM pwdreset WHERE pwdResetEmail='$userEmail'";
	 
		if(mysqli_query($db,$sql)){
			$m+=1;
			$k = "done delete";
		
	}
	if($m==2){
		// header("location: ../index.php?newpwd=passwordupdated");
		echo "<script type=\"text/javascript\">window.alert('Your Password has been Reset.');
		window.location.href = '../index.php';</script>"; 
exit;
	}
	else{
		echo  $k;
	}
}
			
		}
	}

}else{
	header("location: ../index.php");
}

?>