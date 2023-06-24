<?php
include('include/header.php');

if (isset($_GET['d_id'])) {
$del = $_GET['d_id'];
$table = "services";
$condition = "id =".$del; // Example condition

// Call the function to delete data from the table
if (deleteDataFromTable($conn, $table, $condition)) {
echo "<script> alert('Data deleted successfully');</script>";
} else {
echo "<script> alert('Failed to delete data.');</script>";
}


}


?>
<style>
.thumbnail {
max-width: 100px;
max-height: 100px;
cursor: pointer;
}

.fullscreen {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.9);
display: flex;
align-items: center;
justify-content: center;
z-index: 9999;
}

.fullscreen img {
max-height: 90%;
max-width: 90%;
}

</style>
<div class="content">
<div class="container">
<div class="page-title">

</div>
<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header">Manage services</div>
<div class="card-body">
<p class="card-title">Services overview.</p>
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Service</th>
<th scope="col">About</th>
<th scope="col">Image 1</th>
<th scope="col">Image 2</th>
<th scope="col">Image 3</th>
<th scope="col">Image 4</th>
<th scope="col">Image 5</th>
<th scope="col">Image 6</th>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
</tr>
</thead>
<tbody>
<?php
$table = 'services';
$columns = '*';
$conditions = '';

// Call the getDataFromDatabase function
$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
$id = 1;
foreach ($data as $row) {
// Access the data for each row
$r_id = $row['id'];
?>
<tr>
<th scope="row"><?php echo $id; ?></th>
<th scope="row"><?php echo $row['name']; ?></th>
<td><?php echo $row['more']; ?></td>
<td>
<?php echo '<img src="assets/img/services/'.$row['img_1'].'" class="thumbnail" data-src="assets/img/services/'.$row['img_1'].'" alt="Image 1">'; ?>
</td>

<td>
<?php if (!empty($row['img_2'])) { echo '<img src="assets/img/services/' . $row['img_2'] . '" class="thumbnail" data-src="assets/img/services/' . $row['img_2'] . '" alt="Image 2">'; } else { echo 'No image 2'; } ?>
</td>
<td>
<?php if (!empty($row['img_3'])) { echo '<img src="assets/img/services/' . $row['img_3'] . '" class="thumbnail" data-src="assets/img/services/' . $row['img_3'] . '" alt="Image 3">'; } else { echo 'No image 3'; } ?>
</td>
<td>
<?php if (!empty($row['img_4'])) { echo '<img src="assets/img/services/' . $row['img_4'] . '" class="thumbnail" data-src="assets/img/services/' . $row['img_4'] . '" alt="Image 4">'; } else { echo 'No image 4'; } ?>
</td>
<td>
<?php if (!empty($row['img_5'])) { echo '<img src="assets/img/services/' . $row['img_5'] . '" class="thumbnail" data-src="assets/img/services/' . $row['img_5'] . '" alt="Image 5">'; } else { echo 'No image 5'; } ?>
</td>
<td>
<?php if (!empty($row['img_6'])) { echo '<img src="assets/img/services/' . $row['img_6'] . '" class="thumbnail" data-src="assets/img/services/' . $row['img_6'] . '" alt="Image 6">'; } else { echo 'No image 6'; } ?>
</td>

<td><a href='edit_s.php?e_id=<?php echo $r_id; ?>' class="btn btn-warning mb-2"> <i class="fas fa-edit"></i></a></td>
<td><a href='manage_service.php?d_id=<?php echo $r_id; ?>' class="btn btn-danger mb-2" onclick="return confirmDelete();"><i class="fas fa-trash-alt"></i></a></td>

<?php
$id++;   } }
?>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<script>
function confirmDelete() {
return confirm("Are you sure you want to delete?");
}

document.addEventListener('DOMContentLoaded', function() {
var thumbnails = document.querySelectorAll('.thumbnail');

thumbnails.forEach(function(thumbnail) {
thumbnail.addEventListener('click', function() {
var imageSrc = this.getAttribute('data-src');
showFullscreenImage(imageSrc);
});
});

function showFullscreenImage(src) {
var fullscreenContainer = document.createElement('div');
fullscreenContainer.className = 'fullscreen';

var image = document.createElement('img');
image.src = src;

fullscreenContainer.appendChild(image);
document.body.appendChild(fullscreenContainer);

fullscreenContainer.addEventListener('click', function() {
document.body.removeChild(fullscreenContainer);
});
}
});

</script>
<?php
include('include/footer.php');
?>