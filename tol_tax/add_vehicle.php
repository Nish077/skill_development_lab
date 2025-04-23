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
  <h2>Add Toll Entry</h2>
  <form action="" method="POST">
    Vehicle No: <input type="text" name="vehicle_no" required><br>
    Vehicle Type: 
    <select name="vehicle_type">
      <option value="Car">Car</option>
      <option value="Truck">Truck</option>
      <option value="Bus">Bus</option>
    </select><br>
    Toll Amount: <input type="number" name="toll_amount" required><br>
    <input type="submit" name="submit" value="Add Entry">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $v_no = $_POST['vehicle_no'];
    $v_type = $_POST['vehicle_type'];
    $toll = $_POST['toll_amount'];

    $sql = "INSERT INTO toll_records (vehicle_no, vehicle_type, toll_amount)
            VALUES ('$v_no', '$v_type', '$toll')";
    if ($conn->query($sql) === TRUE) {
      echo "Toll entry added successfully!";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>

  <button>

    <a href="view.php">View tolls</a>
  </button>
</body>
</html>
