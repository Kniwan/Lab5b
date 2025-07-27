<?php
$conn = new mysqli("localhost", "root", "", "Lab_5b");

$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$accessLevel = $_POST['accessLevel'];

$sql = "INSERT INTO users (matric, name, password, accessLevel)
        VALUES ('$matric', '$name', '$password', '$accessLevel')";
$conn->query($sql);
echo "Registration successful. <a href='index.php'>Login</a>";
?>
