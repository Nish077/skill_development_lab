<?php include 'db.php'; $id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM medicines WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head><title>Update Medicine</title></head>
<body>
  <h3>Update Medicine</h3>
  <form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
    <input type="text" name="type" value="<?= $row['type'] ?>" required><br>
    <input type="number" name="quantity" value="<?= $row['quantity'] ?>" required><br>
    <input type="text" name="price" value="<?= $row['price'] ?>" required><br>
    <input type="date" name="expiry" value="<?= $row['expiry'] ?>" required><br>
    <input type="submit" name="update" value="Update">
  </form>

  <?php
  if (isset($_POST['update'])) {
    $q = "UPDATE medicines SET 
          name='{$_POST['name']}',
          type='{$_POST['type']}',
          quantity={$_POST['quantity']},
          price={$_POST['price']},
          expiry='{$_POST['expiry']}'
          WHERE id=$id";
    mysqli_query($conn, $q);
    echo "Updated! <a href='index.php'>Back</a>";
  }
  ?>
</body>
</html>
