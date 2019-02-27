<?php
	$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
	$email=$_SESSION["email"];
	$username=$_SESSION["username"];
	$user_id=$_SESSION["user_id"];
	$blog=$_POST['blog'];
	$subject=$_POST["subject"];
	echo $username;
	echo $blog;
	$short_description=$_POST["short_description"];
	$blog_insert_qry="INSERT INTO `blogs`(username,subject,short_description,blog,user_id) VALUES('$username','$subject','$short_description','$blog','$user_id')";
	if(mysqli_query($con,$blog_insert_qry))
	{
		echo "<script>alert('Blog Inserted Successfully');location.href='index.php';</script>";
	}
?>