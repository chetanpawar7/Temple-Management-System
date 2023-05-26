<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['otmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    
   $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$uid'");
    if ($query) {


 echo '<script>alert("Your profile has been updated")</script>'; 
  
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Profile</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- contact -->
	<div class="contact">
	<div class="container">
		<h2>Update your profile</h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<?php
$uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
								<div class="contact-form-row">
									
								
									<div>
									
										<span>First Name :</span>
										<input type="text" class="form-control" id="firstname" name="firstname" value="<?php  echo $row['FirstName'];?>" required="true">
									</div>
									<div>
										
										<span>Last Name :</span>
										<input type="text" class="form-control" id="lastname" name="lastname" value="<?php  echo $row['LastName'];?>" required="true">
									</div>
									<div>
										
										<span>Email address :</span>
										<input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
									</div>
									<div>
										<br>
										<span>Mobile Number :</span>
										<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  readonly="true">
									</div>
									<div>
										<br>
										<span>Registraton Date:</span>
										<input type="text" class="form-control" id="regdate" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true">
									</div>
									
									<div class="clearfix"> </div>
								</div><?php } ?>
								<div class="clearfix"> </div>
								
								<input type="submit" value="Update" name="submit">
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