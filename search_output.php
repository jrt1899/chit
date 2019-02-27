<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
$input11=$_POST["search_input"];
$blog_qry="select * from blogs where username='$input11' or subject='$input11'";
$blog_run=mysqli_query($con,$blog_qry);
while($blog_row=mysqli_fetch_array($blog_run))
{
	
	if($blog_row[2]==$input11)
	{
		$get_user="select * from bloggers where id='$blog_row[7]'";
		$get_user_run=mysqli_query($con,$get_user);
		$get_user_row=mysqli_fetch_array($get_user_run);
		echo "<center>
		<div><img src='$get_user_row[3]' height='250px' width='200px'></div>
		<div><br>$blog_row[1]<br></div>
		<div>$get_user_row[4] Likes<br><br></div>
		<div>$blog_row[2]<br></div>
		<div>$blog_row[3]<br></div>
		<div>$blog_row[4]</div>
		</div></center>";
	}
	else
	{
		$get_user1="select * from bloggers where id='$blog_row[7]'";
		$get_user1_run=mysqli_query($con,$get_user1);
		while($get_user1_row=mysqli_fetch_array($get_user1_run)){
		echo "<center><div><img src='$get_user1_row[3]' height='250px' with='200px'></div>
		<div>$get_user1_row[0]<br></div>
		<div>$get_user1_row[1]<br></div>
		<div>$get_user1_row[4] Likes<br><br></div>
		<center>";}
	}
}
?>