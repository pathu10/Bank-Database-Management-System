<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: login.php');
    exit;
}
require 'assets/autoloader.php';
require 'assets/db.php';
require 'assets/function.php';


// Fetch user details based on the logged-in user
$userId = $_SESSION['userId'];

// Fetch user data from the database
$stmt = $con->prepare("SELECT * FROM useraccounts WHERE id = ?");
$stmt->bind_param("s", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $userData = $result->fetch_assoc();
} else {
    echo "Error: User data not found.";
    exit;
}
$stmt->close();
?>
<title>VBP</title>