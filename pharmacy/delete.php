<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM medicines WHERE id=$id");
header("Location: index.php");
?>
