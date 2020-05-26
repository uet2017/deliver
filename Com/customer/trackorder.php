<?php 
session_start();
	if(isset($_SESSION['username']))
				{
					
				}
			else
				{
					header('location:../');
				}
require '../dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="../js/jquery-1.8.3.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
</head>
<body>

    <div class="header  about-head "  >
        <div class="container">              
            <div class="logo">
                <img src="../images/logo45.png" alt="Logo"  /> <a href="../index.php"><span></span>TYC</a>
            </div>
            <div class="top-nav">
                <span class="menu"> </span>
                <ul>
                    <li ><a href="index.php">Home</a></li>
                    <li ><a href="../contact.php">Contact</a></li>
                    <li ><a href="../login.php">Login</a></li>
                    <li ><a href="../register.php">Register</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
            <script>
                    $( "span.menu" ).click(function() {
                    $( ".top-nav ul" ).slideToggle( "slow", function() {
                    });
                    });
            </script>
        </div>
    </div>
    <div class="about">  
        <div class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-left">
                    <h1>Welcome, 
                        <?php 
                            $un=$_SESSION['username'];
                            $query="select * from customers where username='$un'";
                            $query_run=mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                            echo $row['cname'];
                        ?>
                    </h1>
                </div>
                <div class="breadcrumbs-right">
                    <ul>
                        <li><a href="index.php">Customer</a> <label>:</label></li>
                        <li>Home</li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="about-top-grids">
        <div class="container">
            <div class="col-lg-12">
                <h1 class="text-warning text-center" > List of order </h1>
                <br>
                <table  id="tabledata" class=" table table-striped table-hover table-bordered">
                    <tr class="bg-dark text-white text-center">
                        <th> order ID </th>
                        <th> From district </th>
                        <th> Address detail </th>
                        <th> To District </th>
                        <th> Address detail </th>
                        <th> Speed </th>
                        <th> Order Date </th>
                        <th> status </th>
                        <th> cost </th>
                        <th> Edit order</th>
                        <th> Delete order</th>
                    </tr > 
                    <?php 
                        $un=$_SESSION['username'];
                        $query="select * from customers where username='$un'";
                        $query_run=mysqli_query($con,$query); 
                        $row = mysqli_fetch_array($query_run);
                        $cusid = $row['id'];                 
                        $query2 = "select * from orders where customer_id = '$cusid'";    
                        $query_run2 = mysqli_query($con,$query2);
                        while($row = mysqli_fetch_assoc($query_run2)){
                    ?>
                <tr class="text-center">
                    <td> <?php echo $row['order_code'];  ?> </td>
                    <td> <?php echo $row['adrfrom'];  ?> </td>
                    <td> <?php echo $row['adr_from_detail'];  ?> </td>
                    <td> <?php echo $row['adrto'];  ?> </td>
                    <td> <?php echo $row['adr_to_detail'];  ?> </td>
                    <td> <?php echo $row['speed'];  ?> </td>
                    <td> <?php echo $row['orderDate'];  ?> </td>
                    <td> <?php echo $row['status'];  ?> </td>    
                    <td> <?php echo $row['cost'];  ?> </td>                
                    <td> <button class="btn btn-success"> <a href="edit.php?id=<?php echo $row['order_code']; ?>" class="text-white"> Edit </a>  </button> </td>
                    <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $row['order_code']; ?>" class="text-white"> Delete </a> </button> </td>

                </tr>
                <?php 
                    } 
                    ?>               
                </table>  
            </div>
        </div>
    </div>

<div class="footer">
        <div class="top-footer">
            <div class="container">
                <div class="top-footer-grids">
                    <div class="top-footer-grid">
                        <h3>Contact us</h3>
                        <ul class="address">
                            <li><span class="map-pin"> </span><label>Nhà E3 ĐHQGHN<br>144 Xuân Thủy, Cầu Giấy<br>Hà nội, Việt Nam</label></li>
                            <li><span class="mob"> </span>Phone: 0354201741</li>
                            <li><span class="msg"> </span><a href="#">Mail: fastdeliver@vnu.vn</a></li>
                        </ul>
                    </div>
                    <div class="top-footer-grid">
                        <h3>Important Links</h3>
                        <ul class="latest-post">
                            <li><a href="../index.php">Home</a> </li>
                                
                            <li><a href="../register.php">Register</a> </li>
                            <li><a href="../login.php">Login</a> </li>
                        </ul>
                    </div>
                    <div class="top-footer-grid">
                        <h3>Other Links</h3>
                        <ul class="latest-post">
                            <li><a href="../about-us.php">About Us</a> </li>
                            <li><a href="../privacy-policy.php">Privacy Policy</a> </li>
                            <li><a href="../terms-and-condition.php">Terms & Conditions</a> </li>
                            <li><a href="../faq.php">Help & FAQs</a> </li>
                            <li><a href="../contact.php">Contact Us</a> </li>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container"> 
                <div class="bottom-footer-left">
                    <p> &copy; 2020 fastdeliver.vnu All rights reserved | Powered by: hive techlonogy</p>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
    </div>
</body>
</html>