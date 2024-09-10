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
        <a class="nav-link active" href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">Feedback</a></li>&nbsp;&nbsp;
      <li class="nav-item ">
        <div class="dropdown">
          <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
          Requests
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="lc_request.php">Loan Request</a>
            <a class="dropdown-item" href="cardaccept.php">Card Request</a>
          </div>
        </div>
       </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
       	<button class="btn btn-outline-success">Welecome Manager</button>
        <a href="logout.php" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
    </form>
    
  </div>
</nav><br><br><br>
