<?php

$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");

$username=$_POST['username'];
$email=$_POST['email_id'];
$profile_pic=$_POST['profile_picture'];
$password=$_POST['pass'];

$email_check_qry="select count(*) from bloggers where email='$email'";
$email_check_run=mysqli_query($con,$email_check_qry);
$count=mysqli_fetch_array($email_check_run);
$count=$count[0];
if($count>0)
{
	echo "<script>alert('Email id taken');location='home.php';</script>";
}
else {
	$insert_qry="insert into `bloggers`(username,email,password,photo) values('$username','$email','$password','$profile_pic')";
	$insert_run=mysqli_query($con,$insert_qry);
	session_start();
	$_SESSION["email"]=$email;
	$_SESSION["username"]=$username;
	$fetch_user_id="select * from bloggers where email='$email'";
	$run=mysqli_query($con,$fetch_user_id);
	$row=mysqli_fetch_array($run);
	$_SESSION["user_id"]=$row[5];
	echo "<script>alert('".$_SESSION["user_id"]."');location.href='index.php';</script>";
	
}

?>

