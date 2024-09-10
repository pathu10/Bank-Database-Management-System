<script src="https://kit.fontawesome.com/87f4045376.js" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
 <?php include 'logo_with_name.php'; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Transfer Money</a></li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item ">
        <div class="dropdown">
          <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
          Apply for
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="apply_card.php"><i class="fa-regular fa-credit-card"></i>&nbsp; Credit/Debit Card</a>
            <a class="dropdown-item" href="apply_loan.php"><i class="fa-solid fa-indian-rupee-sign"></i>&nbsp; Loan</a>
          </div>
        </div>
       </li>&nbsp;&nbsp;
        <li class="nav-item ">  <a class="nav-link" href="intrest_cal.php">Loan Intrest Calculator</a></li>



    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="accounts.php" class="btn btn-outline-success" data-toggle="tooltip" title="Your current Account Balance">Acount Balance : Rs.<?php echo $userData['balance']; ?></a>  
        <a href="statements.php" data-toggle="tooltip" title="Account Summary" class="btn btn-outline-primary mx-1" ><i class="fa fa-book fa-fw"></i></a> 
        <a href="notice.php" data-toggle="tooltip" title="View Notice" class="btn btn-outline-primary mx-1" ><i class="fa fa-envelope fa-fw"></i></a> 
        <a href="feedback.php" data-toggle="tooltip" title="Help?" class="btn btn-outline-info mx-1" ><i class="fa fa-question fa-fw"></i></a> 
        <a href="logout.php" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
</form>
    
  </div>
</nav><br><br><br>