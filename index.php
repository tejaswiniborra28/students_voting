<?php
	session_start();
?>
<html>
<head>
<title> voting </title>
<link rel="stylesheet" type="text/css" href="stylesheet_index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:white;">
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
	<!-- here starts -->
	<div class="topheader"> <h2> Students voting </h2> </div>
	<button id="menu" class="menubtn" onclick="opennav()">&#9776;Menu </button>
	<div id="sidenav" class="sidenavbar">
		<a class="closebtn" onclick="closenav()">&times;</a>
		<ul style="list-style:none">			
			<li><a href="#about us"> About us</a></li>
			<?php if(isset($_SESSION['LOGIN'])) { ?>
				<li><a href="#logout"> Logout </a> </li>		
			<?php }else { ?>
				<li><a href="#login"> Login </a> </li>
				<li><a href="register.php">Register</a></li>
			<?php } ?>			
			<li><a href="#add activity">Add activity</a> </li>
			<li><a href="#cast vote">Cast vote</a> </li>
			<li><a href="#contactus">Contact us</a> </li>
			<li><a href="getresult.php">Results</a> </li>
		</ul>
	</div>
	<!-- insert slides -->
	<div class="second_header">
		<div class="box">
				<img src="slide1.jpg" class="slides">
				<img src="slide2.jpg" class="slides">
		</div>
		<div class="box">
				<h3 style="margin-left:145px;font-family:Times New Roman; border:2px;color:rgb(45, 168, 115)">Ongoing Elections</h3>
				<table class="table table-hover" style="max-width:50%; margin:15px 0px 0px 100px;">
					<thead> <tr> <th>election</th> <th> date</th> </tr></thead>
					<tbody>												
						<?php 	
							include "connection.php";				
							if(!$conn)
								die("not connected");
							$tdtp=date("Y-m-d");
							$qry="SELECT * FROM elections where date=".$tdtp."";
							$res=mysqli_query($conn,$qry);
							if(mysqli_fetch_row($res)>0)
							{
								while($row = mysqli_fetch_array($res)){
								?>
									<tr> <td><?php echo $row['electionname']; ?> </td> <td><?php echo $row['date']; ?></td> </tr>
								<?php
								} 
							} else { ?>
								<tr> <td>N/A</td> <td>N/A</td> </tr>
							<?php } ?>
					</tbody>
				</table>
				
		</div>
	</div>
	<script>
			var myIndex = 0;
			carousel();
			function carousel() {
				var i;
				var x = document.getElementsByClassName("slides");
				for (i = 0; i < x.length; i++) {
				   x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 3000); // Change image every 3 seconds
			}
	</script>
	<br>
	<div style="border-radius:10px;">
		<!--   -->
		<div id="about us" class="boxes" style="background-color:rgb(152, 108, 226)">
			<div style="padding : 10px 15px 10px 10px"><p>An alternative voting channel to increase voter participation, reduce election costs while upholding the highest security,
				verifiability and integrity standards.
				Scytl Online Voting enables voters to cast their vote privately and easily from any location and on any device with 
				Internet access (PC, tablet, smartphone, etc.), ensuring maximum election engagement by enabling remote and disabled voters 
				to participate on equal terms.
				<br>
				The election process is almost similar to the general election procedure but here it provides more options and feasible environment
				for every user to conduct elections and aslo 
			</p>
			</div>
			<button class="boxes_btns" onclick="document.location.href ='more_matter.php'" style="background-color:rgb(152, 108, 226)">more</button>
		</div>
		
		<div id="login">
			
		</div>
		
		<div id="add activity" class="boxes" >
			<div class="pics_boxes">
				<img class="pictures" src="add_election.jpg">
			</div>
			<div class="matter_boxes" style="background-color: rgb(45, 168, 115)" >
				<div style="padding : 10px 15px 10px 10px"><p>
					The registered members can create their "OWN ELECTION" or "OWN POLLS".The election can be hosted with minimum 2 member of candidates.
					<br> For every election you create , you have to create a pass key and register with your mobile number.
					<br> After hosting the election you need to nominate the candidates, maximum of 6 candidates.
						All this process includes 3 steps.
				</p>
				</div>
			<button  class="boxes_btns" onclick="document.location.href ='create_addactivity.php'" style="background-color:rgb(45, 168, 115)">add-activity</button> <!--// create_addactivity.html -->
			</div>
		</div>
		
		<div id="cast vote" class="boxes">
			<div class="pics_boxes">
				<img class="pictures" src="castvote.jpg">
			</div>
			<div class="matter_boxes" style="background-color:rgb(152, 108, 226)">
				<div style="padding : 10px 15px 10px 10px"><p>
					The registered user can cast his/her vote to the candidate on their own choice. <br>This displays the number of 
					elections available and if we select the election name, It will navigate us to that particular election. <br>
					In that particular election we can see the candidates nominated for the election.
				</p>
				</div>
				<button class="boxes_btns" onclick="document.location.href='cast_vote.php'" style="background-color:rgb(152, 108, 226)">Cast-Vote</button>
			</div>
		</div>
		
		<script>
			function validate_loginform()
			{
				var em=document.getElementsByName('email')[0].value;
				alert("em is"+em);
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(em))
				{}
				else{
					alert("invalid email entered");
				}
				return true;
			}
		</script>
				
		<div id="login" class="boxes" >						
			<div class="logincontact_block">
				<h3 style="margin:20px 0px 0px 70px;color: rgb(45, 168, 115);"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Login credentials</b></h3>
				
				<form name="loginform" action="login_logout.php"  method="post">
					<div  style="margin:15px 0px 0px 100px">
					User-Id &nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" placeholder="        email" 
					<?php if(isset($_SESSION['LOGIN'])){?> <?php }else { ?>required <?php }?>			
						name="email" style="border-color:rgb(45, 168, 115);padding:5px 0px 5px 0px"><br>
					<br>
					Password : <input type="password" placeholder="         Password"
						<?php if(isset($_SESSION['LOGIN'])){?> <?php }else { ?>required <?php }?>
						name="password" style="border-color:rgb(45, 168, 115);padding:5px 0px 5px 0px">
					</div>
					<?php 	if(!isset($_SESSION['LOGIN'])){		?>	
						<button name="registerbtn" onclick="document.location.href='register.php'"
								style="margin:20px 0px 0px 180px;border-color:rgb(45,168,115);background-color:white;border-radius:10px">
								Register</button>
						<button type="sumbit" name="loginbtn" onclick=""
							style="margin:20px 0px 0px 20px;border-color:rgb(45,168,115);background-color:white;border-radius:10px">
								Login</button>
					<?php } ?>	
					
					<?php if(isset($_SESSION['LOGIN'])){ ?>
						<button name="logoutbtn"
							style="margin:20px 0px 0px 285px;border-color:rgb(45,168,115);background-color:white;border-radius:10px">
							Logout</button>
					<?php }?>					
				</form>											
			</div>
			
			<div style="width:5px;height:250px;background-color:#DCDCDC;float:left;"></div> <!-- vertical line seperator-->
			
			<div id="contactus" class="logincontact_block" >
				<h3 style="margin:20px 0px 0px 70px;color: rgb(45, 168, 115);"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Contact us : </b></h3>
				<div style="margin:10px 0px 0px 200px">
					<div class="imageboxes"style="float:left"><img class="images" src="emaillogo.png"></div>
									<div style="padding:10px 0px 0px 0px;">studentsvoting@gmail.com </div>			
					<br><br>
					<div class="imageboxes"style="float:left"><img class="images" src="facebooklogo.png"></div>
									<div style="padding:10px 0px 0px 0px;">studentsvoting </div>
					<br><br>
					<div class="imageboxes"style="float:left"><img class="images" src="twitterlogo.png"></div>
									<div style="padding:10px 0px 0px 0px;"> studentsvoting.twitter</div>		
					
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>	