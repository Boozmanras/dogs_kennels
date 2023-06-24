<?php
include('include/header.php');

// Assuming you have a valid database connection object ($conn)
if (isset($_GET['e_id'])) {
$e_id = $_GET['e_id'];
$table = "services";
$columns = "*"; // Replace with the columns you want to retrieve
$conditions = "WHERE id = '$e_id'"; // Replace with optional conditions if needed

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
// Process the retrieved data
foreach ($data as $row) {
$name = $row['name'];
$more = $row['more'];
$img_1 = $row['img_1'];
$img_2 = $row['img_2'];
$img_3 = $row['img_3'];
$img_4 = $row['img_4'];
$img_5 = $row['img_5'];
$img_6 = $row['img_6'];
}
} else {
echo "A";
}
}

if (isset($_POST['edit'])) {
$u_name = $_POST['name'];
$descr = $_POST['more'];
$ed_id = $_POST['edit_id'];

// Delete old images
$imagesToDelete = array();

if (!empty($_FILES['img_1']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_1;
}
if (!empty($_FILES['img_2']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_2;
}
if (!empty($_FILES['img_3']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_3;
}
if (!empty($_FILES['img_4']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_4;
}
if (!empty($_FILES['img_5']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_5;
}
if (!empty($_FILES['img_6']['name'])) {
$imagesToDelete[] = 'assets/img/services/' . $img_6;
}

deleteOldImages($imagesToDelete);

// Handle the image processing for image 1
$img_1_path = processImage($ed_id, 'img_1');

// Handle the image processing for images 2 to 6
$img_paths = array();
$img_names = array('img_2', 'img_3', 'img_4', 'img_5', 'img_6');
foreach ($img_names as $img_name) {
if (!empty($_FILES[$img_name]['name'])) {
$img_path = processImage($ed_id, $img_name);
$img_paths[$img_name] = $img_path;
}
}

// Update the data in the database
$table = "services";
$columns = array("name", "more", "img_1");
$values = array($u_name, $descr, $img_1_path);

// Add the values for images 2 to 6 if they are not empty
foreach ($img_names as $img_name) {
if (!empty($img_paths[$img_name])) {
$columns[] = $img_name;
$values[] = $img_paths[$img_name];
}
}

$conditions = "id = '$ed_id'";

updateDatabaseValues($conn, $table, $columns, $values, $conditions);
}
?>




<div class="content">
<div class="container">
<div class="page-title">
<h3>Edit <?php echo " " . $name; ?></h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header"><?php echo $name; ?></div>
<div class="card-body">
<form accept-charset="utf-8" action="edit_s.php?e_id=<?php echo $e_id; ?>" method="post"
enctype="multipart/form-data">
<input type="hidden" name="edit_id" value="<?php echo $e_id; ?>">
<div class="mb-3">
<label for="email" class="form-label">Name</label>
<input type="text" name="name" placeholder="Service title" class="form-control"
value="<?php echo $name; ?>" required>
</div>
<div class="mb-3">
<label for="about" class="form-label">Description</label>
<textarea class="form-control" name="more" placeholder="Description"
rows="5"><?php echo $more; ?></textarea>
</div>
<div class="mb-3">
<label for="img_1" class="form-label">1 image</label>
<input type="file" class="form-control" name="img_1">
<?php if (!empty($img_1)) : ?>
<img src="<?php echo 'assets/img/services/' . $img_1; ?>" alt="Image"
style="width: 100px; height: auto;">
<?php endif; ?>
</div>

<div id="additionalImagesContainer">
<?php for ($i = 2; $i <= 6; $i++) : ?>
<?php $imgName = 'img_' . $i; ?>
<?php if (!empty($$imgName)) : ?>
<div class="mb-3">
<label for="<?php echo $imgName; ?>" class="form-label"><?php echo $i; ?>
image</label>
<input type="file" class="form-control" name="<?php echo $imgName; ?>">
<img src="<?php echo 'assets/img/services/' . $$imgName; ?>" alt="Image"
style="width: 100px; height: auto;">
</div>
<?php endif; ?>
<?php endfor; ?>
</div>

<button id="addImageButton" class="btn btn-outline-success mb-0">Add Image</button>

</br>
<br>

<div class="mb-3">
<input type="submit" name="edit" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
document.getElementById('addImageButton').addEventListener('click', function(event) {
event.preventDefault();

var container = document.createElement('div');
container.classList.add('mb-3');

var inputIndex = document.querySelectorAll('#additionalImagesContainer input[type="file"]').length + 2;
var inputName = 'img_' + inputIndex;

var label = document.createElement('label');
label.setAttribute('for', inputName);
label.classList.add('form-label');
label.textContent = inputIndex + ' image';

var input = document.createElement('input');
input.setAttribute('type', 'file');
input.classList.add('form-control');
input.setAttribute('name', inputName);

container.appendChild(label);
container.appendChild(input);

document.getElementById('additionalImagesContainer').appendChild(container);

if (inputIndex >= 6) {
document.getElementById('addImageButton').style.display = 'none';
}
});
</script>

<?php
include('include/footer.php');
?>
