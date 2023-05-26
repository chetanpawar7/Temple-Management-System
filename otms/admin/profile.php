<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['aid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    
    echo '<script>alert("Admin profile has been updated.")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System || Profile</title>
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin Profile</h4>
                 
                  <form class="forms-sample" method="post">
                    <?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Admin Name</label>
                      <input type="text" class="form-control" name="adminname" id="adminname" value="<?php  echo $row['AdminName'];?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" name="username" id="username" value="<?php  echo $row['UserName'];?>" readonly="true" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number</label>
                      <input type="text"  class="form-control" id="contactnumber" name="contactnumber" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength='10' patter='[0-9]+'  />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" class="form-control" value="<?php  echo $row['Email'];?>" readonly='true' />
                    </div>
                   <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Registration Date</label>
                      <input type="text" class="form-control" value="<?php  echo $row['AdminRegdate'];?>" readonly="true" />
                    </div><?php } ?>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
                  </form>
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
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html><?php } ?>
