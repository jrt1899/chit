<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
?>

<html>
<head>

<script>
	function search1(){
		var x=document.getElementById("search");
		var y=document.getElementById("search_input");
		if(x.style.width=="20%")
		{
			x.style.width="3.5%";
			y.style.width="0%"
			y.style.display="none";
		}
		else
		{
			x.style.width="20%";
			y.style.width="80%";
			y.style.display="inline-block";
		} 
	}	

	function showlogin(){
		document.getElementById("log_in").style.display="block";
		document.getElementById("main_class").style.opacity="0.4"
	}

	function beco_mem(){
		document.getElementById("bec_mem").style.display="block";
		document.getElementById("main_class").style.opacity="0.4";
	}

	function check_log(){
		var x=document.getElementById("log_in");
		x.style.display="none";
		var y=document.getElementById("main_class")
		y.style.opacity="1";
	}

	function sub(){
		var x=document.getElementById("password");
		var y=document.getElementById("cnf_pass");
		var z=document.getElementById("sub_but");
		if(x.value==y.value)
		{
			z.style.background="black";
			z.disabled=false;
			console.log(z.disabled);
		}
		else 
			{alert("pass and cnf_pass doesn't match");
			y.focus();
			}
	}

	function check_bac1(){
		var x=document.getElementById("bec_mem");
		x.style.display="none";
		var y=document.getElementById("main_class")
		y.style.opacity="1";
	}

	function read_more_div_disappear(){
		document.getElementById("read_more_id").style.display="none";
		document.getElementById("main_class").style.opacity="1";
	}

	function increase_like(x){
		var y="increase_like.php?id="+x;
		location.href=y;
	}

	function blogger_profile(x){
		var y="profile_show_home.php?id="+x;
		location.href=y;
	}

	function explore_home_posts(){
		location.href=explore_home_posts.php;
	}

	
</script>

<style>
	
	body{
		font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif; 
	}

	.main_class{
		opacity=1;
		height:95%;
		width:100%;
	}

	.class1 { 
		margin-top:0%;
		margin-right:5%;
		margin-left:5%;
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

	.log_in{
		position:absolute;
		top:25%;
		left:25%;
		height:45%;
		width:45%;
		background: rgb(215,239,235);
		display:none;
	}

	.bec_mem{
		position:absolute;
		top:20%;
		left:20%;
		height:73%;
		width:40%;
		font-size: 80%;
		display:none;
		background:rgb(215,239,235);
		padding-left: 10%;
	}

	.log_in1{
		height:100%;
		width:30%;
		display:inline;
		float:left;
	}

	.log_in2{
		text-align: center;
		height: 100%;
		width: 70%;
		display: inline;
		float:right;
	}

	input[type=submit]{
		width: 30%;
		height: 10%;
		background: black;
		color: white;
		cursor: pointer;
	}

	.blogs{
		position:absolute;
		left:2%;
		top:19%;
		width:90%;
		/*border: 1px solid black;*/
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

	.read_more_div{
		position:absolute;
		top:15%;
		left:15%;
		width:75%;
		display:none;
		background:#5ffff0;
	}
	.like_hover{
		cursor: pointer;
	}
/*
	td{
		border:1px solid black;
	}*/

</style>
</head>

<body>
<div class="main_class" id="main_class">
	<div class="class1" id="class1">
		<span><img src="CHiT.png" align="middle" height="100%" width="17%"></span>
		<span style="float:right;margin-top:2.8%;margin-left:3%;color:rgb(81,176,144);cursor: pointer;" onclick="showlogin()">Log In</span>
		<span class="class2" id="class2" onclick="beco_mem()">Become a Member</span>
		<div class="search" id="search">
			<div style="display:inline"><img src="search.jpg" onclick="search1()" align="middle" height="40px" width="40px"></div>
			<div style="display:inline;width:20%"><input type="text" id="search_input" name="search_input" class="search_input"></div>
		</div>
	</div>
	<div style="width:100%;height:0px;border:1px solid rgb(81,176,144);margin-top:8px;">
	</div>
	<div class="blogs">
		<span style="font-size: 150%;float:left;margin-left: 35px;margin-top:25px;">TRENDiNG CHiTs</span><span style="float:right;margin-top:30px;margin-right:190px ;color:rgb(81,176,144)" ><a href='home.php' style='color:rgb(81,176,144)'>back</a></span><br>
		<div style="width:90%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px"></div>
		<?php
			$fetch_blogs_qry="select * from `blogs` order by id desc";
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
							<div style='width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px'></div>
						</div>";
				}
			}
		?>
	</div>
	
</div>
<div style='position:fixed;width:100%;height:10%;background:gray'><center>About Us</center></div>

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
			<div style='margin-left:45px;width:90%;margin-top:35px'>$get_blog_row[4]<br><br></div>
			<div onclick='increase_like($get_blog_row[0])' style='margin-left:35px;'><img src='liked.png' height='45px' width='40px' align='middle' class='like_hover'>Like&nbsp$get_blog_row[5]</div>
			<div style='margin-left:15%;'>CHiT BY</div><br>
			<div style='display:inline-flex;width:100%;'>
				<div style='display:inline-flex;margin-left:20%'><img src='$get_blog_blogger_row[3]' alt='NOT AVAILABLE' width='125px' height='150px' align='middle'></div>
				<div style='display:inline-flex;margin-left:20px;cursor:pointer' onclick='blogger_profile($get_blog_blogger_row[5])'>$get_blog_blogger_row[0]</div>
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

<div class="log_in" id="log_in">
	<span onclick="check_log()"><font style="float:right;size:200%;padding:6px;cursor: pointer;">X</font></span>
	<div class="log_in1">
		<div style="margin-top:31%;margin-left:0%"><img src="login_final.png" height="80%" width="100%"></div>
	</div>
	<div class="log_in2"><br>
		<form action="login.php" method="POST">
		<font style="font-size: 150%;"><b>LOG-IN</b></font><br><br><br>
			ENTER EMAIL-ID : <input type="email" name="name_email"><br><br>
			ENTER PASSWORD : <input type="password" name="password"><br><br>
			<input type="submit" value="Log_In">
		</form>
	</div>
</div>

<div class="bec_mem" id="bec_mem">
	<span onclick="check_bac1()"><font style="float:right;size:200%;padding:6px;cursor:pointer">X</font></span>
	<font style="font-size: 200%"><center> SIGN UP </center></font><br><br>
	<form action="bec_mem.php" method="POST">
		ENTER NAME : <input type="text" name="username" required><br><br>
		ENTER EMAIL : <input type="email" name="email_id" required><br><br>
		ADD PHOTO : <input type="file" name="profile_picture" accept="image/x-png,image/gif,image/jpeg"><br><br>
		ENTER PASSWORD : <input type="password" name="pass" id="password" required><br><br>
		CNFRM PASSWORD : <input type="password" name="cnf_pass" onchange="sub()" id="cnf_pass" required><br><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="submit" id="sub_but" disabled="true" style="background: gray">
	</form>
</div>



</body>

</html>