<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account.")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered.")</script>';

  }
  else
    {
     
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['otmsuid']=$ret['ID'];
     header('location:temples.php');
    }
    else{
   
    echo '<script>alert("Invalid Details.")</script>';
    }
  }
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Temple Pass System || Registration Page</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
</head>
<body>
<?php include_once('includes/header.php');?>
<!---->
				<div class="register">
				<div class="container">
				<h2>Register</h2>
		 
				 <div class="col-md-6  register-top-grid">
					<h3>Personal Information</h3>
					<form method="post" name="signup" onsubmit="return checkpass();">
					<div>
						<span>First Name</span>
						<input type="text" placeholder="First Name" name="firstname" required="true"> 
					</div>
					<div>
						<span>Last Name</span>
						<input type="text"  name="lastname" placeholder="Last Name" required="true">
					 </div>
					 <div>
						 <span>Email Address</span>
						 <input type="text" name="email" placeholder="Email address" required="true">
					</div>
					<div>
						 <span>Mobile Number</span>
						 <input type="text"  name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true">
					</div>
					<div>
						 <span>Password</span>
						 <input type="text" name="password" placeholder="Password" required="true">
					</div>
					<div>
						 <span>Repeat password</span>
						 <input type="text" name="repeatpassword" class="control-form" placeholder="Repeat password" required="true">
					</div>
					   <a class="news-letter" href="#">
						 <button class="btn btn-info" type="submit" name="submit">REGISTER</button>
					   </a>
					   </form>
					 </div>
				     <div class=" col-md-6  register-bottom-grid">
						    <h3>Login Information</h3>
							<form method="post">
								<div>
									<span>UserID</span>
									<input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true">
								</div>
								<div>
									<span>Password</span>
									<input type="text" name="password" placeholder="Password" required="true">
								</div>
								<div>
									<span><a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot Password</span></a>
									
								</div>
								<div class="register-but">
									 <button class="btn btn-success" type="submit" name="login">LOGIN</button>
								</div>
							</form>
						</div>
				<div class="clearfix"> </div>
			</div>	
</div>			
			<?php include_once('includes/footer.php');?>
</body>
</html>