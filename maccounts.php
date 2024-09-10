<?php
session_start();
if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'files_to_import.php'; ?>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

<!------------Manager Tab bar-------->
<?php include 'manager_tabbar.php'; ?>

<?php
if (isset($_POST['saveAccount']))
{
  if (!$con->query("INSERT INTO employee (email,emp_name, password,branch_id) VALUES ('$_POST[email]','$_POST[name]', '$_POST[password]','$_POST[branch]')")) {
    echo "<div class='alert alert-success'>Failed. Error is:".$con->error."</div>";
  }
}

if (isset($_GET['del']) && !empty($_GET['del']))
{
  $con->query("delete from employee where emp_id ='$_GET[del]'");
}
  $array = $con->query("select * from employee");
  
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    <h3> All STAFF ACCOUNTS  <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">Add New Account</button>
  </div></h3>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID </th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if ($array->num_rows > 0)
          {
            while ($row = $array->fetch_assoc())
            {
              echo "<tr>";
              echo "<td>".$row['emp_id']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['password']."</td>";
              echo "<td><a href='maccounts.php?del=$row[emp_id]' class='btn btn-danger btn-sm'>Delete</a></td>";
              echo "</tr>";
            }
          }
         ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
  <?php include 'logo_with_name.php'; ?>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Cashier Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
    <form method="POST">
        Enter Details:
        <input class="form-control w-75 mx-auto" type="text" name="name" required placeholder="Name">
        <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email">
        <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password">
        <select name="branch" required class="form-control w-75 mx-auto">
            <option selected value="">Please Select..</option>
            <?php 
              $arr = $con->query("select * from branch");
              if ($arr->num_rows > 0)
              {
                while ($row = $arr->fetch_assoc())
                {
                  echo "<option value='$row[branchId]'>$row[branchName]</option>";
                }
              }
              else
                echo "<option value='1'>Main Branch</option>";
            ?>
        </select>
    
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="saveAccount" class="btn btn-primary">Save Account</button>
  </div>
  </form>
    </div>
  </div>
</div>
</body>
</html>