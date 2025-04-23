<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <h2>All Toll Records</h2>
  <table border="1">
    <tr>
      <th>ID</th><th>Vehicle No</th><th>Type</th><th>Amount</th><th>Date/Time</th><th>Action</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM toll_records ORDER BY timestamp DESC");
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['vehicle_no']}</td>
              <td>{$row['vehicle_type']}</td>
              <td>{$row['toll_amount']}</td>
              <td>{$row['timestamp']}</td>
              <td><a href='delete_record.php?id={$row['id']}'>Delete</a></td>
            </tr>";
    }
    ?>
  </table>

  <a href="add_vehicle.php">Add vehicle</a>
</body>
</html>
