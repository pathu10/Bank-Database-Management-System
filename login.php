<!DOCTYPE html>
<html>
<head>
<!-- Make connection and  get data from database -->
<?php include 'files_to_import.php'; ?>
	<?php
    $con = new mysqli('localhost','root','','mybank');
		$error = "";
		// Verify user data
		if (isset($_POST['userLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		    $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['userId']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:index.php');
		     }
		    else
		    {
				$error= "Invalid Username or Password!";
		    }
		}
		// Verify cashier data
		if (isset($_POST['cashierLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $con->query("select * from employee where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['cashId']=$data['emp_id'];
		      $_SESSION['user'] = $data;
		      header('location:cindex.php');
		     }
		    else{
					$error= "Invalid Username or Password!";
		      }
		}
		// Verify manager data
		if (isset($_POST['managerLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		    $result = $con->query("select * from manager where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['managerId']=$data['mgr_id'];
		      $_SESSION['user'] = $data;
		      header('location:mindex.php');
		     }
		    else{
				$error= "Invalid Username or Password!";
		      }
		}
	 ?>
	<style>
		.header-text h1{
    		font-size: 60px;
    		margin-top: 20px;
			color:black;
		}
		.indent {
  			padding-left: 50px; /* Adjust the value as needed */
		}
		nav{
    		display: flex;
			background: #00000000 ;
			align-items: center;
			justify-content: space-between;
			flex-wrap: wrap;
		}
		nav ul li a{
			color: black;
			text-decoration: none;
			font-size:22px;
			position: relative;
		}
		nav ul li a::after{
			content:'';
			width:0;
			height: 3px;
			background: #ff004f ;
			position: absolute;
			left: 0;
			bottom: -6px;
			transition:0.5s;
		}
		nav ul li a:hover::after{
			width:100%;
		}
		.logo{
			width:60px;
		}
	</style>
</head>
<body style="background: url(images/p.avif); background-size: 100%">
<div>
	<nav class="navbar navbar-expand-lg  fixed-top"> 
        <img src="images/icon.png" class="logo">
            <ul class="navbar-nav mr-auto" id="sidemenu">&nbsp;&nbsp;&nbsp;
                <li class="nav-item "><a class="nav-link" href="#"> Home</a></li> &nbsp;&nbsp;&nbsp;
                <li class="nav-item "><a class="nav-link" href="#about">About</a></li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item "><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
    </nav>
</div>
<br><br><br><br><br><br>
<div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 100px">
	<br><h4 class="text-center text-black">Select Your Session</h4>

<!------------------------------User login button------------------>
  <div class="card " >
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-primary btn-block">
			<i> User Login  </i>
		</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body ">
       <form method="POST">
       	<input type="email" value="example@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="12345678" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Submit </button>
	</form>
      </div>
    </div>
  </div>
  <!------------------------------Manager login button------------------>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <i> Manager Login </i>
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <form method="POST">
       	<input type="email"  name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password"  class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Submit </button>
       </form>
      </div>
    </div>
  </div>

<!------------------------------Caisher login button------------------>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <i> Cashier Login </i>
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form method="POST">
       	<input type="email"  name="email" class="form-control" required placeholder="Enter Email" >
       	<input type="password" name="password"  class="form-control" required placeholder="Enter Password">
       	<button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Submit </button>
       </form>
      </div>
    </div>
	<center> <div style="color: red;"> <?php echo $error; ?> </div> </center>
  </div>
  
</div>
<div class="header-text">
		<h4 >Welcome to.... </h4>
            <h1 class="indent">Vivekananda Bank of Puttur</h1> <br>
			<h4 ><i>Where financial excellence meets personalized service. 
					Explore our range of banking solutions designed to empower your financial journey. 
					Your success, our commitment</i></h4>
</div>
<br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="about"><br><br>
		<h1 > About Us </h1> 
		<img src="images/icon.png" alt="Vivekananda Bank Logo" style="display: block; margin: 0 auto; height:250px; width:auto;">
<p style="font-size: 25px;"><i> Our Journey, Your Trust: <br> 
Founded on principles of integrity and service, Vivekananda Bank Puttur ,has been a cornerstone of trust since 2023. 
Dive into our story, our mission, and the values that shape every interaction. Welcome to a bank that's more than banking.
From flexible savings accounts to low-interest loans, discover banking solutions tailored just for you. 
Check out our featured products and services to elevate your financial journey. </i> </p>
</div> <br><br>

<div id="contact">
<h1 > Contact Us </h1>
	<table border=0>
		<tr>
		<td width="50%">
		<p style="font-size: 25px;">
  <b> Visit Us at: </b> <br>
  Puttur,Dakshina Kannada ,<br>
  Karnataka,India<br>
  ZIP Code : 574201<br>
	</td> </p>
	<td >
	<p style="font-size: 25px;">
    <b> Customer Support: </b><br>
     Call : +91 8867939274 / +91 9110465687	<br>
     Email : vbp2023@gmail.com <br> <br>
     </p> </td></tr> </table>
	 <p style="font-size: 20px;">  <i>Your VBP team is just a message away. Reach out—we're ready to assist you!" </i> <p>
</div>
</body>
</html>