<?php session_start();
error_reporting(0);

include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$tid=$_POST['tid'];
$fname=$_POST['fname'];
$date=$_POST['date'];
$day=$_POST['day'];
$description=$_POST['description'];
$id=intval($_GET['id']);


$sql=mysqli_query($con,"update tblfestivals set TempleID='$tid',FestivalName='$fname',Date='$date',Day='$day',Description='$description' where ID='$id'");
echo "<script>alert('Festival detail has been updated successfully');</script>";
echo "<script>window.location.href='manage-festival.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Temple Pass System || Update Festival</title>
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
                  <h4 class="card-title">Update Festival</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select tbltemple.TempleName,tblfestivals.ID as fid,tblfestivals.TempleID,tblfestivals.FestivalName,tblfestivals.Date,tblfestivals.Day,tblfestivals.Description,tblfestivals.TempleImage1 from tblfestivals join tbltemple on tbltemple.ID=tblfestivals.TempleID where tblfestivals.ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <select type="text" class="form-control" name="tid" id="tid" value="" required='true' />
                      <option value="<?php echo  htmlentities($row['TempleID']);?>"><?php echo  htmlentities($row['TempleName']);?></option>
                        <?php
      
      $query1=mysqli_query($con,"select * from  tbltemple");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['ID'];?>"><?php echo $row1['TempleName'];?></option>
                  <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Festival</label>
                      <input type="text" class="form-control" name="fname" id="fname" value="<?php echo  htmlentities($row['FestivalName']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="date" class="form-control" name="date" id="date" value="<?php echo  htmlentities($row['Date']);?>" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Day</label>
                      <input type="text"  class="form-control" id="day" name="day" value="<?php echo  htmlentities($row['Day']);?>" required='true'/>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" value="" required='true' /><?php echo  htmlentities($row['Description']);?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Festival Featured Image</label>
                      <img src="templeimages/<?php echo htmlentities($row['TempleImage1']);?>" width="250">
    <a href="change-fimage1.php?id=<?php echo $row['fid'];?>">Change Image</a>
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
