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
	input[type="text"]{
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
	input[type="submit"]{
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
	<center><span style="font-size:125%;">Hello <?php session_start(); echo $_SESSION["username"]; ?></span></center><br>
	<center>Write a Blog</center><br>
	<form action="write_blogg.php" method="POST" >
		<table>
			<tr>
				<td>Enter Subject : </td>
				<td><input type="text" name="subject" required></td>
			</tr>
			<tr>
				<td>Enter Short-Description : </td>
				<td><input type="text" name="short_description" required></td>
			</tr>
			<tr>
				<td>Enter Blog : </td>
				<td><textarea cols="50" rows="6" name="blog"></textarea></td>
			</tr>
		</table><br>
		<center><input type="submit" value="submit"></center>
	</form>
</body>
</html>

