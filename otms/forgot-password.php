<?php session_start();
error_reporting(0);
include('includes/config.php');


if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Password successfully changed');</script>";

   }
     
    }
    else{
    
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Forgot Password</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="study">
		<div class="container">
			<h2>Forgot Password!!</h2>
					<h5>Reset your password and Fill below details.</h5>

					<form class="row contact_us_form"action="" method="post" name="changepassword" onsubmit="return checkpass();">
							<div class="form-group col-md-12">
								 <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required="true">
							</div>
             <div class="form-group col-md-12">
                 <input type="text" class="form-control" name="contactno" placeholder="Contact Number" required="true" pattern="[0-9]+">
              </div>
              <div class="form-group col-md-12">
                 <input type="password" class="form-control" id="userpassword" name="newpassword" placeholder="New Password">
              </div>
              <div class="form-group col-md-12" style="padding-top: 20px;">
                <input type="password" class="form-control" id="userpassword" name="confirmpassword" placeholder="Confirm Password">
              </div>
              
							<div class="form-group col-md-12">
								<button type="submit" value="submit" name="submit" class="btn btn-success">Reset</button>
							</div>
              <div class="form-group col-md-12">
                <a href="register.php" class="btn btn-success"><i class="ft-user"></i> Register</a> <strong>Register with us!!!!</strong>
              </div>
              <div class="form-group col-md-12">
                <a href="register.php" class="btn btn-success"><i class="ft-user"></i> Login</a> 
              </div>
						</form>	
		</div>
	</div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html>