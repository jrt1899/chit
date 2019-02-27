<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
	session_start();
	$profile_id=$_GET['id'];
	$blogger_info="select * from bloggers where id='$profile_id'";
	$blogger_info_run=mysqli_query($con,$blogger_info);
	$blogger_info_row=mysqli_fetch_array($blogger_info_run);
	$blogs="select * from blogs where user_id='$blogger_info_row[5]'";
	$blogs_run=mysqli_query($con,$blogs);

echo"
	<html>
	<script>
		function read_more_div_disappear(){
		document.getElementById('read_more_id').style.display='none';
		document.getElementById('main_class').style.opacity='1';
	}
	function increase_like(x){
		var y='increase_like_index.php?id='+x;
		location.href=y;
	}
	function back1(){
		location.href='explore_index.php';
	}
	</script>
	<style>
		.read_more_div{
		position:absolute;
		top:15%;
		left:15%;
		width:75%;
		display:none;
		color:black;
		background:#5ffff0;
	}
	</style>
	<body style='font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif;background:black;color:white'>
	<div id='main_class'>
	<div style='margin:10px;color:red;cursor:pointer' onclick='back1()'>Back</div>
	<center><div><img src='$blogger_info_row[3]' height='200px' width='150px'></div>
	<div style='font-size:150%;'>$blogger_info_row[0]</div>
	<div style='font-size:125%'>Total Likes : $blogger_info_row[4]</div></center>";
	if(mysqli_num_rows($blogs_run)==0)
	{
		echo "<div><center>BLOGGER HASN'T WRITTEN ANYTHING YET.<center></div>";
	}
	else{
		while($blogs_rows=mysqli_fetch_array($blogs_run)){
			echo"
						<div style='width:70%;margin-left:20%;margin-top:45px;'>
							<div style='font-size:150%'>$blogs_rows[2]</div>
							<div style='font-size:115%;margin-left:35px;'>$blogs_rows[3]</div>
							<div style='font-size:80%;color:rgb(81,176,144);margin-left:35px;'><form action=''method='POST'><input type='hidden' name='read_more_form' value='$blogs_rows[0]'><input class='hidden_submit' type='submit' value='Read More' name='hidden_submit'></form></div>
							<div style='width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px'></div>
						</div>";
					}
	}
	echo "</div>";

?>


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

</body></html>
