<?php 
session_start();

if(isset($_SESSION['admusername']))
		{
		}
	else
	{
		header('location:index.php');
	}			
require '../dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Logged In</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="../js/jquery-1.8.3.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script type="application/x-javascript">
        addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
</head>
<body style="background-color: #deefde">
	<div class="header  about-head "  >
			<div class="container">
				<div class="logo">
						<img src="../images/logo45.png" alt="Logo"  /> <a href="../index.php"><span></span>FastDeliver</a>
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
						<h1> Admin </h1>
					</div>
					<div class="breadcrumbs-right">
						<ul>
							<li><a href="index.php">Home</a> <label>:</label></li>
							<li>Admin</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>

<div id="container">
	<center><h2>Admin Home Page</h2></center>

	<center><h3>Welcome Admin
	</h3></center>
	<center><img class="avatar" src="../images/avatar.jpg"></center>
	<form class="myform" action="admhome.php" method="post">
		<a href="location.php"><input type="button" id="register-button" value="Quản Lý khu vực hoạt động" /></a>
		<br>
		<a href="empview.php"><input type="button" id="register-button" value="QUản Lý Nhân Viên" /></a>
		<br>
		<a href="employverify.php"><input type="button" id="register-button" value="Duyệt nhân viên" /></a>
		<br>
		<a href="custview.php"><input type="button" id="register-button" value="khách hàng"></a>
		<br>
		<a href="orderview.php"><input type="button" id="register-button" value="đơn hàng"></a>
		<br>
		<input type="submit" name="logout" id="logout-button" value="Logout" />
		<br>
		</form>
		<?php
		if(isset($_POST['logout']))
		{ 
			
				if(isset($_SESSION['admusername']))
					{
					$_SESSION = [];
					session_destroy();
					}
					header('location:../index.php');
		}
		?>	
		<br>
</div>
<br>
<br>
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