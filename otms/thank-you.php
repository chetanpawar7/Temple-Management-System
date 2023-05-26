<?php session_start();
include('includes/config.php');

error_reporting(0);


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Temple Pass System | | Thank You</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="study">
		<div class="container">
			<h2>“Thank you for applying for darshan. Your Booking no is <?php echo $_SESSION['bookingnum'];?>”</h2>	
		</div>
	</div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html>