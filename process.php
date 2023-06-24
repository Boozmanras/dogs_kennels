<?php
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = validateUserInput($_POST["name"]);
    $image = $_FILES["image"]["name"];
    $message = validateUserInput($_POST["message"]);

    $targetDir = "admin/assets/img/customer/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    $table = 'testimonies';
    $data = [
        'name' => $name,
        'location' => $message,
        'img' => $image,
        'status' => 'no'
    ];

    try {
        $result = insertDataToDatabase($conn, $table, $data);

        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Failed to insert data.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
