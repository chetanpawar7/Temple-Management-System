<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$tname=$_POST['tname'];
$tlocation=$_POST['tlocation'];

$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$description=$_POST['description'];
$id=intval($_GET['id']);

$sql=mysqli_query($con,"update tbltemple set TempleName='$tname',TempleLocation='$tlocation',City='$city',State='$state',Country='$country',Description='$description' where ID='$id'");
echo "<script>alert('Temple detail has been updated successfully');</script>";
echo "<script>window.location.href='manage-temple.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System || Update Temple</title>
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
                  <h4 class="card-title">Update Temple</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from tbltemple where ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <input type="text" class="form-control" name="tname" id="tname" value="<?php echo  htmlentities($row['TempleName']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Location</label>
                      <input type="text" class="form-control" name="tlocation" id="tlocation" value="<?php echo  htmlentities($row['TempleLocation']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"  class="form-control" id="city" name="city" value="<?php echo  htmlentities($row['City']);?>" required='true'/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">State</label>
                      <input type="text" class="form-control" id="state" name="state" class="form-control" value="<?php echo  htmlentities($row['State']);?>" required='true' />
                    </div>
                   <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="<?php echo  htmlentities($row['Country']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" value="" required='true' /><?php echo  htmlentities($row['Description']);?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Temple Featured Image</label>
                      <img src="templeimages/<?php echo htmlentities($row['TempleImage1']);?>" width="250">
    <a href="change-image1.php?id=<?php echo $row['ID'];?>">Change Image</a>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Temple Image2</label>
                      <img src="templeimages/<?php echo htmlentities($row['TempleImage2']);?>" width="250">
    <a href="change-image2.php?id=<?php echo $row['ID'];?>">Change Image</a>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Featured Image3</label>
                      <img src="templeimages/<?php echo htmlentities($row['TempleImage3']);?>" width="250">
    <a href="change-image3.php?id=<?php echo $row['ID'];?>">Change Image</a>
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
