<?php
session_start();
?>
<html>
<head>
<title> voting </title>
<link rel="stylesheet" type="text/css" href="stylesheet_index.css">
<link rel="stylesheet" type="text/css" href="stylesheet2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<script>			
			function opennav() {
				document.getElementById("sidenav").style.width = "245px";
				document.getElementById("menu").style.opacity="0";
			}
			function closenav(){	
				document.getElementById("sidenav").style.width="0";
				document.getElementById("menu").style.opacity="1";	
			}
	</script>
	<div class="topheader"> <h2> Students voting </h2> </div>
	<button id="menu" class="menubtn" onclick="opennav()">&#9776;Menu </button>
	<div id="sidenav" class="sidenavbar">
		<a class="closebtn" onclick="closenav()">&times;</a>
		<ul style="list-style:none">			
			<li><a href="index.php#about us"> About us</a></li>
			<?php if(isset($_SESSION['LOGIN'])) { ?>
				<li><a href="index.php"> Logout </a> </li>		
			<?php }else { ?>
				<li><a href="index.php#login"> Login </a> </li>
				<li><a href="register.php">Register</a></li>
			<?php } ?>	
			<li><a href="index.php#add activity">Add activity</a> </li>
			<li><a href="index.php#cast vote">Castvote</a> </li>
			<li><a href="index.php#contactus">Contact us</a> </li>
			<li><a href="results.php">Results</a> </li>
		</ul>
	</div>
	<script>
	function validate_form()
	{
		var fname=document.forms["regform"]["fname"].value;
		var lname=document.forms["regform"]["lname"].value;
		var email=document.forms["regform"]["email"].value;
		var phone=document.forms["regform"]["phone"].value;
		var password=document.forms["regform"]["password"].value;
		if( fname.trim()=="" || lname.trim()=="" || email.trim()=="" || phone.trim()=="" || password.trim()=="" )
		{
			alert("All fields must be filled");
			return false;
		}
		phone=phone.trim();
		if(phone[0]!='9' && phone[0]!='8' & phone[0	]!='7')
		{
			alert("Invalid mobile number entered");
			return false;	
		}
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(regform.email.value)){
			return (true);}
		else
		{
			alert("Invalid email entered");
			return false;
		}
	}	
	</script>
	
	<?php
		if(isset($_POST["submit"]))
		{
			include "connection.php";
			if(!$conn)
				die ("not connected".mysqli_connect_error());
			$qry = "INSERT INTO registered_users values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["password"]."')";
			$res=mysqli_query($conn,$qry);
			$_SESSION['REGISTER']=1;
			header('Location: index.php');
		}
	?>
	
	<form name="regform" action="" onsubmit="return validate_form()" method="post">	
		<fieldset>
			<h3 align="center"style="color:rgb(13, 47, 102);"> Register </h3><br>			
			<div  style="margin:15px 0px 0px 400px">
				First Name :&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="    first name" name="fname"
														style="border-color:rgb(13, 47, 102);padding:5px 0px 5px 0px;width:30%"><br>
				<br>
				Last Name :&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="    last name" name="lname"
														style="border-color:rgb(13, 47, 102);padding:5px 0px 5px 0px;width:30%;">
				<br><br>
				email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; 
				<input type="text" placeholder="     email " name="email"
														style="border-color:rgb(13, 47, 102);padding:5px 0px 5px 0px;width:30%;">
				<br><br>
				Mobile No&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" placeholder="    mobile number" name="phone"  maxlength="10"
														style="border-color:rgb(13, 47, 102);padding:5px 0px 5px 0px;width:30%;">
				<br><br>
				Password &nbsp;:&nbsp;&nbsp;&nbsp; <input type="password" placeholder="         Password" name="password"
														style="border-color:rgb(13, 47, 102);padding:5px 0px 5px 0px;width:30%;">			
				<br><br>
				<button type="submit" name="submit" style="margin:20px 0px 0px 200px;border-color:rgb(13, 47, 102);background-color:white;
				border-radius:13px;padding:5px 4px 5px 4px;"   >       Register</button>				
			</div>
		</fieldset>
		
	</form>
	
</body>
</html>