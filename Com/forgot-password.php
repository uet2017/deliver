<!DOCTYPE HTML>
<html>
<head>
    <title>Forgot-password</title>
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
                        
                    });
                    });
            </script>
        </div>
        <div class="about-top-grids">
            <h1> please contact to admin</h1>
            
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
                            <li><a href="about-us.php">About Us</a> </li>
                            <li><a href="privacy-policy.php">Privacy Policy</a> </li>
                            <li><a href="terms-and-condition.php">Terms & Conditions</a> </li>
                            <li><a href="faq.php">Help & FAQs</a> </li>
                            <li><a href="contact.php">Contact Us</a> </li>
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
