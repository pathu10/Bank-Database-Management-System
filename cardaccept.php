
<!DOCTYPE html>
<html>
<head>
<?php include 'files_to_import.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from card_request where c_id = '$_GET[delete]'"))
    {
        $card_id = $_GET['delete'];
        $con->query("INSERT INTO notice (notice,userId) values ('Your Card request has been cancelled, for more details visit nearest VBP Branch','$card_id')");
      header("location:mindex.php");
    }
  }
  else if (isset($_GET['accept'])) 
    {
        $card_id = $_GET['accept'];
        $query = "SELECT * FROM card_request WHERE c_id = '$card_id'";
        $result = $con->query($query);
        if ($result->num_rows > 0) 
        {
          $row = $result->fetch_assoc();
          $type = $row['cardType'];

            // Once added, you may want to remove the loan request, uncomment below to delete the loan request
            $con->query("INSERT INTO notice (notice,userId) values ('Your Card request has been approved, for more details visit nearest VBP Branch','$card_id')");
            $con->query("UPDATE useraccounts SET card = '$type';");
            $con->query("DELETE FROM card_request WHERE c_id = '$card_id'");
            header("location:mindex.php"); // Redirect to same page
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
    <b> CARD REQUESTS </b>
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">Card Type</th>
      <th scope="col">Purpose</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<tbody>
    <?php
      $i=0;
      $array = $con->query("select * from useraccounts,card_request where useraccounts.id = card_request.c_id");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        { $i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['accountNo'] ?></td>
        <td><?php echo $row['cardType'] ?></td>
        <td><?php echo $row['purpose'] ?></td>
        <td>
          <a href="cardaccept.php?accept=<?php echo $row['c_id'] ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="Accept the request">Accept</a>
          <a href="mnotice.php?id=<?php echo $row['id'] ?>" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Send notice to this">Send Remark</a>
          <a href="cardaccept.php?delete=<?php echo $row['c_id'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this Request">Delete</a>
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