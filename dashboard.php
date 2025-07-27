<?php
session_start();
if (!isset($_SESSION['matric'])) {
  header("Location: index.php");
  exit();
}

$conn = new mysqli("localhost", "root", "", "Lab_5b");
$result = $conn->query("SELECT matric, name, accessLevel FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?= $_SESSION['matric']; ?> (<?= $_SESSION['accessLevel']; ?>)</h2>

<table border="1">
  <tr>
    <th>Matric</th>
    <th>Name</th>
    <th>Access Level</th>
    <th>Actions</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['matric']; ?></td>
      <td><?= $row['name']; ?></td>
      <td><?= $row['accessLevel']; ?></td>
      <td>
        <?php if ($_SESSION['accessLevel'] === 'admin') { ?>
          <a href="update.php?matric=<?= $row['matric']; ?>">Update</a> |
          <a href="delete.php?matric=<?= $row['matric']; ?>">Delete</a>
        <?php } else { ?>
          Restricted
        <?php } ?>
      </td>
    </tr>
  <?php } ?>

</table>

</body>
</html>
