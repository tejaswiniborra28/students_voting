<?php
include "connection.php";
if($conn)
{echo "connected";}
else
	die ("not connected".mysqli_connect_error());

///$qry = "INSERT INTO registered_users values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["password"]."')";
$qry="select * from elections";
$res=mysqli_query($conn,$qry);
while($row = mysqli_fetch_array($res)
	)
{
	echo $row['electionname'];
}

?>