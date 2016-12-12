<?php
include 'dbh.php';


if(isset($_POST['register']))
{
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$email = $_POST['email'];
	$countUsersThatExistWithEmail = "SELECT * FROM verified_users where email = '$email'"; //Counts number of users in the space
	$countUsersWithEmail= mysqli_query($conn, $countUsersThatExistWithEmail); //execute query to count them
	$num_rows = mysqli_num_rows($countUsersWithEmail); //return count
	if ($num_rows == 0){
		$pwd = $_POST['create_password'];
		$pwdDB = md5($_POST['create_password']);
		$phone = $_POST['phone'];
		$code=substr(md5(mt_rand()),0,15);
		$sql = "INSERT INTO unverified_users (first, last, email, pwd, code, phone) VALUES ('$first', '$last', '$email', '$pwdDB', '$code', '$phone')";
		$result = mysqli_query($conn, $sql);
		$getUser = "SELECT * FROM unverified_users WHERE email='$email'";
		$queryUser = mysqli_query($conn, $getUser);
		$usersId = mysqli_fetch_array($queryUser);

		$subject = 'Signup | Verification'; // Give the email a subject
		$message = '

		Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

		------------------------
		Username: '.$email.'
		Password: '.$pwd.'
		------------------------

		Please click this link to activate your account:
		sharedspaceapp.me/SharedSpaceWebContent/verification.php?id='.$usersId['id'].'&code='.$code.'

		'; // Our message above including the link

		$headers = 'From:noreply@sharedspaceapp.me'."\r\n"; // Set from headers
		$mailsend=mail($email, $subject, $message, $headers); // Send our email
		header("Location: signinpage.php?message=An activation code was sent to the following email address: ".$email."."." Please check your spam folder.");
	}
	else{
		header("Location: signuppage.php?emailExists=That email already exists.");
	}
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$identify=$_GET['id'];
	$uniqueCode=$_GET['code'];
	$select="SELECT * FROM unverified_users WHERE id='$identify' AND code='$uniqueCode'";
	$verif=mysqli_query($conn, $select);
	$row=mysqli_fetch_array($verif);
	$first = $row['first'];
	$last = $row['last'];
	$email=$row['email'];
	$password=$row['pwd'];
	$phone=$row['phone'];
	$insert_user="INSERT INTO verified_users (id, first, last, email, pwd, phone) VALUES ('$identity', '$first', '$last', '$email', '$password', '$phone')";
	$into_verified = mysqli_query($conn, $insert_user);
	$delete_from_unverified = "DELETE FROM unverified_users WHERE id='$identify' AND code='$uniqueCode'";
	$delete=mysqli_query($conn, $delete_from_unverified);
	header("Location: signinpage.php");
}
?>






