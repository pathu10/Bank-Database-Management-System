
<?php
include 'assets/fetch_userdata.php';

if (isset($_POST['submit'])) {
  // Validate and process loan application data here
  // For simplicity, assuming data is valid and directly inserting into the database
  $accountNo = $_POST['accountNo'];
  $name = $_POST['name'];
  $aadhar = $_POST['aadhar'];
  $number = $_POST['number'];
  $cardType = $_POST['cardType'];
  $pan = $_POST['pan'];
  $purpose = $_POST['purpose'];

  $stmt = $con->prepare("INSERT INTO card_request (c_id, accountNo, name, aadhar, number, cardType, pan, purpose) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $userId, $accountNo, $name, $aadhar, $number, $cardType, $pan, $purpose);
    if ($stmt->execute()) {
        echo "<div class='alert alert-info text-center'>Card application submitted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error: Unable to submit loan application.</div>";
    }
    $stmt->close();
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html> 
<head>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!-------------------Tab Section------------------>
<?php include 'tabbar.php'; ?>

<!-------------------Linking Section------------------>


<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
   <h1> <i class="fa-regular fa-credit-card"></i>&nbsp;  CARD REQUEST APPLICATION </h1>
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
          <th>Card Type: </th>
          <td> <select class="form-control input-sm" name="cardType" required>
              <option selected value="" selected>Please Select..</option>
              <option value="Credit" >Credit Card</option>
              <option value="Debit" >Debit Card</option>
            </select> 
          </td>
          <th>PAN Number:</th>
          <td><input type="text" name="pan" placeholder="ABCDE1234F" class="form-control input-sm" required></td>  
        </tr>

        <tr>
        <th>Card Purpose:</th>
          <td><textarea class="form-control" name="purpose" required placeholder="Write your purpose"></textarea>
          </td>
          <th>Card Request ID</th>
          <td><input type="" name="c_id" readonly value="<?php echo $userData['id']; ?>" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <td colspan="4" align="center">
            <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit </button>
            <button type="Reset" class="btn btn-secondary btn-sm">Reset</button>
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