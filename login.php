<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
$email=$_POST["name_email"];
$password=$_POST["password"];

if($email=='jrt@1899.com' && $password=='12345')
{
	echo "<script>location.href='admin.php'</script>";
}

$find_user_qry="select * from bloggers where email='$email'";
$find_user_run=mysqli_query($con,$find_user_qry);
if(mysqli_num_rows($find_user_run)==0)
{
	echo "<script>alert('user not found'); location='home.php'; </script>";
}
else
{
	$find_user_row=mysqli_fetch_array($find_user_run);
	$email=$find_user_row['email'];
	$username=$find_user_row['username'];
	$user_id=$find_user_row['id'];
	session_start();
	$_SESSION["email"]=$email;
	$_SESSION["username"]=$username;
	$_SESSION["user_id"]=$user_id;
	echo "<script>location.href='index.php'</script>";
}


?>