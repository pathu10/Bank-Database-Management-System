<?php
session_start();
if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'files_to_import.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from useraccounts where id = '$_GET[id]'"))
    {
      header("location:mindex.php");
    }
  } ?>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!------------Manager Tab bar-------->
<?php include 'manager_tabbar.php'; ?>

<?php 
  $array = $con->query("select * from useraccounts,branch where useraccounts.id = '$_GET[id]' AND useraccounts.branch = branch.branchId");
  $row = $array->fetch_assoc();
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account profile for <?php echo $row['name'];echo "<kbd>#";echo $row['accountNo'];echo "</kbd>"; ?>
  </div>
  <div class="card-body">
    <table class="table  table-bordered">
      <tbody>
        <tr>
        <td >Name</td>
          <th ><?php echo $row['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['accountNo'] ?></th>
        </tr><tr>
          <td>Branch Name</td>
          <th><?php echo $row['branchName'] ?></th>
          <td>Branch Code</td>
          <th><?php echo $row['branchNo'] ?></th>
        </tr><tr>
          <td>Current Balance</td>
          <th>₹<?php echo $row['balance'] ?></th>
          <td>Account Type</td>
          <th><?php echo $row['accountType'] ?></th>
        </tr><tr>
          <td>Aadhar</td>
          <th><?php echo $row['aadhar'] ?></th>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $row['number'] ?></th>
          <td> Card Type </td>
          <th> <?php echo $row['card'] ?></th>
        </tr>
        <tr> <th colspan=4></th></tr>
        <tr>
        <td>Loan Amount Remaining</td>
          <th>₹<?php echo $row['loan'] ?></th>
          <td>Loan Type</td>
          <th><?php echo $row['loantype'] ?></th>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
  <?php include 'logo_with_name.php'; ?>
  </div>
</div>

</body>
</html>