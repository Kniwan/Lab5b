<?php

session_start();
if (!isset($_SESSION['matric']) || $_SESSION['accessLevel'] !== 'admin') {
  die("Access denied. Only admins can perform this action.");
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$matric = $_POST['matric'];
$name = $_POST['name'];
$accessLevel = $_POST['accessLevel'];

$sql = "UPDATE users SET name='$name', accessLevel='$accessLevel' WHERE matric='$matric'";
$conn->query($sql);
header("Location: dashboard.php");
?>
