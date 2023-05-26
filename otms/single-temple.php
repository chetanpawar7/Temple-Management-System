<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Temple Pass System || Temples</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- prayer -->
	<div class="prayer">
		<div class="container">
			<?php
			$tid=$_GET['tid'];
$ret=mysqli_query($con,"select *from  tbltemple where ID= $tid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			<h2>Details of <?php echo  htmlentities($row['TempleName']);?></h2>
			
			<div class="prayer-top">
				
					<p><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" height="300" width="300"/></p>
					<p><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage2']);?>" class="img-responsive" alt="" height="300" width="300" /></p>
					<p><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage3']);?>" class="img-responsive" alt="" height="300" width="300"/></p>
				</div>
				<div class="col-md-8 prayer-right">
				<h3><?php echo  htmlentities($row['TempleName']);?></h3>
					<h6><?php echo  htmlentities($row['City']);?> (<?php echo  htmlentities ($row['State']);?>), <?php echo  htmlentities($row['Country']);?></h6>
					<p><?php echo  htmlentities($row['Description']);?></p>
					<a href="book-darshan.php?darshanbookid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-success">Darshan Booking</a>
					<a href="donation.php?donationid=<?php echo  htmlentities($row['ID']);?>" class="btn btn-info">Donation</a>
					
				</div>
				<div class="clearfix"> </div>
			</div><?php 
$cnt=$cnt+1;
}?>
			
			
		</div>
	</div>
	<!-- prayer -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>