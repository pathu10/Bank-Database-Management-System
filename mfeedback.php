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
    if ($con->query("delete from feedback where feedbackId = '$_GET[delete]'"))
    {
      header("location:mfeedback.php");
    }
  } ?>
</head>
<body style="background: url(images/bg.png); background-size: 100%">

 
<!------------Manager Tab bar-------->
<?php include 'manager_tabbar.php'; ?>


<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    <h3> Feedback from Account Holder</h3>
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm bg-dark text-white">
  <thead>
    <tr>
      <th scope="col">From</th>
      <th scope="col">Account No.</th>
      <th scope="col">Contact</th>
      <th scope="col">Message</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $array = $con->query("select * from useraccounts,feedback where useraccounts.id = feedback.userId");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
    ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['accountNo'] ?></td>
        <td><?php echo $row['number'] ?></td>
        <td><?php echo $row['message'] ?></td>
        <td>
          <a href="mfeedback.php?delete=<?php echo $row['feedbackId'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this Message">Delete</a>
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