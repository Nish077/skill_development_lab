<?php
include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $conn->query("DELETE FROM toll_records WHERE id = $id");
}

header("Location: view.php");
exit;
