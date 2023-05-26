<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Temple Pass System || Festivals</title>
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
			<h2>Festivals</h2>

			<div class="prayer-top">
				
				<div class="col-md-12 prayer-left">
                    <?php
                if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 5;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblfestivals");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
$ret=mysqli_query($con,"select tbltemple.ID,tbltemple.TempleName,tblfestivals.ID as fid,tblfestivals.TempleID,tblfestivals.FestivalName,tblfestivals.Date,tblfestivals.Day,tblfestivals.Description,tblfestivals.TempleImage1 from  tblfestivals join tbltemple on tbltemple.ID=tblfestivals.TempleID Order by tblfestivals.Date LIMIT $offset, $total_records_per_page");
$cnt=1; ?>


<?php 

while ($row=mysqli_fetch_array($ret)) { ?>

<table class="table table-striped">
    <tr>
        <th width="250"><h3 style="color:blue; font-weight:bold;">Festival Name</h3></th>
        <td colspan="3"><h3 style="color:blue; font-weight:bold;"><?php echo htmlentities($row['FestivalName']);?></h3></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>"  height="300" width="300" style="border: solid #000 1px;"/></td>
        <th>Temple</th>
        <td><?php echo htmlentities($row['TempleName']);?></td>
    <tr>
        <th>Date</th>
        <td><?php echo htmlentities($row['Date']);?></td>
         <th>Day</th>
        <td><?php echo htmlentities($row['Day']);?></td>
    </tr>
    <tr><th>Description</th>
 <td colspan="3"><?php echo htmlentities($row['Description']);?></td>
    </tr></table>
<hr style="color:#000;">
<?php }?>
    


					<?php 
$cnt=$cnt+1; ?>
			</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<ul class="pagination" style="padding-left: 100px;">
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
				
	<?php include_once('includes/footer.php');?>
</body>
</html>