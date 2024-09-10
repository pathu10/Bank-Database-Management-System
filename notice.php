<?php
include 'assets/fetch_userdata.php';
?>

<!DOCTYPE html>
<html>
<head> </head>
<body style="background: url(images/bg.png); background-size: 100%">

<!-------------------Tab Section------------------>
<?php include 'tabbar.php'; ?>

<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    <b> Notification from Bank </b>
  </div>
  <div class="card-body">
    <?php 
      $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
          echo "<div class='alert alert-success'>$row[notice]</div>";
        }
      }
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?>
  </div>
  <div class="card-footer text-muted">
  <img src="images/VBP.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <?php echo bankName ?>
  </div>
</div>

</div>
</body>
</html>