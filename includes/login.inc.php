<?php

session_start();

if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//error
	//check if empty
	if (empty ($uid) || empty($pwd)) {
		header("Location:../login.php?login=empty");
	exit();
	} else{
		$sql = "SELECT * FROM customer_table WHERE cus_user = '$uid' OR cus_email='$uid'" ;
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);

		if ($resultcheck<1) {
			header("Location:../login.php?login=usererror");
	exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//dehash pw
				$hashedpwdcheck = password_verify($pwd, $row['cus_pass']);
				if ($hashedpwdcheck == false) {
				header("Location:../login.php?login=perror");
				exit();
				} elseif ($hashedpwdcheck == true){
					//Log in the user here
					$_SESSION['u_id']  = $row['cusact_id'];
					$_SESSION['u_first']  = $row['cus_fname'];
					$_SESSION['u_last']  = $row['cus_lname'];
					$_SESSION['u_address']  = $row['cus_address'];
					$_SESSION['u_contact']  = $row['cus_contact'];
					$_SESSION['u_email']  = $row['cus_email'];
					$_SESSION['u_uid']  = $row['cus_user'];
					header("Location:../index.php?login=success");
					exit();
				}
			}
		}
	}

} else{
	header("Location:../index.php?login=error");
	exit();
}