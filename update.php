<?php
session_start();
if (!isset($_SESSION['matric']) || $_SESSION['accessLevel'] !== 'admin') {
  die("Access denied. Only admins can perform this action.");
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$matric = $_GET['matric'];
$result = $conn->query("SELECT * FROM users WHERE matric='$matric'");
$row = $result->fetch_assoc();
?>
<form action="process.php" method="POST">
  <input type="hidden" name="matric" value="<?= $row['matric'] ?>">
  Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
  Access Level:
  <select name="accessLevel">
    <option value="admin" <?= $row['accessLevel'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    <option value="user" <?= $row['accessLevel'] == 'user' ? 'selected' : '' ?>>User</option>
  </select><br>
  <input type="submit" value="Update">
</form>
