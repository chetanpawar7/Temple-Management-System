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
                 <form class="forms-sample" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Search Devotee By Name / Mobile no</label>
                      <input type="text" id="searchdata" name="searchdata" class="form-control" required="required" autofocus="autofocus" >
                    </div>
                   
                   
                    <button type="submit" name="search" class="btn btn-info btn-min-width mr-1 mb-1">Search</button>
                   
                  </form>
                  <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
                    <table class="table table-bordered">
<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                        <tr>
                          <th>
                            #
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
                            Registration Date
                          </th>
                         
                        </tr>
                      <tbody>
                        <?php
   

                         $query=mysqli_query($con,"select * from tbluser where MobileNumber like '$sdata%' || FirstName like '$sdata%' ");
                         $num=mysqli_num_rows($query);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                        <tr class="table-info">
                          
                          <th>
                            <?php echo htmlentities($cnt);?>
                          </th>
                        
                         
                          <td>
                            <?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['Email']);?>
                          </td>
                          <td>
                            <?php echo htmlentities($row['MobileNumber']);?>
                          </td>
                        
                                       
                           <td>
                           <?php echo htmlentities($row['RegDate']);?>
                                            
                          </td>
                          
                        </tr>
                         <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
                      </tbody>
                    </table>
                    
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
