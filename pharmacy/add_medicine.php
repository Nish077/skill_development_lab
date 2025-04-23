<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Add Medicine</title>
<style>
    body {
  font-family: Arial, sans-serif;
  background: #f5f5f5;
  padding: 30px;
}

h2, h3 {
  color: #2c3e50;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

table, th, td {
  border: 1px solid #ccc;
  text-align: center;
  padding: 10px;
}

a {
  color: #3498db;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

.button {
  background-color: #2ecc71;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
}

</style>
</head>
<body>
  <h3>Add Medicine</h3>
  <form method="POST">
    <input type="text" name="name" placeholder="Medicine Name" required><br>
    <input type="text" name="type" placeholder="Type (Tablet/Syrup)" required><br>
    <input type="number" name="quantity" placeholder="Quantity" required><br>
    <input type="text" name="price" placeholder="Price" required><br>
    <input type="date" name="expiry" required><br>
    <input type="submit" name="submit" value="Add">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $q = "INSERT INTO medicines (name, type, quantity, price, expiry)
          VALUES ('{$_POST['name']}', '{$_POST['type']}', {$_POST['quantity']}, {$_POST['price']}, '{$_POST['expiry']}')";
    mysqli_query($conn, $q);
    echo "Medicine added successfully. <a href='index.php'>Go back</a>";
  }
  ?>
</body>
</html>
