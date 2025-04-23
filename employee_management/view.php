<?php
include 'db.php'; 
include 'header.php';


$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>


<h2>Employee List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Position</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['position']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No employees found</td></tr>";
    }
    ?>

</table>
<button class="btn">
    <a class="btn" href="register.php">Go back</a>
</button>
</body>
</html>