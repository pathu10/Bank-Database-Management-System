<?php
include 'assets/fetch_userdata.php';
// Handle loan application submission
if (isset($_POST['submit'])) {
    // Validate and process loan application data here
    // For simplicity, assuming data is valid and directly inserting into the database
    $accountNo = $_POST['accountNo'];
    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $number = $_POST['number'];
    $loanType = $_POST['loanType'];
    $l_amount = $_POST['l_amount'];
    $term = $_POST['term'];
    $pan = $_POST['pan'];
    $r_name = $_POST['r_name'];
    $r_number = $_POST['r_number'];
    $purpose = $_POST['purpose'];

    // Insert loan application data into the database
    $stmt = $con->prepare("INSERT INTO loan_request (l_id, accountNo, name, aadhar, number, loanType, l_amount, term, pan, r_name, r_number, purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $userId, $accountNo, $name, $aadhar, $number, $loanType, $l_amount, $term, $pan, $r_name, $r_number, $purpose);
    if ($stmt->execute()) {
        echo "<div class='alert alert-danger text-center'>Loan application submitted successfully.</div>";
        header("location:index.php");
    } else {
        echo "<div class='alert alert-danger text-center'>Error: Unable to submit loan application.</div>";
    }
    $stmt->close();
}
?>
 
<!DOCTYPE html>
<html>
<head>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<?php include 'tabbar.php'; ?>

<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
   <h1><i class="fa-solid fa-indian-rupee-sign"></i>&nbsp;LOAN APPLICATION </h1>
  </div>
  <div class="card-body">
    <table class="table">
      <tbody>
        <tr>
          <form method="POST">
          <th>Account Number: </th>
            <td><input type="" name="accountNo" readonly value="<?php echo $userData['accountNo']; ?>" class="form-control input-sm" required></td>
          <th>Applicant Name:</th>
            <td><input type="" name="name" readonly value="<?php echo $userData['name']; ?>" class="form-control input-sm" required></td>
        </tr>

        <tr> 
          <th>Aadhar Number:</th>
          <td><input type="" name="aadhar" readonly value="<?php echo $userData['aadhar']; ?>" class="form-control input-sm" required></td>
          <th>Phone Number:</th>
          <td><input type="" name="number" readonly value="<?php echo $userData['number']; ?>" class="form-control input-sm" required></td>
        </tr>

        <tr>
          <th>Loan Type: </th>
          <td> <select class="form-control input-sm" name="loanType" required>
              <option selected value="" selected>Please Select..</option>
              <option value="educational" >Education Loan</option>
              <option value="vehical" >Vehical Loan</option>
              <option value="house" >Home Loan</option>
            </select> 
          </td>
          <th>Loan Amount Request: </th>
          <td><input type="number" name="l_amount" placeholder="₹00000" min="5000" max="250000" class="form-control input-sm" required></td>
        </tr>

        <tr> 
          <th>Loan Term:</th>
          <td><select class="form-control input-sm" name="term" required>
              <option selected value="" selected>Please Select..</option>
              <option value="6 months" >6 months</option>
              <option value="1 year" >1 year</option>
              <option value="5 year" >5 years</option>
            </select> 
          </td>
          <th>PAN Number:</th>
          <td><input type="text" name="pan" placeholder="ABCDE1234F" class="form-control input-sm" required></td>
        </tr>

        <tr> 
          <th>Reference Person Name:</th>
          <td><input type="text" name="r_name" class="form-control input-sm" required></td>
          <th>Reference Contact Number:</th>
          <td><input type="number" name="r_number" class="form-control input-sm" required></td>
        </tr>

        <tr>
        <th>Loan Purpose:</th>
          <td><textarea class="form-control" name="purpose" required placeholder="Write your purpose"></textarea>
          </td>
          <th>Loan Id:</th>
          <td><input type="" name="number" readonly value="<?php echo $userData['id']; ?>" class="form-control input-sm" required></td>
         </tr>

        <tr>
          <td colspan="4">
            <center> <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            <button type="reset" class="btn btn-secondary btn-sm">Reset</button> </center>
          </td>
        </tr>
      </form>
      </tbody>
    </table>
  </div>

  <div class="card-footer text-muted">
  <img src="images/VBP.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <?php echo bankName ?>
  </div>
</div>

</div>
</body>
</html>
