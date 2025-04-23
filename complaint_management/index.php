<?php
include "header.php";
include "db.php";
?>

<h2>Register Complaint</h2>

<form action="" method="post">
    <label for="name">Enter your name:</label>
    <input type="text" name="name" id="name" placeholder="Name" required>
    <br><br>

    <label for="complaint">Enter your complaint:</label>
    <textarea name="complaint" id="complaint" placeholder="Write here..." required></textarea>
    <br><br>

    <input type="submit" value="Register Complaint" name="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $complaint = $_POST['complaint'];

    $stmt = $conn->prepare("INSERT INTO complaints (name, complaint) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $complaint);

    if ($stmt->execute()) {
        echo "<p>Complaint registered successfully.</p>";
    } else {
        echo "<p>Complaint registration unsuccessful. Try again later!</p>";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("UPDATE complaints SET status='In Progress' WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM complaints ORDER BY created_at DESC");
?>

<h3>All Complaints</h3>
<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Complaint</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['complaint']) ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="submit" name="update" value="Mark as Checking"
                        style="<?= ($row['status'] == 'In Progress') ? 'display:none;' : ''; ?>">
                </form>
              <button>
                  <a href="view.php?id=<?= $row['id'] ?>">View</a>
              </button>

            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>

</html>