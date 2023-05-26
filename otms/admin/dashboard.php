<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Temple Pass System|| Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller d-flex">
   
    <?php include_once('includes/sidebar.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
         
          <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query1=mysqli_query($con,"Select * from  tblbookdarshan where Status='' || Status is null");
$newbooking=mysqli_num_rows($query1);
?>
                      <h5 class="text-white font-weight-bold"> New Darshan Booking- <?php echo $newbooking;?></h5>
                      <a href="new-booking.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query2=mysqli_query($con,"Select * from  tblbookdarshan where Status='Accepted'");
$acceptedbooking=mysqli_num_rows($query2);
?>
                      <h5 class="text-white font-weight-bold">Accepted Darshan Booking- <?php echo $acceptedbooking;?></h5>
                      <a href="accepted-booking.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query3=mysqli_query($con,"Select * from  tblbookdarshan where Status='Rejected'");
$rejectedbooking=mysqli_num_rows($query3);
?>
                     <h5 class="text-white font-weight-bold"> Rejected Darshan Booking- <?php echo $rejectedbooking;?></h5>
                      <a href="rejected-booking.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query4=mysqli_query($con,"Select * from  tbldonation");
$totaldonation=mysqli_num_rows($query4);
?>
                      <h5 class="text-white font-weight-bold">Total Donation- <?php echo $totaldonation;?></h5>
                      <a href="view-donation.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query5=mysqli_query($con,"Select * from  tbltemple ");
$totaltemple=mysqli_num_rows($query5);
?>
                      <h5 class="text-white font-weight-bold">Total Temple- <?php echo $totaltemple;?></h5>
                      <a href="manage-temple.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query6=mysqli_query($con,"Select * from  tblfestivals");
$totfesti=mysqli_num_rows($query6);
?>
                     <h5 class="text-white font-weight-bold">Total Festivals- <?php echo $totfesti;?></h5>
                      <a href="manage-festival.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php $query7=mysqli_query($con,"Select * from  tbluser");
$totuser=mysqli_num_rows($query7);
?>
                     <h5 class="text-white font-weight-bold">Total Reg Devotees- <?php echo $totuser;?></h5>
                      <a href="reg-devotees.php"><p class="mt-2 text-white card-text">View Detail</p></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
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
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>