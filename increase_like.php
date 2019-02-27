<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
$blog_id=$_GET['id'];
$increase_like_qry="select * from blogs where id='$blog_id'";
$increase_like_run=mysqli_query($con,$increase_like_qry);
$increase_like_row=mysqli_fetch_array($increase_like_run);
$user_likes="select * from bloggers where id='$increase_like_row[7]'";
$user_likes_run=mysqli_query($con,$user_likes);
$user_likes_row=mysqli_fetch_array($user_likes_run);
$user_likes_new=$user_likes_row[4]+1;
$new_like=$increase_like_row[5]+1;
$new_blogger_like_qry="update bloggers set likes='$user_likes_new' where id='$increase_like_row[7]'";
$new_qry="update blogs set likes='$new_like' where id='$increase_like_row[0]'";
if(mysqli_query($con,$new_qry) && mysqli_query($con,$new_blogger_like_qry))
{
	echo "<script>alert('LIKED!!');
		location.href='home.php';
	</script>";
}

?>
