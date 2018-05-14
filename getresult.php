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
	
	<?php	
		include "connection.php";
		$qry="select * from ".$_GET['electionname']."";	
		?>
		<h2> voting list of <?php $_GET['electionname'] ?></h2>
		<?php
		$res=mysqli_query($conn,$qry);
		?>
		<table><?php
		while($row = mysqli_fetch_array($res))
		{	?>
			<tr > <td ><?php  echo $row[0]."     ".$row[1];?> </td></tr>
			<?php
		}?>
		</table>
	
</body>
</html>