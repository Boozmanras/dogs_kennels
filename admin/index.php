<?php include('include/header.php'); ?>
<!-- end of navbar navigation -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-md-12 page-header">
<div class="page-pretitle">Overview</div>
<h2 class="page-title">Dashboard</h2>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
<div class="card">
<div class="content">
<div class="row">
<div class="col-sm-4">
<div class="icon-big text-center">
<i class="teal fas fa-users"></i>
</div>
</div>
<div class="col-sm-8">
<div class="detail">

<span class="number">Team</span>
</div>
</div>
</div>
<div class="footer">
<hr />
<div class="stats">
<?php
// Assuming you have a valid database connection stored in the $conn variable
$tableName = "team"; // Replace with the actual name of your table
$conditions = ""; // Replace with your desired conditions

// Call the getTotalRowCount function with conditions
$totalCount = getTotalRowCount($conn, $tableName, $conditions);

// Check if the total count was successfully retrieved
if ($totalCount !== false) {
echo  $totalCount;
} else {
echo "Error.";
}

?>

</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
<div class="card">
<div class="content">
<div class="row">
<div class="col-sm-4">
<div class="icon-big text-center">
<i class="olive fas fa-tools"></i>
</div>
</div>
<div class="col-sm-8">
<div class="detail">

<span class="number">Services</span>
</div>
</div>
</div>
<div class="footer">
<hr />
<div class="stats">
<?php
// Assuming you have a valid database connection stored in the $conn variable
$tableName = "services"; // Replace with the actual name of your table
$conditions = ""; // Replace with your desired conditions

// Call the getTotalRowCount function with conditions
$totalCount = getTotalRowCount($conn, $tableName, $conditions);

// Check if the total count was successfully retrieved
if ($totalCount !== false) {
echo  $totalCount;
} else {
echo "Error.";
}

?>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
<div class="card">
<div class="content">
<div class="row">
<div class="col-sm-4">
<div class="icon-big text-center">
<i class="blue fas fa-dog"></i>
</div>
</div>
<div class="col-sm-8">
<div class="detail">
<span class="number">Top dogs</span>
</div>
</div>
</div>
<div class="footer">
<hr />
<div class="stats">
<?php
// Assuming you have a valid database connection stored in the $conn variable
$tableName = "top_dogs"; // Replace with the actual name of your table
$conditions = ""; // Replace with your desired conditions

// Call the getTotalRowCount function with conditions
$totalCount = getTotalRowCount($conn, $tableName, $conditions);

// Check if the total count was successfully retrieved
if ($totalCount !== false) {
echo  $totalCount;
} else {
echo "Error.";
}

?>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
<div class="card">
<div class="content">
<div class="row">
<div class="col-sm-4">
<div class="icon-big text-center">
<i class="orange fas fa-frown"></i>
</div>
</div>
<div class="col-sm-8">
<div class="detail">

<span class="number">Inactive testimonies</span>
</div>
</div>
</div>
<div class="footer">
<hr />
<div class="stats">
<?php
// Assuming you have a valid database connection stored in the $conn variable
$tableName = "testimonies"; // Replace with the actual name of your table
$conditions = "WHERE status = 'no'"; // Replace with your desired conditions

// Call the getTotalRowCount function with conditions
$totalCount = getTotalRowCount($conn, $tableName, $conditions);

// Check if the total count was successfully retrieved
if ($totalCount !== false) {
echo  $totalCount;
} else {
echo "Error.";
}

?>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
<div class="card">
<div class="content">
<div class="row">
<div class="col-sm-4">
<div class="icon-big text-center">
<i class="orange fas fa-smile-beam"></i>
</div>
</div>
<div class="col-sm-8">
<div class="detail">

<span class="number">Active testimonies</span>
</div>
</div>
</div>
<div class="footer">
<hr />
<div class="stats">
<?php
// Assuming you have a valid database connection stored in the $conn variable
$tableName = "testimonies"; // Replace with the actual name of your table
$conditions = "WHERE status = 'yes'"; // Replace with your desired conditions

// Call the getTotalRowCount function with conditions
$totalCount = getTotalRowCount($conn, $tableName, $conditions);

// Check if the total count was successfully retrieved
if ($totalCount !== false) {
echo  $totalCount;
} else {
echo "Error.";
}

?>
</div>
</div>
</div>
</div>
</div>
</div>



</div>
</div>
</div>
</div>
</div>
<?php include('include/footer.php'); ?>