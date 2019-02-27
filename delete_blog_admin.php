<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	$blog_id=$_GET['id'];
	$blog_info="select * from blogs where id='$blog_id'";
	$blog_info_run=mysqli_query($con,$blog_info);
	$blog_info_row=mysqli_fetch_row($blog_info_run);
	$user_info="select * from bloggers where id='$blog_info_row[7]'";
	$user_info_run=mysqli_query($con,$user_info);
	$user_info_row=mysqli_fetch_row($user_info_run);
	$user_likes=$user_info_row[4];
	$user_likes=$user_likes-$blog_info_row[5];
	$update_qry="update bloggers set likes='$user_likes' where id='$user_info_row[5]'";
	if(mysqli_query($con,$update_qry))
	{
		echo $user_likes;
	}
	$delete_qry="delete from blogs where id='$blog_id'";
	if(mysqli_query($con,$delete_qry))
	{
		echo "<script>alert('Blog Deleted');location.href='admin.php'</script>";
	}
?>