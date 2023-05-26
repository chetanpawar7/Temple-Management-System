<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <h4 style="color: white; padding-right: 20px;padding-left: 20px;">Temple Pass System</h4>
          </div>
          <?php
$admid=$_SESSION['aid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$admid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block" style="color: red;">Time: <?php
  date_default_timezone_set('Asia/Kolkata');
  echo $runningTime = date('h:i:s');
?></h4>
            </li>
            <li class="nav-item dropdown mr-1">
              <?php
$ret1=mysqli_query($con,"select tbluser.FirstName,tblbookdarshan.ID,tblbookdarshan.BookingNumber,BookingDate from tblbookdarshan join tbluser on tbluser.ID=tblbookdarshan.UserId where tblbookdarshan.Status is null || tblbookdarshan.Status=''");
$num=mysqli_num_rows($ret1);

?>
              <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-calendar mx-0"></i>
                <span class="count bg-info"><?php echo $num;?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Darshan Booking</p>
                <?php while ($rows=mysqli_fetch_array($ret1)) {
?>
                <a class="dropdown-item preview-item" href="view-booking-details.php?id=<?php echo $rows['ID'];?>">
                  <div class="preview-thumbnail">
                      <img src="images/temple.png" alt="image" class="profile-pic">
                  </div>

                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal"><?php echo $rows['FirstName'];?>
                    </h6>
                    <p class="font-weight-light small-text text-muted mb-0">
                    <?php echo $rows['BookingDate'];?>
                    </p>
                  </div>
                </a>
    <?php }  ?>
      
              </div>
            </li>

          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                         <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" style="color:#000">Welcome back, <?php echo $name; ?></h4>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/administrator.png" alt="profile"/>
                <span class="nav-profile-name"><?php echo $name; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a href="profile.php" class="dropdown-item">
                   <i class="mdi mdi-account menu-icon"></i>
                  Profile
                </a>
                <a href="change-password.php" class="dropdown-item">
                  <i class="mdi mdi-settings text-primary"></i>
                  Settings
                </a>
                <a href="logout.php" class="dropdown-item">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
        
          </ul>
        </div>
      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
<div id="runningTime"></div>
 
<script type="text/javascript">
$(document).ready(function() {
 setInterval(runningTime, 1000);
});
function runningTime() {
  $.ajax({
    url: 'timeScript.php',
    success: function(data) {
       $('#runningTime').html(data);
     },
  });
}
</script>