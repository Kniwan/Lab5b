
<form action="insert.php" method="POST">
  Matric: <input type="text" name="matric"><br>
  Name: <input type="text" name="name"><br>
  Password: <input type="password" name="password"><br>
  Access Level: 
  <select name="accessLevel">
    <option value="admin">Admin</option>
    <option value="user">User</option>
  </select><br>
  <input type="submit" value="Register">
</form>