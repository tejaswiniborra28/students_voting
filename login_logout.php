
<?php
	session_start();//start the session
	if ($_SERVER["REQUEST_METHOD"] == "POST")//check for the form method
	{
		if(isset($_POST["loginbtn"]))				
		{			
			if(!empty($_POST["email"]) && !empty($_POST["password"]))
			{				
				include "connection.php";				
				if(!$conn)
					die("not connected".mysqli_connect_error());
				$qry="select * from registered_users where email='".$_POST["email"]."' and password='".$_POST["password"]."' ";
				$res=mysqli_query($conn,$qry);
				//echo mysqli_fetch_row($res)[4]; echo $_POST["password"];
				if( mysqli_fetch_row($res)[4]==$_POST["password"])					
				{
					$_SESSION['LOGIN']="true";
					//echo "okokok ra";
					header('Location:index.php');
				}
				else
				{
					//echo "entered wrong password";
					header('Location:index.php');
				}
				mysqli_close($conn);
			}
			else{
				header('Location:index.php');			
			}			
		}
		if(isset($_POST["logoutbtn"]))
		{																					
			session_unset();		
			//echo "this is shown as u clicked logout button";
			header('Location:index.php');
		}
	}
?>