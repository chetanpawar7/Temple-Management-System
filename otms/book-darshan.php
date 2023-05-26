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
  	 $dod=$_POST['dod'];
    $tod=$_POST['tod'];
    $totmem=$_POST['totmem'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $ip=$_POST['ip'];
    $ipnum=$_POST['ipnum'];
    $message=$_POST['message'];
    $bookingnum=mt_rand(100000000, 999999999);
    $_SESSION['bookingnum']=$bookingnum;
    $darshanbookid=$_GET['darshanbookid'];
    $query=mysqli_query($con, "insert into tblbookdarshan(BookingNumber,UserID,TempleID,DateofDarshan,TimeofDarshan,TotalMember,City,State,Country,IdentityProof,IdentityProofnumber,Message) value('$bookingnum','$uid','$darshanbookid','$dod','$tod','$totmem','$city','$state','$country','$ip','$ipnum','$message')");
    if ($query) {


 echo "<script>window.location.href='thank-you.php'</script>"; 
  
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
<title>	Online Temple Management System | | Book Darshan</title>
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
		<h2>Book Darshan</h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<div class="contact-form-row">
									<div>
										<span>Date of Darshan :</span>
										<input type="date" class="form-control" value="" name="dod" required="true" >
									</div>
									<div>
										<span>Time of Darshan :</span>
										<input type="time" class="form-control" value="" name="tod" required="true" >
									</div>
									<br>
									<div>
										<br>
										<span>Total Member :</span>
										<input type="text" class="form-control" value="" name="totmem" required="true">
									</div>
									<div>
										<br>
										<span>City :</span>
										<input type="text" class="form-control" value="" name="city" required="true">
									</div>
									<div>
										<br>
										<span>State :</span>
										<input type="text" class="form-control" value="" name="state" required="true">
									</div>
									<div>
										<br>
										<span>Country :</span>
										<input type="text" class="form-control" value="" name="country" required="true">
									</div>
									<div>
										<br>
										<span>Identity Proof :</span>
										<select type="text" class="form-control"  value="" name="ip" required="true">
											<option value="">Choose Identity Proof</option>
											<option value="Adhar Card">Adhar Card</option>
											<option value="Voter Card">Voter Card</option>
											<option value="Adhar Card">Passport Card</option>
											<option value="Adhar Card">Driving License</option>
										</select>
									</div>
									<div>
										<br>
										<span>Identity Proof Number:</span>
										<input type="text" class="form-control" value="" name="ipnum" required="true">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Message :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>
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