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
	<center><h2> Results of elections. </h2><br></center>
	
	<table class="table table-hover " style="width:44%;margin-left:20%;">			
				<thead> <tr> <td ><b>Election</b></td></tr> </thead>
				<tbody>
				<?php					
					include "connection.php";				
					if(!$conn)
						die("not connected");							
					$qry="SELECT * FROM elections";					
					$res=mysqli_query($conn,$qry);
					while($row = mysqli_fetch_array($res))
					{	
						echo "<tr> <td> <a class='hyperlinks' name='nameclicks' href='getresult.php?electionname=$row[0]'> $row[0]</td></a> 
						</tr>";
						
					}
					?>
					
				</tbody>
			</table>
	
</body>
</html>