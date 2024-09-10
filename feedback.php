
<?php
include 'assets/fetch_userdata.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!-------------------Tab Section------------------>
<?php include 'tabbar.php'; ?>

<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Help Card
  </div>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Enter your message</h5>
            <textarea class="form-control" name="msg" required placeholder="Write your message"></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
          </div>
      </form>
      
    <br>
  
    <?php
    if (isset($_POST['send']))
    {
      if ($con->query("insert into feedback (message,userId) values ('$_POST[msg]','$_SESSION[userId]')")) {
        echo "<div class='alert alert-success'>Successfully Sent, Thank you for contacting us </div>";
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
    }
    
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