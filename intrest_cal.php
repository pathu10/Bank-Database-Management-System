
<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include 'files_to_import.php'; ?>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!-------------------Tab Section------------------>
<?php include 'tabbar.php'; ?>

<div class="container">
  <div class="card w-100 text-center shadowBlue">
    <div class="card-header">
      <h1><i class="fa-solid fa-calculator"></i>&nbsp;LOAN Interest Calculator</h1>
    </div>
    <div class="card-body">
      <table class="table">
        <tbody>
          <tr>
            <th>Loan Type:</th>
            <td>
              <select class="form-control input-sm" id="loanType" required>
                <option disabled selected>Please Select..</option>
                <option value="educational">Education Loan</option>
                <option value="vehicle">Vehicle Loan</option>
                <option value="house">Home Loan</option>
              </select>
            </td>
            <th>Loan Amount:</th>
            <td><input type="number" id="loanAmount" placeholder="₹00000" class="form-control input-sm" required></td>
          </tr>

          <tr>
            <th>Loan Term:</th>
            <td>
              <select class="form-control input-sm" id="loanTerm" required>
                <option disabled selected>Please Select..</option>
                <option value="6">6 months</option>
                <option value="12">1 year</option>
                <option value="60">5 years</option>
              </select>
            </td>
          </tr>

          <tr>
            <td colspan="4">
              <button type="button" onclick="calculateLoan()" class="btn btn-primary btn-sm">Calculate</button>
              &nbsp;&nbsp;&nbsp;
              <button type="reset" onclick="resetForm()" class="btn btn-secondary btn-sm">Reset</button>
            </td>
          </tr>
          <tr>
            <th>Rate of Interest:</th>
            <td id="interestrate"></td>
            <th>Interest on Amount:</th>
            <td id="interestField"></td>
          </tr>
 
          <tr>
          <th>Total Payable Amount:</th>
            <td id="totalAmountField"></td>
            <th>EMI:</th>
            <td id="emiField"  ></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted">
  <img src="images/VBP.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <?php echo bankName ?>
    </div>
  </div>
</div>

<!-------------------Calculate Loan Intrest-------------->
<script>
  function calculateLoan() {
    var loanType = document.getElementById("loanType").value;
    var loanAmount = parseFloat(document.getElementById("loanAmount").value);
    var loanTerm = parseFloat(document.getElementById("loanTerm").value);
    var interestRate = 0; // Initialize interest rate

    if (loanType === "" || isNaN(loanAmount) || isNaN(loanTerm)) {
      alert("Please fill the data 😊");
      return; // Exit the function if validation fails
    }

    if (loanAmount > 250000) {
      alert("⚠️You can apply Loan amount upto ₹2,50,000 only⚠️");
      return; // Exit the function if validation fails
    }

    // Set interest rate based on loan type
    if (loanType === "educational") {
      interestRate = 0.075; // Set interest rate for educational loan to 7.5%
    } else if (loanType === "vehicle") {
      interestRate = 0.09; // Example interest rate for vehicle loan (9%)
    } else if (loanType === "house") {
      interestRate = 0.0988; // Example interest rate for home loan (9.88%)
    }

    // Display Rate of interest
    document.getElementById("interestrate").textContent = (interestRate *100) + "%" ;

    // Calculate and Dispaly interest
    var interest = (loanAmount * interestRate * loanTerm) / 12; // Assuming monthly interest calculation
    document.getElementById("interestField").textContent = "₹" + interest.toFixed(2);

    // Calculate and Dispaly total amount
    var totalAmount = loanAmount + interest;
    document.getElementById("totalAmountField").textContent = "₹" + totalAmount.toFixed(2);

    // Calculate and Dispaly EMI (Equated Monthly Installment) 
    var emi = totalAmount/loanTerm;
    document.getElementById("emiField").textContent = "₹" + emi.toFixed(2);
  }


  function resetForm() {
    document.getElementById("loanType").selectedIndex = 0; // Reset loan type dropdown
    document.getElementById("loanAmount").value = ""; // Reset loan amount input field
    document.getElementById("loanTerm").selectedIndex = 0; // Reset loan term dropdown
    document.getElementById("interestField").textContent = ""; // Clear interest field
    document.getElementById("totalAmountField").textContent = ""; // Clear total amount field
    document.getElementById("emiField").textContent = ""; // Clear EMI field
    document.getElementById("interestrate").textContent = ""; // Clear interest rate field
  }
</script>


</body>
</html>