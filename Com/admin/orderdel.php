<?php
    $db = mysqli_connect("localhost","root","","tyc");
    $id = $_GET['id'];
    $query = "select * from orders where order_code = '$id'"; 
    $query_run = mysqli_query($db,$query);
    $row = mysqli_fetch_array($query_run);
    
        $q = " delete from orders where order_code= '$id'  ";
        $query = mysqli_query($db,$q);
        header('location:orderview.php');
        mysqli_close($db);

?>
