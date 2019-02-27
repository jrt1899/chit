<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");
$blogs="select * from blogs";
$blogs_run=mysqli_query($con, $blogs);
$bloggers="select * from bloggers";
$bloggers_run=mysqli_query($con,$bloggers);
echo "<html>
<script>
	function delete_blog(x){
		var y='delete_blog_admin.php?id='+x;
		location.href=y;
	}
	function delete_blogger(x){
		var y='delete_blogger_admin.php?id='+x;
		location.href=y;
	}
</script>";


echo "<body><b>BLOGS</b><br>";
while($blogs_row=mysqli_fetch_array($blogs_run))
{
	echo "<div style='width:98%;border:1px solid black;padding:10px'><b>Subject:</b>$blogs_row[2]<br>
	<b>Short-Description:</b>$blogs_row[3]<br>
	<b>Blog:</b>$blogs_row[4]<br>
	<b>Subject:</b>$blogs_row[1]<br>
	<button onclick='delete_blog($blogs_row[0])'>Delete</button>
	</div>";
}
echo "<br><br><b>BLOGGERS</b>";
while($bloggers_row=mysqli_fetch_array($bloggers_run))
{
	echo "<div style='width:98%;border:1px solid black;padding:10px'><b>Username:</b>$bloggers_row[0]<br>
	<b>Email-Address:</b>$bloggers_row[1]<br>
	<b>Password:</b>$bloggers_row[2]<br>
	<button onclick='delete_blogger($bloggers_row[5])'>Delete</button>
	</div>";
}


echo"</body></html>"
?>