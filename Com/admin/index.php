<?php 
session_start();

if(isset($_SESSION['admusername']))
			{
				header('location:admhome.php');
			}
else
	{	
	}			
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body style="background-color: #deefde">
	<center><h2>LOGIN</h2></center>
	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="index.php" method="post">
		<label > <b>User Name</b></label>
		<br>
		<input type="text" name="username" class="ipvalues" placeholder="Type Your Username" required/>
		<br>
		<label><b>Password</b></label>
		<br>
		<input type="password" name="password" class="ipvalues" placeholder="Type Your Password" required/>
		<br>
		<input type="submit" name="submit_btn" id="register-button" value="Submit" />
		<br>
	</form>
<?php 
	
	if(isset($_POST['submit_btn']))
	{
		$password=$_POST['password'];
		$username=$_POST['username'];
				$query="select * from adm where username='$username' and password='$password'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$_SESSION['admusername']=$username;
					header('location:index.php');
				}
				else
					header('location:../');	
		
	}
?>

</body>
</html>