<?php
include("connection.php");

$sql = "CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    completed BOOLEAN NOT NULL DEFAULT 0
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
