<?php
// Database connection settings
$servername = "localhost";
$username = "easyqash_victor";
$password = "Wakhungu^2002";
$database = "easyqash_kennels";


$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//functions
//retrievs data
function getDataFromDatabase($conn, $table, $columns = "*", $conditions = "") {
try {

$stmt = $conn->prepare("SELECT $columns FROM $table $conditions");


if (!$stmt) {
throw new Exception("Failed to prepare the SQL statement.");
}


$stmt->execute();

$result = $stmt->get_result();


$data = $result->fetch_all(MYSQLI_ASSOC);


$stmt->close();
$result->free_result();

return $data;
} catch (Exception $e) {

echo "Error: " . $e->getMessage();
return false;
}
}
function validateUserInput($input)
{

$input = trim($input);

$input = htmlspecialchars($input);

if (!preg_match("/^[a-zA-Z\s]+$/", $input)) {
return false;
}

$length = strlen($input);
if ($length < 2 || $length > 50) {
return false;
}


return $input;
}
function insertDataToDatabase($conn, $table, $data)
{
// Prepare the column and value placeholders
$columns = implode(', ', array_keys($data));
$placeholders = implode(', ', array_fill(0, count($data), '?'));

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");

// Check if the SQL statement preparation was successful
if (!$stmt) {
throw new Exception("Failed to prepare the SQL statement.");
}

// Bind the values to the statement parameters
$types = '';
$values = [];
foreach ($data as $value) {
if (is_int($value)) {
$types .= 'i';  // integer
} elseif (is_float($value)) {
$types .= 'd';  // double
} else {
$types .= 's';  // string
}
$values[] = $value;
}
array_unshift($values, $types);
call_user_func_array([$stmt, 'bind_param'], $values);

// Execute the statement
$stmt->execute();

// Check if any rows were affected
$rowCount = $stmt->affected_rows;

// Close the statement
$stmt->close();

// Return the number of affected rows
return $rowCount;
}
// Function to get similar dogs based on breed
function getSimilarDogs($conn, $breed, $currentDogID) {
    // Prepare the query
    $query = "SELECT * FROM top_dogs WHERE breed = :breed AND id != :currentDogID LIMIT 3";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':breed', $breed);
    $stmt->bindParam(':currentDogID', $currentDogID);

    // Execute the query
    $stmt->execute();

    // Fetch the results
    $similarDogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the similar dogs
    return $similarDogs;
}

// Function to get dog details by ID
function getDogByID($conn, $dogID) {
    // Prepare the query
    $query = "SELECT * FROM top_dogs WHERE id = :dogID";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind the parameter
    $stmt->bindParam(':dogID', $dogID);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $dog = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the dog details
    return $dog;
}


?>