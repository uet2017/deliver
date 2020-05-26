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
    <script type="application/x-javascript"> 
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
        function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
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
            <div class="about-grids">
                <div class="about-grids-row1">
                    <div id="abc">
                        <?php
                            $id = $_GET['id'];
                            $query = "select * from orders where order_code = '$id'";
                            $query_run = mysqli_query($con,$query);
                            $row = mysqli_fetch_array($query_run);
                        ?>
	                    <center><h2>Edit Request</h2></center>
                        <center><img class="avatar" src="../images/avatar.jpg"></center>
	                    <form class="myform" action="edit.php?id=<?php echo $row['order_code']; ?>" method="post">
                            <span>send from</span>
                            <select name="from" class="ipvalues2" required>
                                <option value=""><?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo $row['adrfrom'];
                                ?></option>
                                <?php 
                                    $query="select * from district";
                                        $query_run=mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($query_run)){
                                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";}
                                ?>
                            </select>
                            <span>Address detail</span>
                            <br>
                                <textarea name="addr_f" maxlength="100" cols="5" style="width: 100%;" placeholder=<?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo '"'.$row['adr_from_detail'].'"';
                                ?>></textarea>
                            <br>
                            <span>To</span>
                            <select name="to" class="ipvalues2" required>
                                <option value=""><?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo $row['adrto'];
                                ?></option>
                                <?php 
                                    $query="select * from district";
                                        $query_run=mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($query_run)){
                                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";}
                                ?>
                            </select>
                            <span>Address detail</span>
                            <br>
                                <textarea name="addr_t" maxlength="100" cols="5" style="width: 100%;"placeholder=<?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo '"'.$row['adr_to_detail'].'"';
                                ?>></textarea>
                            <br>
                            <span>Delivery Speed</span>
                            <select name="dspeed" class="ipvalues2" required>
                                <option value=""><?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo $row['speed'];
                                ?></option>
                                <option value="medium">Medium</option>
                                <option value="fast">Fast</option>
                                <option value="max">Max</option>                       
                            </select>
                            <span>package detail</span>
                            <br>
                                <textarea name="pck_d" maxlength="100" cols="5" style="width: 100%;"placeholder=<?php
                                    $id = $_GET['id'];
                                    $query = "select * from orders where order_code = '$id'";
                                    $query_run = mysqli_query($con,$query);
                                    $row = mysqli_fetch_array($query_run);
                                    echo '"'.$row['pack_detail'].'"';
                                ?>></textarea>
                            <br>                   
                            <input type="submit" name="submit_button" id="register-button" value="sửa đơn" />
                            <a href="index.php"><input type="button" id="back-button" value="<<Back to Home" /></a>
		                </form>
		            </div>

                    <?php 
                        if(isset($_POST['submit_button']))
                        {                       
                            $un=$_SESSION['username'];
                            $query="select * from customers where username = '$un'"; 
                            $query_run=mysqli_query($con,$query); 
                            $row = mysqli_fetch_array($query_run);
                            $cusid = $row['id']; 
                            $from = $_POST['from'];
                            $fdetail = $_POST['addr_f'];
                            $to = $_POST['to'];
                            $tdetail = $_POST['addr_t'];
                            $speed = $_POST['dspeed'];
                            $pdetail = $_POST['pck_d'];                  
                            $query2 = "update orders set adrfrom = '$from', adrto = '$to', adr_from_detail = '$fdetail', adr_to_detail = '$tdetail', speed = '$speed', pack_detail = '$pdetail' where order_code = '$id'";
                            $query_run2 = mysqli_query($con,$query2);
                            if($query_run2){
                                echo '<script type="text/javascript"> alert("sua don hang thanh cong") </script>';
                                     
                            }  
                            else
                                echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
                                
                            
                        }
                                
                                
                    ?>
                </div>
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