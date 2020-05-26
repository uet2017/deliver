<?php
    $db = mysqli_connect("localhost","root","","tyc");
    $id = $_GET['id'];
    $query = "select * from orders where order_code = '$id'"; 
    $query_run = mysqli_query($db,$query);
    $row = mysqli_fetch_array($query_run);
    if ($row['status'] != "shipping" ){
        $q = " delete from orders where order_code= '$id'  ";
        $query = mysqli_query($db,$q);
        header('location:trackorder.php');
        mysqli_close($db);
    }
    else{
        mysqli_close($db) ;    
        echo '<script type="text/javascript"> alert("khong the huy order") </script>';
        echo '<a href = "trackorder.php">goback</a>';
    }
?>
