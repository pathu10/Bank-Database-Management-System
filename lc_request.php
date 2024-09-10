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
    if ($con->query("delete from loan_request where l_id = '$_GET[delete]'"))
    {
      header("location:mindex.php");
    }
  }
  else if (isset($_GET['accept'])) 
    {
        $loan_id = $_GET['accept'];
        $query = "SELECT * FROM loan_request WHERE l_id = '$loan_id'";
        $result = $con->query($query);
        if ($result->num_rows > 0) 
        {
          $row = $result->fetch_assoc();
          $accountNo = $row['accountNo'];
          $loanAmount = $row['l_amount'];
          $loanType = $row['loanType'];
          $loanTerm = $row['term']; 
          
          // Define interest rate based on loan type
          if ($loanType === "educational") {
              $interestRate = 0.075; // Set interest rate for educational loan to 7.5%
          } else if ($loanType === "vehicle") {
              $interestRate = 0.09; // Example interest rate for vehicle loan (9%)
          } else if ($loanType === "house") {
              $interestRate = 0.0988; // Example interest rate for home loan (9.88%)
          }
          
          // Define term based on loan duration
          $term = 0;

          // Define term based on loan duration
          if ($loanTerm === "6 months") {
              $term = 6; 
          } else if ($loanTerm === "1 year") {
              $term = 12;
          } else if ($loanTerm === "5 years") {
              $term = 60;
          }

          // Calculate loan amount based on loan amount, term, and interest rate
          $loan = $loanAmount + (($loanAmount * $term * $interestRate)/12);
          
          // Update the user account with the calculated loan amount and loan type
          $con->query("UPDATE useraccounts SET loan = '$loan', loantype = '$loanType' WHERE accountNo = '$accountNo'");
          
            // Once added, you may want to remove the loan request, uncomment below to delete the loan request
            $con->query("DELETE FROM loan_request WHERE l_id = '$loan_id'");
            $con->query("INSERT INTO notice (notice,userId) values ('Your Loan has been Sanctioned, for more details visit nearest VBP Branch','$loan_id')");
            $con->query("INSERT INTO transaction (action,credit,other,userId) values ('loan','$loanAmount','$accountNo','$loan_id')");
            $con->query("DELETE FROM loan_request WHERE l_id = '$loan_id'");
            header("location:lc_request.php"); // Redirect to same page
        }
    } 
  ?>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!------------Manager Tab bar-------->
<?php include 'manager_tabbar.php'; ?>

<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    <b> LOAN REQUESTS </b>
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">Loan Type</th>
      <th scope="col">Loan Amount</th>
      <th scope="col">Term</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<tbody>
    <?php
      $i=0;
      $array = $con->query("select * from useraccounts,loan_request where useraccounts.id = loan_request.l_id");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        { $i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['accountNo'] ?></td>
        <td><?php echo $row['loanType'] ?></td>
        <td><?php echo $row['l_amount'] ?></td>
        <td><?php echo $row['term'] ?></td>
        <td>
          <a href="lc_request.php?accept=<?php echo $row['l_id'] ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="Accept the request">Accept</a>
          <a href="mnotice.php?id=<?php echo $row['id'] ?>" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Send notice to this">Send Remark</a>
          <a href="lc_request.php?delete=<?php echo $row['l_id'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this Request">Delete</a>
        </td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>

  <div class="card-footer text-muted">
  <?php include 'logo_with_name.php'; ?>
  </div>
</div>

</body>
</html>