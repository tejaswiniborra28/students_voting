
<?php
	session_start();//start the session 
	if ($_SERVER["REQUEST_METHOD"] == "POST")//check for the form method
	{
		if(isset($_POST['createbtn']))
		{
				//echo "entered";				
				include "connection.php";
				if(!$conn)
					die("not connected".mysqli_connect_error());
				// i wrote the insertion code in the below after submitting names;
				$_SESSION['elec_created']=$_POST["electionname"];
				$_SESSION['elec_date']=$_POST["date"];
				$_SESSION['elec_passkey']=$_POST["passkey"];
				$_SESSION['elec_convenornumber']=$_POST["convenornumber"];
				echo $_SESSION['elec_created']." ".$_SESSION['elec_date']."  ".$_SESSION['elec_passkey']."  ".$_SESSION['elec_convenornumber'];
				mysqli_close($conn);								
				header('Location:create_addactivity.php');			
		}
		if(isset($_POST['namelistbtn']))
		{			
			include "connection.php";
			if(!$conn)
				die("not connected".mysqli_connect_error());
			echo "==>".$_SESSION["elec_created"];
			$qry="INSERT INTO elections values('".$_SESSION["elec_created"]."','".$_SESSION["elec_date"]."','".$_SESSION["elec_passkey"]."','".$_SESSION["elec_convenornumber"]."') ";
			$res=mysqli_query($conn,$qry);
			echo "qry is : ".$qry;
			// create table name with the name of $_SESSION['elec_created']
			$str="create table ".$_SESSION['elec_created']." (name varchar(30),count int(10))";
			$resu=mysqli_query($conn,$str);
			$count=$_POST['no_of_candidates'];
			$cd1=$_POST['candidate1'];
			$cd2=$_POST['candidate2'];
			if($_POST['candidate3']!=null)
				$cd3=$_POST['candidate3'];
			else
				$cd3="nill";
			if($_POST['candidate4']!=null)				
				$cd4=$_POST['candidate4'];
			else
				$cd4="nill";
			if($_POST['candidate5']!=null)
				$cd5=$_POST['candidate5'];
			else
				$cd5="nill";
			if($_POST['candidate6']!=null)
				$cd6=$_POST['candidate6'];			
			else
				$cd6="nill";
			//echo $_SESSION['elec_created']."\n";
			//echo $cd1."\n".$cd2."\n".$cd3."\n".$cd5."\n";
			//echo "=>".$_SESSION['elec_created']			;
			
			if($cd3=="nill" )
			{
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd1."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd2."', 0 )";
				mysqli_query($conn,$str);
				$_SESSION['list_added']="true";	
			}
			else if ($cd4=="nill" )
			{
				$str="insert into ".$_SESSION['elec_created']." values('".$cd1."' , 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd2."', 0 )";				
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd3."', 0 )";
				mysqli_query($conn,$str);
				$_SESSION['list_added']="true";	
			}
			else if($cd5=="nill")
			{
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd1."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd2."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd3."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd4."', 0 )";
				mysqli_query($conn,$str);
				$_SESSION['list_added']="true";	
			}
			else if($cd6=="nill" )
			{
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd1."', 0 )";
				mysqli_connect($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd2."', 0 )";
				mysqli_connect($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd3."', 0 )";
				mysqli_connect($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd4."', 0 )";
				mysqli_connect($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd5."', 0 )";
				mysqli_connect($conn,$str);	
				$_SESSION['list_added']="true";					
			}
			else
			{
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd1."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd2."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd3."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd4."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd5."', 0 )";
				mysqli_query($conn,$str);
				$str="insert into ".$_SESSION['elec_created']." values( '".$cd6."', 0 )";
				mysqli_query($conn,$str);
				$_SESSION['list_added']="true";	
			}				
			header('Location:create_addactivity.php');
		}		
	}
?>