<?php
function getDataFromDatabase($conn, $table, $columns, $conditions = '') {
try {
// Prepare the SQL statement
$sql = "SELECT $columns FROM $table $conditions";
$stmt = $conn->prepare($sql);

// Check if the SQL statement preparation was successful
if (!$stmt) {
throw new Exception("Failed to prepare the SQL statement: $sql");
}

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch the data into an associative array
$data = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement and result set
$stmt->close();
$result->free_result();

return $data;
} catch (Exception $e) {
// Handle the exception, log an error, or display an error message
echo "Error: " . $e->getMessage();
return false;
}
}

function insertDataToTable($conn, $table, $data) {
try {
// Prepare the column names and placeholders
$columns = implode(', ', array_keys($data));
$placeholders = implode(', ', array_fill(0, count($data), '?'));

// Prepare the SQL statement
$sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
$stmt = $conn->prepare($sql);

// Check if the SQL statement preparation was successful
if (!$stmt) {
throw new Exception("Failed to prepare the SQL statement: $sql");
}

// Bind the values to the prepared statement
$stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));

// Execute the statement
$stmt->execute();

// Check if any error occurred during the execution
if ($stmt->errno !== 0) {
throw new Exception("Failed to execute the SQL statement: $sql\nError: " . $stmt->error);
}

// Close the statement
$stmt->close();

// Optionally, you can return the inserted row ID or any other value you need
return $conn->insert_id;
} catch (Exception $e) {
// Handle the exception, log an error, or display an error message
echo "Error: " . $e->getMessage();
return false;
}
}


// Function to handle file upload
function uploadFile($inputName, $targetDirectory) {
$targetFile = $targetDirectory . basename($_FILES[$inputName]["name"]);

if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
return basename($_FILES[$inputName]["name"]);
}

return null;
}

/*
function uploadFile($inputName, $targetDirectory) {
$targetFile = $targetDirectory . basename($_FILES[$inputName]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if the file is an actual image or fake image
$check = getimagesize($_FILES[$inputName]["tmp_name"]);
if ($check === false) {
echo "<script>alert('Error: File is not an image.');</script>";
$uploadOk = 0;
}

// Check if the file already exists
if (file_exists($targetFile)) {
echo "<script>alert('Error: File already exists.');</script>";
$uploadOk = 0;
}

// Check file size
if ($_FILES[$inputName]["size"] > 1000000) {
echo "<script>alert('Error: File is too large. Maximum size allowed is 1MB.');</script>";
$uploadOk = 0;
}

// Allow only specific file formats (e.g., JPEG, PNG)
$allowedFormats = array("jpg", "jpeg", "png");
if (!in_array($imageFileType, $allowedFormats)) {
echo "<script>alert('Error: Only JPG, JPEG, and PNG files are allowed.');</script>";
$uploadOk = 0;
}

// If no errors, move the uploaded file to the target directory
if ($uploadOk == 1) {
if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
return basename($_FILES[$inputName]["name"]);
} else {
echo "<script>alert('Error: Failed to upload file.');</script>";
}
}

return null;
}
*/

//update data
function updateDatabaseValues($conn, $table, $columns, $values, $conditions = '') {
    try {
        // Prepare the SQL statement
        $setStatements = array_map(function ($column) {
            return $column . ' = ?';
        }, $columns);
        $setClause = implode(', ', $setStatements);
        $stmt = $conn->prepare("UPDATE $table SET $setClause $conditions");

        // Check if the SQL statement preparation was successful
        if (!$stmt) {
            throw new Exception("Failed to prepare the SQL statement.");
        }

        // Bind the parameters and execute the statement
        $bindTypes = str_repeat('s', count($columns));
        $stmt->bind_param($bindTypes, ...$values);
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Update was successful
            echo "<script> alert('Values updated successfully.');</script>";
        } else {
            // No rows were affected, handle the case as needed
            echo "No rows were affected.";
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Handle the exception, log an error, or display an error message
        // echo "Error: " . $e->getMessage();
    }
}


function addWatermarkToImage($sourceImagePath, $watermarkImagePath, $outputImagePath) {
// Get the file extensions
$sourceExtension = pathinfo($sourceImagePath, PATHINFO_EXTENSION);
$watermarkExtension = pathinfo($watermarkImagePath, PATHINFO_EXTENSION);

// Check the file extensions and load the images accordingly
if ($sourceExtension === 'jpg' || $sourceExtension === 'jpeg') {
$sourceImage = imagecreatefromjpeg($sourceImagePath);
} elseif ($sourceExtension === 'png') {
$sourceImage = imagecreatefrompng($sourceImagePath);
} else {
die("Unsupported source image file type.");
}

if ($watermarkExtension === 'jpg' || $watermarkExtension === 'jpeg') {
$watermarkImage = imagecreatefromjpeg($watermarkImagePath);
} elseif ($watermarkExtension === 'png') {
$watermarkImage = imagecreatefrompng($watermarkImagePath);
} else {
die("Unsupported watermark image file type.");
}

// Get the dimensions of the source image and watermark image
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);
$watermarkWidth = imagesx($watermarkImage);
$watermarkHeight = imagesy($watermarkImage);

