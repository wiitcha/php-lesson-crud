<?php

$conn = new mysqli("localhost", "root", "281079Qq");

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// create database

$sql = "CREATE DATABASE `web_project`;";
if ($result = $conn->query($sql) === TRUE) {
    echo "Database created successfully";

} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>