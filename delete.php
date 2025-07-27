<?php

session_start();
if (!isset($_SESSION['matric']) || $_SESSION['accessLevel'] !== 'admin') {
  die("Access denied. Only admins can perform this action.");
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$matric = $_GET['matric'];
$conn->query("DELETE FROM users WHERE matric='$matric'");
header("Location: dashboard.php");
?>
