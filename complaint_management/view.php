<?php
include "header.php";
include "db.php";
?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM complaints WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM complaints WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();
}
?>

<h2>Complaint Details</h2>
    <?php if ($data): ?>
        <p><strong>Name:</strong> <?= htmlspecialchars($data['name']) ?></p>
        <p><strong>Complaint:</strong> <?= htmlspecialchars($data['complaint']) ?></p>
        <p><strong>Status:</strong> <?= $data['status'] ?></p>

        <?php if ($data['status'] === 'In Progress'): ?>
            <form method="POST">
                <label for="delete">Click to mark as done</label>
                <input type="submit" name="delete" value="Delete ">
            </form>
        <?php else: ?>
            <p>Complaint not yet being checked.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Complaint not found.</p>
    <?php endif; ?>
    <br><a style="color: black;" href="index.php">← Back to Home</a>
</body>
</html>