// Calculate the position to place the watermark (bottom right corner)
$positionX = $sourceWidth - $watermarkWidth - 10; // 10 pixels from the right edge
$positionY = $sourceHeight - $watermarkHeight - 10; // 10 pixels from the bottom edge

// Merge the watermark image with the source image
imagecopy($sourceImage, $watermarkImage, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

// Save the final image based on the source image format
if ($sourceExtension === 'jpg' || $sourceExtension === 'jpeg') {
imagejpeg($sourceImage, $outputImagePath);
} elseif ($sourceExtension === 'png') {
imagepng($sourceImage, $outputImagePath);
} else {
die("Unsupported output image file type.");
}

// Free up memory
imagedestroy($sourceImage);
imagedestroy($watermarkImage);

// Unlink (delete) the source image
unlink($sourceImagePath);
}


//data deletion
function deleteDataFromTable($conn, $table, $condition) {
// Sanitize the table name and condition to prevent SQL injection
$table = mysqli_real_escape_string($conn, $table);
$condition = mysqli_real_escape_string($conn, $condition);

// Construct the DELETE query
$query = "DELETE FROM $table WHERE $condition";

// Execute the DELETE query
if (mysqli_query($conn, $query)) {
// Deletion successful
return true;
} else {
// Deletion failed
return false;
}
}

function deleteOldImages($imagePaths) {
foreach ($imagePaths as $imagePath) {
if (!empty($imagePath)) {
if (file_exists($imagePath)) {
unlink($imagePath);
}
}
}
}


function processImage($id, $inputName) {
$targetDir = "assets/img/services/";
$targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Generate a unique filename for the uploaded image
$newFileName = $id . '_' . $inputName . '.' . $imageFileType;
$newFilePath = $targetDir . $newFileName;

// Check if a file was uploaded
if (!empty($_FILES[$inputName]["tmp_name"])) {
// Move the uploaded file to the target directory with the new filename
if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $newFilePath)) {
// Determine the image function based on the file extension
if ($imageFileType === 'png') {
// Process PNG image
addWatermarkToImage($newFilePath, $newFilePath, 'assets/img/t_logo.png');
} elseif (in_array($imageFileType, array('jpg', 'jpeg'))) {
// Process JPEG image
addWatermarkToJPEGImage($newFilePath, 'assets/img/t_logo.png', $newFilePath);
} else {
echo "Sorry, only PNG, JPG, and JPEG files are allowed.";
return "";
}

return $newFileName;
} else {
echo "Sorry, there was an error uploading your file.";
return "";
}
} else {
// No file was uploaded for this input
return "";
}
}

function addWatermarkToJPEGImage($sourceFile, $watermarkFile, $outputFile) {
$sourceImage = imagecreatefromjpeg($sourceFile);
$watermarkImage = imagecreatefrompng($watermarkFile);
$watermarkWidth = imagesx($watermarkImage);
$watermarkHeight = imagesy($watermarkImage);
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Calculate the position of the watermark on the source image
$positionX = $sourceWidth - $watermarkWidth - 10; // 10px padding from the right
$positionY = $sourceHeight - $watermarkHeight - 10; // 10px padding from the bottom

// Merge the watermark onto the source image
imagecopy($sourceImage, $watermarkImage, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

// Save the result to the output file
imagejpeg($sourceImage, $outputFile);

// Free memory
imagedestroy($sourceImage);
imagedestroy($watermarkImage);
}
// Function to delete the old image file
function deleteOldImage($imagePath) {
if (!empty($imagePath) && file_exists($imagePath)) {
unlink($imagePath);
}
}

function getTotalRowCount($conn, $tableName, $conditions = '') {
try {
// Prepare the SQL statement with conditions
$sql = "SELECT COUNT(*) as total FROM $tableName $conditions";

// Execute the query
$result = $conn->query($sql);

// Check if the query execution was successful
if (!$result) {
throw new Exception("Failed to execute the SQL query: " . $conn->error);
}

// Fetch the total row count
$row = $result->fetch_assoc();
$totalCount = $row['total'];

// Free the result set
$result->free();

// Return the total row count
return $totalCount;
} catch (Exception $e) {
// Handle the exception, log an error, or display an error message
echo "Error: " . $e->getMessage();
return false;
}
}


?>

