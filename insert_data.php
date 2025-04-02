<?php
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'my_database'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO data (rollno, name, dept, mark, time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issis", $rollno, $name, $dept, $mark, $time);

// Sample data to insert
$rollno = 1;
$name = "John Doe";
$dept = "Computer Science";
$mark = 85;
$time = date('Y-m-d H:i:s'); // Current timestamp

// Execute the statement
$stmt->execute();

echo "New record created successfully";

// Close connections
$stmt->close();
$conn->close();
?>
