<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
	$username=$_SESSION["username"];
	$email=$_SESSION["email"];
	$user_id=$_SESSION["user_id"];
	$user_info="select * from bloggers where id='$user_id'";
	$user_info_run=mysqli_query($con,$user_info);
	$user_info_row=mysqli_fetch_row($user_info_run);
?>
<html>
	<head>
	<script>
			function write_blog(){
				location.href='write_blog.php';
			}
			function sign_out(){
				location.href='sign_out.php';
			}
			function read_more_div_disappear(){
		document.getElementById("read_more_id").style.display="none";
		document.getElementById("main_class").style.opacity="1";
	}
		function edit(x)
		{
			var y="edit.php?id="+x;
			location.href=y;
		}
		function delete1(x)
		{
			var y="delete_blog_user.php?id="+x;
			location.href=y;
		}
	
	</script>

	<style>
		body{
		font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif; 
	}

	.main_class{
		opacity=1;
	}

	.class1 {
		position:absolute; 
		top:2.5%;
		right:5%;
		left:5%;
		width: 90%;
		height: 15%;
	}
	
	.class2 {
		float:right;
		margin-top:2%;
		border-style:solid;
		border-width:1px;
		border-color:rgb(81,176,144);
		color:rgb(81,176,144);
		border-radius:3px;
		padding:10px;
		margin-left:3%;
		cursor:pointer;
	}
	
	.search {
		float:right;
		margin-top:2%;
		margin-left: 3%;
		 width:3.5%;
		 height:80%;
		transition: width 250ms;
		display:inline-block;
		cursor:pointer;
	}
	.search_input{
		display:none;
		width:0%;
		 border: 0px solid;
		 transition: width 400ms;
		 padding:15px;	
	}

	.information{
		position:absolute;
		top:25%;
		left:7%;
		width:20%;
		/*border:1px solid black;
*/
	}

	.blogs{
		position:absolute;
		top:25%;
		left:30%;
		width:75%;/*
		border:1px solid black;*/
	}

	.read_more_div{
		position:absolute;
		top:15%;
		left:15%;
		width:75%;
		display:none;
		color:black;
		background:#5ffff0;
	}

	input[type=submit]{
		width: 30%;
		height: 10%;
		background: black;
		color: white;
	}

	input[type=submit].hidden_submit{
		background:transparent;
		/*border:1px solid black;*/
		color:rgb(81,176,144);
		padding:0px;
		width:80px;
		height:25px;
		margin-top:5px;
	}

	</style>
	</head>

	<body>
<div class='main_class' id='main_class'>
	<div class='class1' id='class1'>
		<span><img src='CHiT.png' align='middle'></span>
		<span class='class2' onclick='sign_out()'>sign out</span>
		<span style='float:right;margin-top:2.8%;margin-left:3%;color:rgb(81,176,144);cursor: pointer;'  id='class2'><?php echo $username; ?></span>
		<div class='search' id='search'>
			<div style='display:inline' onclick='write_blog()'><img src='pencil.jpg' onclick='' align='middle' height='40px' width='40px'></div>
		</div>
		<div style='float:right;margin-top:2.8%;margin-left:3%;color:rgb(81,176,144);cursor: pointer;'><a href='explore_index.php' style='color:rgb(81,176,144);'>EXPLORE</a></div>
		<div style="width:100%;height:0px;border:1px solid rgb(81,176,144);margin-top:35px;"></div>
	</div>
	<div class="information">
			<?php echo"<div>
				<img src='$user_info_row[3]' height='250' width='225' style='margin-left:15px;'>
			</div>
			<center>
			<div style='font-size:150%'> $user_info_row[0]</div>
			<div> Likes : $user_info_row[4]</div>
			</center>
			" ;?>
	</div>
	<div class="blogs">
		<div style="font-size: 150%;float:left;margin-left: 35px;margin-top:25px;">YOuR CHiTs</div><br><br>
			<?php
			$fetch_blogs_qry="select * from `blogs` where user_id='$user_id' order by id desc";
			$fetch_blogs_run=mysqli_query($con,$fetch_blogs_qry);
			if(mysqli_num_rows($fetch_blogs_run)==0)
			{
				echo "NO BLOGS AVAILABLE";
			}
			else
			{
				while($fetch_blogs_rows=mysqli_fetch_array($fetch_blogs_run))
				{
					echo "<div style='margin-left:15%;margin-top:45px;width:60%'>
							<div style='font-size:150%'>$fetch_blogs_rows[2]</div>
							<div style='font-size:115%;margin-left:35px;'>$fetch_blogs_rows[3]</div>
							<div style='font-size:80%;color:rgb(81,176,144);margin-left:35px;'><form action=''method='POST'><input type='hidden' name='read_more_form' value='$fetch_blogs_rows[0]'><input class='hidden_submit' type='submit' value='Read More' name='hidden_submit'></form></div>
							<div style='width:100%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px'></div>
						</div>";
				}
			}
		?>
		</div>
	</div>
</div>
<div class="read_more_div" id="read_more_id">
	<div onclick="read_more_div_disappear()" style="float:right;padding:15px;cursor: pointer">X</div>
	<?php 
		$read_more_blog_id=$_POST['read_more_form'];

		$get_blog="select * from `blogs` where id='".$read_more_blog_id."'";
		$get_blog_run=mysqli_query($con,$get_blog);
		$get_blog_row=mysqli_fetch_array($get_blog_run);
	
		$get_blog_blogger_qry="select * from `bloggers` where id='$get_blog_row[7]'";
		$get_blog_blogger_run=mysqli_query($con,$get_blog_blogger_qry);
		$get_blog_blogger_row=mysqli_fetch_array($get_blog_blogger_run);
		echo "<div style='font-size:175%;margin-top:15px;margin-left:25px'>$get_blog_row[2]</div>
			<div style='font-size:125%;margin-top:17px;margin-left:35px;'>$get_blog_row[3]</div>
			<div style='margin-left:45px;width:90%;margin-top:35px'>$get_blog_row[4]<br><br></div><br>
		    <div onclick='delete1($get_blog_row[0])' style='margin-left:35px;border:1px solid red;color:red;padding:10px;border-radius:10px;width:20%'><center>Delete</center></div><br>
		    <div onclick='edit($get_blog_row[0])' style='margin-left:35px;border:1px solid blue;color:blue;padding:10px;border-radius:10px;width:20%'><center>Edit</center></div><br>
			<div style='margin-left:15%;'>CHiT BY</div><br>
			<div style='display:inline-flex;width:100%;'>
				<div style='display:inline-flex;margin-left:20%'><img src='$get_blog_blogger_row[3]' alt='NOT AVAILABLE' width='125px' height='150px' align='middle'></div>
				<div style='display:inline-flex;margin-left:20px;cursor:pointer'>$get_blog_blogger_row[0]</div>
			</div><br><br>
		";
	?>
</div>
<?php
		if(isset($_POST['hidden_submit']))
		{
			$blog_id_read_more=$_POST['read_more_form'];
			echo "<script>
			document.getElementById(\"read_more_id\").style.display=\"block\";
			document.getElementById(\"main_class\").style.opacity=\"0.4\";
			</script>";
		}
?>
</body>
</html>