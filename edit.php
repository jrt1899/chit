<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
	$blog_id=$_GET['id'];
	$username=$_SESSION["username"];
	$email=$_SESSION["email"];
	$user_id=$_SESSION["user_id"];
	$blog_info="select * from blogs where id='$blog_id'";
	$blog_info_run=mysqli_query($con,$blog_info);
	$blog_info_row=mysqli_fetch_row($blog_info_run);
	echo"
		<html>
<head>
	<style>
	body{
		background: #4bffff8a;
		font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif; 
		font-size: 110%
	} 
	td{
		padding: 10px;
	} 
	table{
		margin-left: 20%;
	}
	input[type='text']{
		width: 100%;
		border-color: rgb(81,176,144);
		border-radius: 5px;
		padding: 10px;
		font-size: 100%;
	}
	textarea{
		border-color: rgb(81,176,144);
		border-radius: 15px;
		padding: 10px;
		font-size: 100%;
	}
	input[type='submit']{
		width:10%;
		padding:5px;
		background: black;
    color: white;
    cursor: pointer;
	}
	</style>
	<script>
	</script>
</head>
<body>
	<center><span style='font-size:125%;'>$username</span></center><br>
	<center>Edit a Blog</center><br>
	<form action='edit_blogg.php' method='POST' >
		<table>
			<tr>
				<td>Enter Subject : </td>
				<td><input type='text' name='subject' value='$blog_info_row[2]' required></td>
			</tr>
			<tr>
				<td>Enter Short-Description : </td>
				<td><input type='text' name='short_description' value='$blog_info_row[3]' required></td>
			</tr>
			<tr>
				<td>Enter Blog : </td>
				<td><textarea cols='50' rows='6' name='blog' >$blog_info_row[4]</textarea></td>
			</tr>
		</table><br>
		<input type='hidden' name='blog_id_send' value='$blog_id'>
		<center><input type='submit' value='submit'></center>
	</form>
</body>
</html>
	";
?>