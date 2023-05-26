<?php
include('includes/config.php');
session_start();
error_reporting(0);

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Temple Pass System | | Darshan History</title>
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
	<div class="contact">
    <div class="container">
         
                    <!----- contact-grids ----->        
                    <div class="contact-grids">
                        <div class="col-md-5">
                            <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                            <h3><?php  echo $row['PageTitle'];?></h3>
                                <div class="address">
                                    <h4><?php  echo $row['PageDescription'];?>.</h4> 
                                   
                                  
                                  
                                </div>
                        </div><?php } ?>
                        <div class="col-md-7">
                            <div class="contact-map">
                               <img src="images/place-2016-10-20-9-2debe815231bfc6ee1046e0b27a3e84b.jpg" width="700">
                            </div>
                        </div>
                            <div class="clearfix"> </div>
                      
                    </div>
                    <!----- contact-grids ----->
            
        </div>
    </div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html>