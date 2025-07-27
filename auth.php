<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Lab_5b");

$matric = $_POST['matric'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE matric = '$matric'";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
  if (password_verify($password, $row['password'])) {
    $_SESSION['matric'] = $matric;
    $_SESSION['accessLevel'] = $row['accessLevel']; // ✅ Store access level in session
    header("Location: dashboard.php");
  } else {
    echo "Wrong password!";
  }
} else {
  echo "User not found!";
}
?>
