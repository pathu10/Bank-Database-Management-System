<?php 
    $con = new mysqli('localhost','root','','mybank');
    define('bankName', 'VBP Bank');
    $ar = $con->query("select * from userAccounts,branch where userAccounts.branch = branch.branchId");
    $userData = $ar->fetch_assoc();
?>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>