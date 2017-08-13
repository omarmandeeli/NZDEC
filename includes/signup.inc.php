<?php

if (isset($_POST['submit'])) {
	
include_once 'dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']) ;
$last = mysqli_real_escape_string($conn, $_POST['last']) ;
$address = mysqli_real_escape_string($conn, $_POST['address']) ;
$contact = mysqli_real_escape_string($conn, $_POST['contact']) ;
$email = mysqli_real_escape_string($conn, $_POST['email']) ;
$uid = mysqli_real_escape_string($conn, $_POST['uid']) ;
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']) ;


//for empty fields
	if (empty($first) || empty($last) || empty($address) || empty($contact) || empty($email) || empty($uid) || empty($pwd)){

		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//checks inputs are valid
		if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last)) {
			
			header("Location: ../signup.php?signup=invallid");
				exit();
		} else {
			//checks input are valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=invallidemail");
				exit();
			} else {
				$sql = "SELECT * FROM customer_table WHERE cus_user = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);
				if ($resultcheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} 

				else {

					//password
					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
					$vcode = rand();

					//inserts the user into the database
					$sql = "INSERT INTO customer_table (cus_fname, cus_lname, cus_address, cus_contact, cus_email, cus_user, cus_pass, verification_status, verification_code) VALUES ('$first', '$last', '$address', '$contact', '$email', '$uid', '$hashedpwd', '0','$vcode');";
					$message = " 
					Confirm your Email, Cunt 
					Click the link below, faggot.
					http://localhost:8080/NZDEC/emailconfirmed.php?username=$uid&code=$vcode
					";
					mail($email, "Confirm Email, dude", $message, "From: Donotreply@gmail.com");
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}


} else{
	header("Location: ../signup.php");
	exit();
}