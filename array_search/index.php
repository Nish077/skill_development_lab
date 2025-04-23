<?php
$employee_names = [
    "John Doe", "Jane Smith", "David Brown", "Mary Johnson", "Michael Davis",
    "Emily Clark", "James Martinez", "Sarah Taylor", "John Johnson", "Lisa Wilson",
    "Chris Lee", "Karen Harris", "Mark Hall", "Nancy Allen", "Paul Young",
    "Patricia King", "David Scott", "Elizabeth Wright", "Joseph Green", "Linda Adams"
];


$result = "";

if (isset($_POST['submit'])) {
    $search_name = $_POST['name'];


    if (in_array($search_name, $employee_names)) {
        $result = "The name '$search_name' exists in the array.";
    } else {
        $result = "The name '$search_name' does not exist in the array.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employee Names</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 30px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h2>Search Employee Name</h2>

<form method="POST">
    <label for="name">Enter employee name to search:</label><br>
    <input type="text" name="name" id="name" required><br>
    <input type="submit" name="submit" value="Search">
</form>

<?php



if ($result != "") {
    echo "<div class='result'>$result</div>";
}
?>

</body>
</html>
