<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	$blogger_id=$_GET['id'];
	$delete_blogs="delete from blogs where user_id='$blogger_id'";
	$delete_blogs_run=mysqli_query($con,$delete_blogs);
	$delete_qry="delete from bloggers where id='$blogger_id'";
	if(mysqli_query($con,$delete_qry))
	{
		echo "<script>alert('Blogger Deleted');location.href='admin.php'</script>";
	}
?>