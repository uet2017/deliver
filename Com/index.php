<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:customer');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:employee');
			}			
require 'dbconfig/config.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Home | FastSpeed </title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery-1.8.3.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
    <link href="css/custom.css" rel='stylesheet' type='text/css' />
    <script type='text/javascript' src="js/jquery.validate.js"></script>
    <script type='text/javascript' src="js/common.js"></script>
    <script type="text/javascript">
        $(function() {
        $("#login_form").validate();
        });
    </script>

</head>
<body>
    <div class="header "   style="min-height: 660px;" >
        <div class="container">
            <div class="logo">
                <img src="images/logo45.png" alt="Logo"  /> <a href="index.php"><span></span>FastSpeed</a>
            </div>
            <div class="top-nav">
                <span class="menu"> </span>
                <ul>
                    <li class="active" ><a href="index.php">Home</a></li>
                    <li ><a href="contact.php">Contact</a></li>
                        <li ><a href="#login_form">Login</a></li>
                    <li ><a href="register.php">Register</a></li>
                    <li ><a href=./admin>Admin</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>  
            <script>
                    $( "span.menu" ).click(function() {
                    $( ".top-nav ul" ).slideToggle( "slow", function() {
                        // Animation complete.
                    });
                    });
            </script>
            <div class="banner text-center">
    
            <div class="form_cont">
                <form name="login_form" id="login_form" method="post" autocomplete="off" action="index.php" >
                    <div class="row1"><select name="user_type" class="required">
                        <option value="">Select Account Type</option>
                        <option value="customer"  >Customer</option>
                        <option value="employee" >Employee</option></select>
                    </div>
                    <div class="row1"><input type="text" name="username" placeholder="Type Your username" class="required"/></div>
                    <div class="row1"><input type="password" name="password" maxlength="40" value="" class="required" placeholder="Password" /></div>
                    <div class="row1"><input type="submit" Value="Login" name="login_submit" /></div>
                    <div class="row1"><a href="forgot-password.php">Forgot Password?</a></div>
                </form>
        
                <?php 
                    if(isset($_POST['login_submit']))
                    {                   
                        $username=preg_replace('/[^A-Za-z0-9\-]/', '',$_POST['username']);
                        $password=$_POST['password'];                            
                        $user_type=$_POST['user_type'];
                        if($user_type=="employee")
                            {
                                $query="select * from employee where username='$username' and password='$password'";
                                $query_run=mysqli_query($con,$query);
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    $query2="select * from employee where username='$username' and password='$password' and status=0";
                                    $query_run2=mysqli_query($con,$query2);
                                    if(mysqli_num_rows($query_run2)>0)  
                                    {
                                        echo '<script type="text/javascript"> alert("Employee not verified") </script>';
                                    }
                                    else
                                    {
                                    
                                    $_SESSION['empusername']=$username;
                                    $tqq="select * from employee where username='$username' and password='$password'";
                                    $qrq=mysqli_query($con,$tqq);
                                    $rw2=mysqli_fetch_array($qrq);
                                    $_SESSION['locate']=$rw2['work_location'];
                                    $_SESSION['id']=$rw2['id'];                                   
                                    header('location:employee');
                                    }
                                }
                                else
                                {
                                    //wrong credentials
                                    echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                }
                            }
                        else
                            {

                                $query="select * from customers where username='$username' and password='$password'";
                                $query_run=mysqli_query($con,$query);
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    
                                    $_SESSION['username']=$username;
                                    header('location:customer');
                                    
                                }
                                else
                                {
                                    
                                    echo '<script type="text/javascript"> alert("Sorry, Invalid UserName or Password!!!") </script>';
                                }
                                
                            }
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
                                
                            <li><a href="register.php">Register</a> </li>
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
        <!----start-bottom-footer---->
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
