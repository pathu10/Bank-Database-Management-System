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
        <h3>Your account Information </h3>
      </div>
      <div class="card-body">
        <table class="table table-striped table-dark w-75 mx-auto">
          <thead>
            <tr> 
              <th scope="col">Account No.</th>
              <th scope="col"><?php echo $userData['accountNo']; ?></th>
            </tr>
            <tr> 
              <th scope="col">Name: </th>
              <th scope="col"><?php echo $userData['name']; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Branch Code</th>
              <td><?php echo $userData['branch']; ?></td>
            </tr>
            <tr>
              <th scope="row">Account Type</th>
              <td><?php echo $userData['accountType']; ?></td>
            </tr>
            <tr>
              <th scope="row">Current Balance</th>
              <td><b><?php echo $userData['balance']; ?></b></td>
            </tr>
            <tr>
              <th scope="row">Account Created</th>
              <td><?php echo $userData['date']; ?></td>
            </tr>
            <tr class="table table-striped table-light w-75 mx-auto">
              <td></td> <td></td>
            </tr>
            <tr>
              <th scope="row">Loan Type</th>
              <td><?php echo $userData['loantype']; ?></td>
            </tr>
            <tr>
              <th scope="row">Loan Amount Remaining</th>
              <td><?php echo $userData['loan']; ?></td>
            </tr>
            <tr>
              <th scope="row">Card Type</th>
              <td> <?php echo $userData['card']; ?> </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-------------------Footer------------------>
      <div class="card-footer text-muted">
        <?php include 'logo_with_name.php'; ?>
      </div>
    </div>
  </div>
</body>
</html>