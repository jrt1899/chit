<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
	$username=$_SESSION["username"];
	$email=$_SESSION["email"];
	$user_id=$_SESSION["user_id"];
	session_destroy();
	echo "<script>location.href='home.php'</script>"
?>