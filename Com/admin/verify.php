<?php
    $db = mysqli_connect("localhost","root","","tyc");
    $id = $_GET['id'];
    $query = "select * from employee where employ_id = '$id'"; 
    $query_run = mysqli_query($db,$query);
    $row = mysqli_fetch_array($query_run);
    
        $q = " update employee set status = '1' where employ_id= '$id'  ";
        $query = mysqli_query($db,$q);
        header('location:employverify.php');
        mysqli_close($db);
        
   
?>