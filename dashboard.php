<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand">Welcome, <?php echo $_SESSION['user']; ?>!</span>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Your Dashboard</h2>
    <p>This is a secure page only accessible after login.</p>
  </div>
</body>
</html>
