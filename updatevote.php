<?php
	session_start();
	
	$elecname=$_GET['ename'];
	$cdname=$_GET['cdname'];
	include "connection.php";
	$qry="update ".$elecname." set count=count+1 where name='".$cdname."'";
	$res=mysqli_query($conn,$qry);
	$_SESSION['VOTED']="yes";
	echo "===>".$_SESSION['VOTED']; 
	header('Location:cast_vote.php');
?>