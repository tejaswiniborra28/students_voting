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
		</ul>
	</div>
	<p style="margin:4px 200px 0px 9px">
		Depending on the particular implementation, e-voting may use standalone electronic machines (also called EVM) or computers connected 
		to the internet. It encompasses a range of Internet services, from basic data transmission to full-function online voting through 
		common connectable household devices. Similarly, the degree of automation may vary from simple chores to a complete solution that 
		includes voter registration & authentication, vote input, local or precinct tallying, vote data encryption and transmission to servers, 
		vote consolidation and tabulation, and election administration. A worthy e-voting system must perform most of these tasks while complying 
		with a set of standards established by regulatory bodies, and must also be capable to deal successfully with strong requirements associated
		with security, accuracy, integrity, swiftness, privacy, auditability, accessibility, cost-effectiveness, scalability and ecological
		sustainability.

		Electronic voting technology can include punched cards, optical scan voting systems and specialized voting kiosks (including self-contained
		direct-recording electronic voting systems, or DRE). It can also involve transmission of ballots and votes via telephones, private 
		computer networks, or the Internet.

		In general, two main types of e-Voting can be identified:

		e-voting which is physically supervised by representatives of governmental or independent electoral authorities (e.g. electronic voting machines
		located at polling stations);
		remote e-voting via the internet (also called i-voting) where the voter votes at home or without going to a polling station.
		Many insecurities have been found in commercial voting machines, such as using a default administration password.Cases have also been 
		reported of machines making unpredictable, inconsistent errors. Key issues with electronic voting are therefore the openness of a system 
		to public examination from outside experts, the creation of an authenticatable paper record of votes cast and a chain of custody for 
		records
			
	</p>
	
</body>
</html>