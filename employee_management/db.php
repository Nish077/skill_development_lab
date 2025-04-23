<?php
$host = 'localhost';
$dbname = 'employee_db';
$username = 'root';
$password = '';


    $conn = new mysqli($host, $username, $password, $dbname);
    
    if($conn->connect_error){
        error_log("Connection failed: ". $conn->connect_error, 3, __DIR__, "./db_error.log");

        die("Unable to connect to the database!!");

    }
?>