<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pharmacy Management</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>Pharmacy Management System</h2>
  <a href="add_medicine.php" class="button">Add New Medicine</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Type</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Expiry</th>
      <th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM medicines");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['type']}</td>
          <td>{$row['quantity']}</td>
          <td>{$row['price']}</td>
          <td>{$row['expiry']}</td>
          <td>
            <a href='update.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Delete this medicine?\")'>Delete</a>
          </td>
        </tr>";
    }
    ?>
  </table>
</body>
</html>
