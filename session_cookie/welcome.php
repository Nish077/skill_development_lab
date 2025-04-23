<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
<h2>Welcome, <?php echo $_SESSION['email']; ?>!</h2>
<p>You are logged in.</p>
<p>Cookie: <?php echo $_COOKIE['user'] ?? 'None'; ?></p>
<a href="logout.php">Logout</a>
</body>
</html>
