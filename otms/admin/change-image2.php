<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
  $id=intval($_GET['id']);
$image2=$_FILES["image2"]["name"];
$extension2 = substr($image2,strlen($image2)-4,strlen($image2));
$imgnewfile2=md5($image2.time()).$extension2;
move_uploaded_file($_FILES["image2"]["tmp_name"],"templeimages/".$imgnewfile2);


$sql=mysqli_query($con,"update tbltemple set TempleImage2='$imgnewfile2' where ID='$id'");
echo "<script>alert('Temple Image has been updated successfully');</script>";
echo "<script>window.location.href='manage-temple.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System || Update Temple Image</title>
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
                  <h4 class="card-title">Update Temple Image</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from tbltemple where ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <input type="text" class="form-control" name="tname" id="tname" value="<?php echo  htmlentities($row['TempleName']);?>" readonly='true' />
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Old Temple Featured Image</label>
                      <img src="templeimages/<?php echo htmlentities($row['TempleImage2']);?>" width="250">
    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputConfirmPassword1">New Temple Featured Image</label>
                      <input type="file" class="form-control" id="image2" name="image2" value="" required='true' />
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
