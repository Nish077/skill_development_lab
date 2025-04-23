<?php include 'config.php'; 
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a><br><br>

<h3>Create a Post</h3>
<form method="POST" action="index.php">
  <textarea name="content" placeholder="What's on your mind?" required></textarea><br>
  <button type="submit" name="submit_post">Post</button>
</form>

<h3>Your Posts</h3>
<?php
if (isset($_POST['submit_post'])) {
  $content = $_POST['content'];
  $user_id = $_SESSION['user_id'];
  
  $sql = "INSERT INTO posts (user_id, content) VALUES ('$user_id', '$content')";
  if ($conn->query($sql)) {
    header("Location: index.php");
  } else {
    echo "Error: " . $conn->error;
  }
}

$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<div><b>{$row['username']}</b>: {$row['content']} <br><small>{$row['created_at']}</small></div><hr>";
}
?>
