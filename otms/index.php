<?php
include('includes/config.php');
session_start();
error_reporting(0);

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Temple Pass System || Home Page</title>
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
	<!-- slider -->
	<div class="container">
	<div class="confess-top">
			<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<?php
			 
$ret=mysqli_query($con,"select *from  tbltemple");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
								<li>
									
									<div class="confess">
										<div class="col-md-7 confess-left">
											<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" /></a>
										</div>
										<div class="col-md-5 confess-right">
											<h2><?php echo  htmlentities($row['TempleName']);?></h2>
											<p><?php echo  htmlentities($row['Description']);?>.</p>
												<a href="single-temple.php?tid=<?php echo  htmlentities($row['ID']);?>" class="more">View more</a>
										</div>										
											<div class="clearfix"> </div>
									</div>
								</li><?php 
$cnt=$cnt+1;
}?>
							
								<div class="clearfix"> </div>
							</ul>
						</div>
					</section>
				</div>
				</div>
					<!-- FlexSlider -->
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
						<!-- FlexSlider -->
	<!-- slider -->
	<div class="rooted">
	<div class="container">
		<div class="col-md-9 roted-left">
		<div class="grndd">
			<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			<h3><?php  echo $row['PageTitle'];?></h3>
		
			<p><?php  echo $row['PageDescription'];?>.</p>
			<a href="about.php" class="vie">View More</a>
		</div><?php } ?>

			<div class="worsh">
				<h3>Temple Photos</h3>
				<p>It is an gallery of temples. </p>
			<div class="recent">
			<ul id="flexiselDemo3">
				<?php
			 
$ret=mysqli_query($con,"select *from  tbltemple");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
								<li>

									<div class="team1">
										<img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" class="img-responsive" alt="" />
									</div>
								</li><?php 
$cnt=$cnt+1;
}?>
								
								
							
								
							 </ul>
						
						 <script type="text/javascript">
							$(window).load(function() {
								
								$("#flexiselDemo3").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							});
							</script>
							<script type="text/javascript" src="js/jquery.flexisel.js"></script>

	</div>
	<a href="temples.php" class="vie">View All</a>
<!-- recent -->

			</div>
		</div>
		<div class="col-md-3 rooted-right">
			<div class="wor">
				<h3>Temples</h3>
				<ul>
					<li><img src="images/place-2016-10-20-9-2debe815231bfc6ee1046e0b27a3e84b.jpg" width="300" height="300"></li>
					
				</ul>
			</div>
			
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
					</div>
		<div class="clearfix"> </div>
	</div>
	</div>
	<!-- footer -->
	<?php include_once('includes/footer.php');?>
</body>
</html>