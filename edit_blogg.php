<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
$blog_id=$_POST['blog_id_send'];
$subject=$_POST['subject'];
$short_description=$_POST['short_description'];
$blog=$_POST['blog'];
$update_qry1="update blogs set subject='$subject' where id='$blog_id'";
$update_qry2="update blogs set short_description='$short_description' where id='$blog_id'";
$update_qry3="update blogs set blog='$blog' where id='$blog_id'";
if(mysqli_query($con,$update_qry2) && mysqli_query($con,$update_qry1) && mysqli_query($con,$update_qry3))
{
	echo "<script>location.href='index.php'</script>";
}