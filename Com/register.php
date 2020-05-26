<?php 
session_start();
if(isset($_SESSION['username']))
			{
				header('location:index.php');
			}
else if(isset($_SESSION['empusername']))
			{
				header('location:index.php');
			}	
else
	{
		
	}	
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
        <title>Register | TYC</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <script src="js/jquery-1.8.3.js"></script>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="css/validate.css" />
        <script type='text/javascript' src="js/jquery.validate.js"></script>
        <script src="js/common.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
        $("#register").validate();
        });
        </script>
</head>
<body>
<div class="header  about-head "  >
        <div class="container">
                
                <div class="logo">
                    <img src="images/logo45.png" alt="Logo"  /> <a href="index.php"><span></span>TYC</a>
                </div>
                

<div class="top-nav">
    <span class="menu"> </span>
    <ul>
        <li ><a href="index.php">Home</a></li>
        
        <li ><a href="contact.php">Contact</a></li>
                <li ><a href="login.php">Login</a></li>
        <li class="active" ><a href="register.php">Register</a></li>
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
                <h1>Register</h1>
            </div>
            <div class="breadcrumbs-right">
                <ul>
                    <li><a href="index.php">Home</a> <label>:</label></li>
                    <li>Register</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="about-top-grids">
    <div class="container">
        <div class="contact-grids">
            <div class="contact-right">
                <h2>Registration</h2>
                
               
                <form name="register" id="register" method="post" action="register.php">
                    <div>
                        <span>I Am</span>
                        <select name="user_type" class="required">
                            <option value="">Select Account Type</option>
                            <option value="customer"  >Customer</option>
                            <option value="employee" >Employee</option>
                        </select>
                    </div>
                    <div>
                    	<span>User Name</span>
                        <input type="text" name="username" maxlength="30" value="" class="required" />
                        <span>Name</span>
                        <input type="text" name="name" maxlength="30" value="" class="required" />
                    </div>
                    <div>
                        <span>Mobile</span>
                        <input type="text" name="phone" maxlength="10" minlength="10" value="" class="required digits" />
                    </div>
                    <div>
                        <span>Email</span>
                        <input type="email" name="eml" maxlength="50" value="" class="required" />
                    </div>
                    <div>
                        <span>Password</span>
                        <input type="password" name="password" maxlength="40" value="" class="required" />
                    </div>
                    <div>
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword" maxlength="40" value="" class="required" />
                    </div>
                    <div>
                        <span>Address</span>
                        <textarea name="addr" maxlength="100" cols="5" ></textarea>
                    </div>
                    
                    <div>
                        <span>district</span>
                        <select name="city" id="city" class="input_long required" >
                            <option value="">--Select--</option>
                                <?php 
                                    $query="select * from district";
                                        $query_run=mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($query_run)){	
                                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";}
                                ?>
							</select>
                    </div>
                    <input type="submit" Value="Register" name="register_submit" />
                </form>                
									<?php 
										if(isset($_POST['register_submit']))
										{
											$user_type=$_POST['user_type'];
                                            $username=$_POST['username'];
											$password=$_POST['password'];
											$cpassword=$_POST['cpassword'];
											$phno=$_POST['phone'];
											$pname=$_POST['name'];
											$eml=$_POST['eml'];
											$addr=$_POST['addr'];
											$city=$_POST['city'];
											
											if($user_type=="employee")
												{
													
													if($password==$cpassword)
													{
														$query="select * from employee where username='$username'";
														$query_run=mysqli_query($con,$query);
														if(mysqli_num_rows($query_run)>0)
														{
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{			
                                                            $query="insert into employee (username,password,name,status,phone,email,address,work_location) values ('$username','$password','$pname','0','$phno','$eml','$addr','$city')";
                                                            $query_run=mysqli_query($con,$query);
                                                            if($query_run)
                                                                echo '<script type="text/javascript"> alert("Registration Successful!! Verify from admin, Go to Login Page") </script>';
                                                            else
                                                                echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
                                                        }
													}		
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
                                                }
											else
												{
													if($password==$cpassword)
													{
														$query="select * from customers where username='$username'";
														$query_run=mysqli_query($con,$query);
														
														if(mysqli_num_rows($query_run)>0)
                                                        {
															echo '<script type="text/javascript"> alert("User Already Exists... Try another username") </script>';
														}
														else
														{
															
														$query="insert into customers(username,password,cname,phone,email,address,city) values('$username','$password','$pname','$phno','$eml','$addr','$city')";
														$query_run=mysqli_query($con,$query);
														if($query_run)
															echo '<script type="text/javascript"> alert("Registration Successful!! Go to Login Page") </script>';
														else
															echo '<script type="text/javascript"> alert("Some Error Occured") </script>';
														}
													}
													else
														echo '<script type="text/javascript"> alert("Error Passwords Don\'t Match") </script>';
                                                }   
                                        }
										
									?>
            </div>
            <div class="clearfix"> </div>
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
