<?php include 'config.php'; ?>

<h2>Welcome to Facebook Clone</h2>

<?php
if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}
?>

<h3>Login</h3>
<form method="POST" action="login.php">
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit" name="login">Login</button>
</form>

<h3>Register</h3>
<form method="POST" action="login.php">
  Username: <input type="text" name="username" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit" name="register">Register</button>
</form>

<?php
// Handle Registration
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  if ($conn->query($sql)) {
    echo "Registration successful. <a href='login.php'>Login</a>";
  } else {
    echo "Error: " . $conn->error;
  }
}

// Handle Login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); 
      $_SESSION['username'] = $user['username'];
      header("Location: index.php");
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "No user found with this email.";
  }

?>
