<?php
$con=mysqli_connect("localhost","root","")or
	die("Could not connect.");
mysqli_select_db($con,"chit")or
	die("Could not select database.");

$autocomplete_qry='select * from blogs';
$autocomplete_qry_run=mysqli_query($con,$autocomplete_qry);
$autocomplete_content="[m,";
while($autocomplete_qry_row=mysqli_fetch_array($autocomplete_qry_run))
{
	$autocomplete_content.="$autocomplete_qry_row[1],";
	$autocomplete_content.="$autocomplete_qry_row[2],";
}
$autocomplete_content.="]";
?>

<html>
<head>

<script>

	function showlogin(){
		document.getElementById("log_in").style.display="block";
		document.getElementById("main_class").style.opacity="0.4";
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

	function explore_home_bloggers(){
		location.href=explore_home_bloggers.php;
	}


</script>

<style>
	
	body{
		font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif; 
	}

	.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text].autocomplete {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: rgb(81,176,144);
  color: black;
  cursor: pointer;
  border-radius: 5px; 
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
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
		height:80%;
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

	input[type=submit].log_in_button{
		width: 30%;
		height: 20%;
		background: black;
		color: white;
		cursor: pointer;
	}

	.blogs{
		position:absolute;
		left:2%;
		top:19%;
		width:50%;
		/*border: 1px solid black;*/
	}

	.bloggers{
		position:absolute;
		left:55%;
		top:19%;
		width:50%;
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
		<div class="search" id="search" style='display:inline-block;float:right;margin-top:25px;'>
			<form autocomplete="off" action="search_output.php" method="POST">
  				<div class="autocomplete" style="width:300px;">
    			<input id="myInput" type="text" name="search_input" placeholder="Search" class="autocomplete">
  				</div>
  			<input type="submit">
			</form>
			<div style="display:inline;width:20%"><input type="text" id="search_input" name="search_input" class="search_input"></div>
		</div>
	</div>
	<div style="width:100%;height:0px;border:1px solid rgb(81,176,144);margin-top:8px;">
	</div>
	<div class="blogs">
		<span style="font-size: 150%;float:left;margin-left: 35px;margin-top:25px;">TRENDiNG CHiTs</span><span style="float:right;margin-top:30px;margin-right:190px ;cursor:pointer"><a href="explore_home_post.php" style='color:rgb(81,176,144);'>more</a></span><br>
		<div style="width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px"></div>
		<?php
			$fetch_blogs_qry="select * from `blogs` order by likes desc";
			$fetch_blogs_run=mysqli_query($con,$fetch_blogs_qry);
			if(mysqli_num_rows($fetch_blogs_run)==0)
			{
				echo "NO BLOGS AVAILABLE";
			}
			else
			{
				$xx=0;
				while($fetch_blogs_rows=mysqli_fetch_array($fetch_blogs_run))
				{
					echo "<div style='margin-left:15%;margin-top:45px;width:60%'>
							<div style='font-size:150%'>$fetch_blogs_rows[2]</div>
							<div style='font-size:115%;margin-left:35px;'>$fetch_blogs_rows[3]</div>
							<div style='font-size:80%;color:rgb(81,176,144);margin-left:35px;'><form action=''method='POST'><input type='hidden' name='read_more_form' value='$fetch_blogs_rows[0]'><input class='hidden_submit' type='submit' class='read_more_submit' value='Read More' name='hidden_submit'></form></div>
							<div style='width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px'></div>
						</div>";
						$xx=$xx+1;
						if($xx>3)
							break;
				}
			}
		?>
	</div>
	<div class="bloggers">
		<span style="font-size: 150%;float:left;margin-left: 35px;margin-top:25px;">TRENDiNG BLOGgERS</span><span style="float:right;margin-top:30px;margin-right:190px ;color:rgb(81,176,144)"><a href='explore_home_bloggers.php' style='color:rgb(81,176,144)'>more</a></span><br>
		<div style="width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:45px;margin-left: 10px"></div>
		<?php 
			$fetch_bloggers="select * from 	`bloggers` order by likes desc";
			$fetch_bloggers_run=mysqli_query($con,$fetch_bloggers);
			$zz=0;
			while($fetch_bloggers_rows=mysqli_fetch_array($fetch_bloggers_run))
			{
				echo "<table style='width:80%;margin-top:25px;margin-left:25px;'>
				<tr><td rowspan='2' style='width:40%'><img src='$fetch_bloggers_rows[3]' height='150px' width='150px'></td>
				<td style='font-size:125%;cursor:pointer'><div onclick='blogger_profile($fetch_bloggers_rows[5])'>$fetch_bloggers_rows[0]</div></td>
				</tr>
				<tr><td style='font-size:110%'>Likes&nbsp$fetch_bloggers_rows[4]</td>
				</tr>
				</table>
				<div style='width:78%;height:0px;border:1px solid rgb(215,239,235);margin-top:25px;margin-left: 10px'></div>
				";
				$zz=$zz+1;
				if($zz>3)
					break;
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
			<input type="submit" value="Log_In" class="log_in_button">
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


<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = "<?php echo $autocomplete_content;?>".split(",");

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>




</html>