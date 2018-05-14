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
			<li><a href="index.php#cast vote">Castvote</a> </li>
			<li><a href="index.php#contactus">Contact us</a> </li>
			<li><a href="results.php">Results</a> </li>
		</ul>
	</div>
	<?php 
		$ename=$_GET['electionname'];
		//echo $ename;
		//echo $_GET['date'];
		echo "  <h2 style='margin-left:30%;font-family:Times New Roman; border:2px;color:rgb(45, 168, 115)'> $ename 's candidates  </h2>"; 
	?>
	
	<?php
			if(isset($_SESSION['LOGIN'])){
			}
			else{
						echo "<script>";
							echo "alert('Please! Login to continue')";
						echo "</script>";
					header('Location:cast_vote.php');
			}  			
	?>
	
	
	<?php //if($_GET['date'] == date("Y-m-d")){ ?>
	
	<table class="table table-hover" style="margin:10px 0px 0px 23%;max-width:35%">
		<thead> <tr><th>Candidate Name</th> <th> Select</th></tr> </thead>
		<tbody>
		<?php 
			include "connection.php";
			if(!$conn)
					die("not connected");
			$ename=$_GET['electionname'];
			//echo $ename;
			$qry="select * from $ename";
			//echo $qry;
			$res=mysqli_query($conn,$qry); 						
			while($row=mysqli_fetch_array($res))
			{	
				echo " <tr> <td>$row[0]</td> <td><input type='radio' name='radio' value=$row[0] ></td></tr>";
			}			
		?>
		</tbody>
	</table>
	
	<script>
		function checkthis()
		{
			var rates = document.getElementsByName('radio');
			var rate_value;
			for(var i = 0; i < rates.length; i++){
				if(rates[i].checked){
					rate_value = rates[i].value;
					alert("confirm your vote to "+rate_value);
					var str = window.location.search.substr(1).split('&')[0].split('=')[1];
					var res="http://updatevote.php?cdname="+rate_value+"&ename="+str+"";					
					window.location.href ="updatevote.php?cdname="+rate_value+"&ename="+str+"";
				}
			}
		}
	</script>
	<?php if(isset($SESSION['VOTED'])){  ?>
		<button type="button" class=".disabled"  style="margin:15px 0px 0px 54%">alreay voted</button> 
	<?php }else{ ?>
		<button type="button" class="btn btn-success" name="cnfvote" onclick="checkthis()" style="margin:15px 0px 0px 54%">Confirm</button> 
	<?php } ?> 
</body>
</html>
