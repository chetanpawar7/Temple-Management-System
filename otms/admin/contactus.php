<?php session_start();
error_reporting(0);

include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
   
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
 $mobnum=$_POST['mobnum'];
     $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$mobnum' where  PageType='contactus'");
    if ($query) {
 
    echo '<script>alert("Contact Us has been updated.")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System || Contact Us Page</title>
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
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
                  <h4 class="card-title">Contact Us</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                   <?php
                
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Page Title</label>
                      <input id="pagetitle" name="pagetitle" type="text" class="form-control" required="true" value="<?php  echo $row['PageTitle'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Page Description</label>
                      <textarea class="form-control" name="pagedes" id="pagedes" rows="5"><?php  echo $row['PageDescription'];?></textarea>
                    </div>
                   <div class="form-group">
                      <label for="exampleInputUsername1">Email Addresss</label>
                     <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Mobile Number</label>
                     <input type="text" class="form-control" name="mobnum" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength="10" pattern='[0-9]+'>
                    </div>

                  <?php } ?>
                   
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
