<?php include 'assets/fetch_userdata.php'; ?>
<!DOCTYPE html>
<html>
<head> </head>
<body style="background: url(images/bg.png); background-size: 100%">
  <!-------------------Tab Section------------------>
  <?php include 'tabbar.php'; ?>

  <!-------------------Contents------------------>
  <div class="container">
    <div class="card  w-75 mx-auto">
      <div class="card-header text-center">
        <b> Transaction made against you account </b>
      </div>
      <div class="card-body">
        <?php 
          $array = $con->query("select * from transaction where userId = '$userData[id]' order by date desc");
          if ($array ->num_rows > 0) 
          {
            while ($row = $array->fetch_assoc()) 
            {
                if ($row['action'] == 'withdraw') 
                {
                  echo "<div class='alert alert-secondary'>You withdraw Rs.$row[debit] from your account at $row[date]</div>";
                }
                if ($row['action'] == 'deposit') 
                {
                  echo "<div class='alert alert-success'>You deposit Rs.$row[credit] in your account at $row[date]</div>";
                }
                if ($row['action'] == 'loan') 
                {
                  echo "<div class='alert alert-success'>Loan amount Rs.$row[credit] has been sancationed at $row[date]</div>";
                }
                if ($row['action'] == 'payloan') 
                {
                  echo "<div class='alert alert-danger'> Rs.$row[credit] has been paid for loan on $row[date]</div>";
                }
                if ($row['action'] == 'transfer') 
                {
                  echo "<div class='alert alert-warning'>Transfer have been made for  Rs.$row[debit] from your account at $row[date] in  account no.$row[other]</div>";
                }
            }
          } 
        ?>  
      </div>

      <!-------------------Footer------------------>
      <div class="card-footer text-muted">
          <?php include 'logo_with_name.php'; ?>
      </div>
    </div>
  </div>
</body>
</html>