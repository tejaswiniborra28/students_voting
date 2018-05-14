<?php 
	session_start();
	//session_unset();
?>
<html>
<title> voting </title>
<link rel="stylesheet" type="text/css" href="stylesheet_index.css">
<link rel="stylesheet" type="text/css" href="stylesheet_again.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<script>
		function opennav(){
			document.getElementById("sidenav").style.width="245px";
			document.getElementById("menu").style.opacity="0";
		}
		function closenav(){
			document.getElementById("sidenav").style.width="0px";
			document.getElementById("menu").style.opacity="1";		
		}		
	</script>	
	<div class="topheader"><h2> Students Voting</h2></div>
	<button id="menu" class="menubtn" onclick="opennav()" >&#9776;Menu</button>
	<div id="sidenav" class="sidenavbar" >
		<a class="closebtn" onclick="closenav()"> &times;</a>
		<ul style="list-style:none">			
			<li><a href="index.php#about us"> About us</a></li>
			<?php if(isset($_SESSION['LOGIN'])) { ?>				
				<li><a href="#" name="logoutbtn" > Logout </a> </li>				
			<?php }else { ?>
				<li><a href="index.php#login"> Login </a> </li>
				<li><a href="register.php">Register</a></li>
			<?php } ?>
			<li><a href="index.php#add activity">Add activity</a> </li>
			<li><a href="index.php#cast vote">Cast Vote</a> </li>
			<li><a href="index.php#contactus">Contact us</a> </li>
			<li><a href="results.php">Results</a> </li>
		</ul>
	</div>
	<style>
		
	</style>
	<div style="max-width:85%;margin-left:8px;">
		<p> <b>Step 1)</b> Create (or) host your own election by clicking on the create button<br>
			<b>Step 2)</b> Enter the details and particulars about your election, like(election name , election date , pass key, Mobile no)<br>
			<b>Step 3)</b> Enter (or) nominate the candidates names and their count.<br><br>
			<b><u>NOTE</u> : </b> 1) election nameshould not contain any spaces or white characters.<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				2) Passkey must be unique <br>
		</p>
		
	</div>
	<br>
	<div style="margin-left:8px;height:20px;width:90%;border:1px solid black;border-radius:10px;">
		<!-- for success bar -->
		<div style="float:left;height:18px;width:20%;background-color:rgb(67, 249, 116);border-radius:10px 0px 0px 10px;">
		</div>
		<?php if(isset($_SESSION['elec_created'])){ ?>
			<div style="float:left;height:18px;width:40%;background-color:rgb(67, 249, 116);"></div>
		<?php }else{ ?>
			<div style="float:left;height:18px;width:40%;"></div>
		<?php } ?>
		
		<?php if(isset($_SESSION['list_added'])){ ?>
			<div style="float:left;width:40%;height:18px;background-color:rgb(67, 249, 116);border-radius:0px 10px 10px 0px;"></div>
		<?php }else{ ?>
			<div style="float:left;height:18px;width:40%;"></div>
		<?php } ?>
		
	</div>
	<br>
	<div >
		<script>
			function open_formbar(){
				document.getElementById('formbar1').style.display='block';
				document.getElementById('formbar2').style.display='block';
			}
			function close_formbar(){
				document.getElementById('formbar1').style.display='none';
				document.getElementById('formbar2').style.display='none';
			}			
		</script>
		<div style="float:left;height:250px;max-width:200px;">
			<?php if(isset($_SESSION['LOGIN'])){ ?>				
				<div style="float:none;"><img src="create_election1.png" onclick="open_formbar()" style="margin:30px 0px 0px 15px;height:200px; width:200px;"></div>
			<?php } else { ?>
				<?php echo "<script>";
					echo"function open_formbar_alert(){";
					echo"alert('Please! login to continue');";
					echo "}";
				echo "</script>";
				?>
				<div style="float:none;"><img src="create_election1.png" name="open_formbar" onclick="open_formbar_alert()" style="margin:30px 0px 0px 15px;height:200px; width:200px;"></div>				
			<?php }?>
			<script>
			function unset_sessions()
			{
					
			}
			</script>
			<div style="height:50px;width:200px;"> 
					<button class="createbtnstyle" name="clearbtn" style="margin:20px 0px 0px 20px;"  onclick="unset_sesions()">Clear Activity</button> 
			</div>
		</div>
		
		<div id="formbar1" style="display:none;float:left;margin:20px 0% 0% 7%;">		
			&nbsp;&nbsp;&nbsp;&nbsp;<h3 style="font-size:30px;color:rgb(45,168,115);font-family:Times New Roman;"> Add your own election
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="closebtn" onclick="close_formbar()" style="margin-left:20px">&nbsp;&times;</a></h3>
					<br>
			<form id="myform1" action="create_activity.php" method="post" style="margin-left:30px;">
				<?php if(!isset($_SESSION['elec_created'])){ ?>											
					Name of Election : <input type="text" name="electionname" placeholder="Election Name" required class="ip_boxes">
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date :
						<input type="date" name="date" placeholder="DD/MM/YYYY" required class="ip_boxes">
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Passkey :<input type="number" name="passkey" placeholder="Passkey" required class="ip_boxes"> 
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile No : <input type="text" name="convenornumber" placeholder="Mobile number" required class="ip_boxes">
					<br><br>
					<button type="submit" name="createbtn" class="createbtnstyle">Create</button>
				<?php }else{ ?>
					<br><br><br>
					<p style="margin:0px 3px 0px 3px;"> Just one more step! Add candidate names to your elections</p>					
				<?php }?>
			</form>
		</div>
		
		<div id="formbar2" style="display:none;float:left;margin:20px 0% 0% 7%;max-width:35%;">
			<center> <h3 style="font-size:30px;color:rgb(45,168,115);font-family:Times New Roman;"> Add candidates names </h3> </center>
			 <?php if(!isset($_SESSION['list_added'])){ ?> 
			<br>
			<form id="myform2" action="create_activity.php" method="post">				
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number : <input type="number" name="no_of_candidates"placeholder="No.of candidates" class="ip_boxes">
					<br><br>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  text="text" placeholder="candidate1 name" name="candidate1" class="ip_boxes1" >			
					<input  text="text" placeholder="candidate2 name" name="candidate2" class="ip_boxes1">
					<br><br>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  text="text" placeholder="candidate3 name" name="candidate3" class="ip_boxes1">			
					<input  text="text" placeholder="candidate4 name" name="candidate4" class="ip_boxes1">			
					<br><br>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  text="text" placeholder="candidate5 name" name="candidate5"  class="ip_boxes1">							
					<input  text="text" placeholder="candidate6 name" name="candidate6" class="ip_boxes1">				
					<br><br>
					<button type="submit" name="namelistbtn" class="createbtnstyle"> Add</button>
				<?php }else { ?>
					<br><br>	
					<p style="margin:0px 3px 0px 5px;">candidates were nominated for this election </p>
				<?php } ?>
			</form>
		</div>
		
	</div>
	<br>
	
</body>
</html>