<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     
     echo "<script type='text/javascript'> document.location ='resetpassword.php'; </script>";
    }
    else{
      echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System|| Forgot Password</title>
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
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <h4 style="color: green;">**Temple Pass System**</h4>
              </div>
              <h4>Forgot Password!</h4>
              <h6 class="font-weight-light">Fill the details!</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label for="username">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email"  class="form-control form-control-lg border-left-0" placeholder="Email" name="email" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Mobile Number</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                   <input type="text" class="form-control form-control-lg border-left-0" placeholder="Mobile Number" required="" name="contactno" maxlength="10" pattern="[0-9]{10}">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                  <a href="login.php" class="auth-link text-black">Signin!!</a>
                </div>
                <div class="my-3">
                  <button type="submit" name="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Reset</button>
                </div>

           
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-black font-weight-medium text-center flex-grow align-self-end">Temple Pass System</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
</body>

</html>
