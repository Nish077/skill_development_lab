<?php
session_start();
include 'db.php';
include 'header.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = sha1($_POST['password']); // SHA1 hash for matching

    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['email'] = $email;
        setcookie("user", $email, time() + 3600, "/");
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>


<h2>Login</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
    Email: <input type="text" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="submit" value="Login">
</form>
</body>
</html>
