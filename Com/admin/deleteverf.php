<?php
session_start();
if(isset($_SESSION['admusername']))
			{
				
			}
else
	{
		header('location:index.php');
	}
    $db = mysqli_connect("localhost","root","","tyc");
    $id = $_GET['id'];
    $query = "select * from employee where id = '$id'"; 
    $query_run = mysqli_query($db,$query);
    $row = mysqli_fetch_array($query_run);
    
        $q = " delete from employee where id= '$id'  ";
        $query = mysqli_query($db,$q);
        header('location:employverify.php');
        mysqli_close($db);
   
?>