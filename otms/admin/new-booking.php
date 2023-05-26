<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:login.php');
}
else{


  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Temple Pass System || New Darshan Booking</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:partials/_sidebar.html -->
    <?php include_once('includes/sidebar.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" align="center">New Darshan Booking</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Booking Number
                          </th>
                           <th>
                            Temple Name
                          </th>
                          <th>
                            Darshanarthi(Devotee) Name
                          </th>
                          
                          <th>
                            Darshanarthi(Devotee) Email
                          </th>
                          <th>
                            Darshanarthi(Devotee) Mobile Number
                          </th>
                         <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      <tbody>
                        <?php
                        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

    $total_records_per_page =10;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblbookdarshan where tblbookdarshan.Status='' || tblbookdarshan.Status is null");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

                         $query=mysqli_query($con,"select tbluser.ID as uid,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email,tbltemple.ID as tid,tbltemple.TempleName,tblbookdarshan.ID as bid,tblbookdarshan.BookingNumber,tblbookdarshan.UserID,tblbookdarshan.TempleID,tblbookdarshan.DateofDarshan,tblbookdarshan.TimeofDarshan,tblbookdarshan.TotalMember,tblbookdarshan.City,tblbookdarshan.State,tblbookdarshan.Country,tblbookdarshan.IdentityProof,tblbookdarshan.IdentityProofnumber,tblbookdarshan.Message,tblbookdarshan.BookingDate,tblbookdarshan.Status from tblbookdarshan join tbluser on tbluser.ID=tblbookdarshan.UserID join tbltemple on tbltemple.ID=tblbookdarshan.TempleID where tblbookdarshan.Status='' || tblbookdarshan.Status is null  LIMIT $offset, $total_records_per_page");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                        <tr class="table-info">
                          
                          <td>
                            <?php echo htmlentities($cnt);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['BookingNumber']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['TempleName']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['Email']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['MobileNumber']);?>
                          </td>
                        <?php if($row['Status']==""){ ?>

                     <td width="200"><label class="badge badge-warning"><?php echo "Not Updated Yet"; ?></label></td>
                     <?php } elseif($row['Status']=="Accepted") { ?>
                      <td><label class="badge badge-success"><?php  echo $row['Status'];?></label></td><?php } else{?> 
                         <td><label class="badge badge-danger"><?php  echo $row['Status'];?></label></td>
                       <?php } ?>
                                        
                           <td>
                            <a href="view-booking-details.php?id=<?php echo $row['bid']?>" class="btn-sm btn-primary">View</a>
                                            
                          </td>
                          <?php $cnt=$cnt+1; } ?>
                        </tr>
                      </tbody>
                    </table>
                    <hr />
                    <ul id="pagination">
    
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <?php include_once('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

</html><?php } ?>
