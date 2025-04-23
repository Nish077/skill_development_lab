<?php
include 'db.php'; 
include 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    $stmt = $conn->prepare("INSERT INTO employees (name, email, phone, department, position) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $department, $position);

    if ($stmt->execute()) {
        echo "<p>Employee registered successfully!</p>";
        
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>


<h2>Employee Registration</h2>

<div class="form-container">
    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br>

        <label for="phone">Phone Number:</label><br>
        <input type="text" name="phone" id="phone" required><br>

        <label for="department">Department:</label><br>
        <input type="text" name="department" id="department" required><br>

        <label for="position">Position:</label><br>
        <input type="text" name="position" id="position" required><br>

        <input type="submit" name="submit" value="Register Employee">
    </form>
</div>

<div>
    <button class="btn">
        <a style="text-decoration: none; color: white;"href="view.php">View employees</a>
    </button>
</div>
</body>
</html>
