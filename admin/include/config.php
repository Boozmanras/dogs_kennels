<?php
// Database connection settings
$servername = "localhost";
$username = "easyqash_victor";
$password = "Wakhungu^2002";
$database = "easyqash_kennels";

/*
$servername = "localhost";
$username = "root";
$password = "";
$database = "kennel";
*/
// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//functions



?>