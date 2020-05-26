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
	<div>
	<div class="about-top-grids">
		<div class="container">   
	        <center><img class="avatar" src="../images/avatar.jpg"></center>
            <form class="myform" action="localadd.php" method="post">
                <label><b>New district Name</b></label>
                <br>
                <input type="text" name="distr" class="ipvalues" onkeyup="this.value=this.value" placeholder="district name" required/>
                <br>
                <br>
                <input type="submit" name="submit_btn" id="register-button" value="Add" />
                <a href="index.php"><input type="button" id="back-button" value="<<Go Back" /></a>
                <br>
            </form>
        <?php
            if(isset($_POST['submit_btn']))
            {
                    $distr=$_POST['distr'];               
                    $query="select * from district where name = '$distr'";
                    $query_run=mysqli_query($con,$query);                           
                    if(mysqli_num_rows($query_run)>0)
                    {
                        echo '<script type="text/javascript"> alert("district Already Proposed In Service") </script>';
                    }
                    else
                    {
                        $query="insert into district(name) value('$distr')";
                        $query_run=mysqli_query($con,$query);
                        if($query_run)
                            echo '<script type="text/javascript"> alert("district add sucess") </script>';
                        else
                            echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
                    }
                        
            }
        ?>
		</div>
	<div>
			
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