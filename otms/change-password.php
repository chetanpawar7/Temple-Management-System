<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
{
$userid=$_SESSION['otmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");

 echo '<script>alert("Your password successully changed")</script>'; 
} else {

 echo '<script>alert("Your current password is wrong")</script>';

}



}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Donation</title>
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
<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- contact -->
	<div class="contact">
	<div class="container">
		<h2>Change Password</h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post" name="changepassword" onsubmit="return checkpass();">
								
								<div class="contact-form-row">
									
								
									<div>
									
										<span>Current Password :</span>
										<input type="password" class="form-control" id="currentpassword" name="currentpassword" value="" required="true">
									</div>
									<div>
										
										<span>New Password :</span>
										<input type="password" class="form-control" id="newpassword" name="newpassword" value="" required="true">
									</div>
									<div>
										
										<span>Confirm Password :</span>
										<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value=""  required="true">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								
								<input type="submit" value="send" name="submit">
							</form>
						</div>
						<!----- contact-form ------>
					</div>
					<!----- contact-grids ----->
			
		</div>
	</div>
	<!-- contact -->		
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>