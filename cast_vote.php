<?php 
	session_start();
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
			<li><a href="index.php#cast vote">Cast Vote</a> </li>
			<li><a href="index.php#contactus">Contact us</a> </li>
			<li><a href="results.php">Results</a> </li>
		</ul>
	</div>
	
	<div>
		<div style="height:500px;width:45%;margin-left:8px;float:left;">
			<h2 style="margin-left:150px;font-family:Times New Roman; border:2px;color:rgb(45, 168, 115)"><u> Today Elections</u></h2>		
			<table class="table table-hover " style="width:44%;margin-left:20%;">			
				<thead> <tr> <td ><b>Election</b></td> <td><b>Date</td></b> </tr> </thead>
				<tbody>
				
				<?php					
					include "connection.php";				
					if(!$conn)
						die("not connected");
					$tdtp=date("Y-m-d");					
					$qry="SELECT * FROM elections where date='".$tdtp."'";
					
					$res=mysqli_query($conn,$qry);
					while($row = mysqli_fetch_array($res))
					{	
						echo "<tr> <td> <a class='hyperlinks' name='nameclick' onclick='logged_ornot()' href='givevote.php?electionname=$row[0]& date=$row[1]'> $row[0]</td></a> 
						<td>$row[1]</td></tr>";
					}
					?>
					
				</tbody>
			</table>
		</div>
		<div style="height:500px;width:44%;margin-left:0px;float:left;">
			<h2 style="margin-left:150px;font-family:Times New Roman; border:2px;color:rgb(45, 168, 115)"><u>All Elections</u></h2>
			<table class="table table-hover " style="width:44%;margin-left:20%;">			
				<thead> <tr> <td ><b>Election</b></td> <td><b>Date</td></b> </tr> </thead>
				<tbody>
				<?php 	
					include "connection.php";				
					if(!$conn)
						die("not connected");
					$tdtp=date("Y-m-d");
					$qry="SELECT * FROM elections";
					$res=mysqli_query($conn,$qry);
					while($row = mysqli_fetch_array($res))
					{	
						echo "<tr> <td> <a class='hyperlinks' href='givevote.php?electionname=$row[0]& date=$row[1]'> $row[0]</td></a> 
						<td>$row[1]</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	
</body>

</html>