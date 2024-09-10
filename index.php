<?php
include 'assets/fetch_userdata.php';
?> 
<!DOCTYPE html>
<html>
<head>
  <script src="https://kit.fontawesome.com/87f4045376.js" crossorigin="anonymous"></script>
</head>

<body style="background: url(images/bg.png); background-size: 100%">

<!-------------------Tab Section------------------>
<?php include 'tabbar.php'; ?>


<div class="row w-100" >
  <div class="col" style="padding: 22px;padding-top: 0">
    <div class="jumbotron shadowBlack" style="padding: 25px;min-height: 241px;max-height: 241px">
  <h4 class="display-5">Welcome to VBP Bank</h4>
  <p  class="lead alert alert-warning"><b>Latest Notification: 📢</b>

  <?php 
      $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
      if ($array->num_rows > 0)
      {
        $row = $array->fetch_assoc();
        // {
          echo $row['notice'];
        // }
      } 
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?></p>
  
</div>
        <div id="carouselExampleIndicators" class="carousel slide my-2 rounded-1 shadowBlack" data-ride="carousel" >
            <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/slide1.png" alt="First slide" style="max-height: 250px">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slide2.png" alt="Second slide" style="max-height: 250px">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slide3.png" alt="Third slide" style="max-height: 250px">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/slide4.png" alt="Fourth slide" style="max-height: 250px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/acount.jpg" style="max-height: 155px;min-height: 155px" alt="Card image cap">
          <div class="card-body">
            <a href="accounts.php" class="btn btn-outline-primary btn-block">Account Summary</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/mt.jpg" alt="Card image cap" style="max-height: 155px;min-height: 155px">
        <div class="card-body">
          <a href="transfer.php" class="btn btn-outline-primary btn-block">Transfer Money</a>
         </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding: 22px">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/noti.gif" style="max-height: 155px;min-height: 155px" alt="Card image cap">
          <div class="card-body">
            <a href="notice.php" class="btn btn-outline-primary btn-block">Check Notification</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/con2.gif" alt="Card image cap" style="max-height: 155px;min-height: 155px">
        <div class="card-body">
          <a href="feedback.php" class="btn btn-outline-primary btn-block">Contact Us</a>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>