<?php 
session_start();
	if(isset($_SESSION['username']))
				{
					//echo "okey stay";
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
        <div class="about-top-grids">
            <div class="container">
                <div class="contact-grids">
                    <div class="contact-right">
                        <h2>Edit Your Details</h2>

                            <form name="register" id="register" method="post" action="editprof.php">
                                <div>
                                    <span>Name</span>
                                    <input type="text" name="cname" maxlength="30" value=
                                    <?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo '"'.$row['cname'].'"';
                                        ?> class="required" />
                                </div>  
                                <div>
                                    <span>Phone Number</span>
                                    <input type="text" name="phone" maxlength="10" minlength="10" value=<?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo '"'.$row['phone'].'"';
                                        ?> class="required digits" />
                                </div>
                                <div>
                                    <span>Email</span>
                                    <input type="email" name="email" maxlength="50" value=<?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo ' "'.$row['email'].'"';
                                        ?> class="required" />
                                </div> 
                                <div>
                                    <span>Password</span>
                                    <input type="password" name="password" maxlength="40" value=<?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo '"'.$row['password'].'"';
                                        ?> class="required" />
                                </div>
                                <div>
                                    <span>Confirm Password</span>
                                    <input type="password" name="cpassword" maxlength="40" value=<?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo '"'.$row['password'].'"';
                                        ?> class="required" />
                                </div>      
                                <div>
                                    <span>Address</span>
                                    <textarea name="addr" maxlength="100" cols="5" placeholder=<?php 
                                        $un=$_SESSION['username'];
                                        $query="select * from customers where username='$un'";
                                        $query_run=mysqli_query($con,$query);
                                        $row = mysqli_fetch_array($query_run);
                                        echo '"'.$row['address'].'"';
                                        ?>></textarea>
                                </div>                     
                                <input type="submit" Value="Save" name="save_submit" />
                            </form>                
                            <?php 
                                if(isset($_POST['save_submit']))
                                {                               
                                    $username=$_SESSION['username'];                                  
                                    $name=$_POST['cname'];
                                    $phone=$_POST['phone'];
                                    $email=$_POST['email'];
                                    $password=$_POST['password'];
                                    $cpassword=$_POST['cpassword'];
                                    $addr=$_POST['addr'];
                                    if($password==$cpassword){
                                        $query="update customers set cname = '$name',phone = '$phone',email = '$email',password = '$password',address = '$addr' where username = '$un'";
                                        $query_run=mysqli_query($con,$query); 
                                    }               
                                    if($query_run)
                                            echo '<script type="text/javascript"> alert("Update Successful!! Reload To See Changes") </script>';       
                                    else
                                        echo '<script type="text/javascript"> alert("Some Error Occured") </script>';  
                                                                    
                                }
                                
                    ?>
					    </div>
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