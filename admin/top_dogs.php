<?php
include('include/header.php');

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$dog = nl2br($_POST['dog']);
$age = $_POST['age'];
$size = $_POST['size'];
$breed = $_POST['breed'];
$gender = $_POST['gender'];

$filename = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$img2_name = $_FILES["img2"]["name"];
$t_l = $_FILES["img2"]["tmp_name"];
$img3_name = $_FILES["img3"]["name"];
$t_p = $_FILES["img3"]["tmp_name"];

$folder1 = "assets/img/dogs/" . $filename;
$folder2 = "assets/img/dogs/" . $img2_name;
$folder3 = "assets/img/dogs/" . $img3_name;

// Now let's move the uploaded images into their respective folders
if (
move_uploaded_file($tempname, $folder1) &&
move_uploaded_file($t_l, $folder2) &&
move_uploaded_file($t_p, $folder3)
) {
$table = "top_dogs";
$data = array(
'name' => $name,
'dog' => $dog,
'age' => $age,
'size' => $size,
'breed' => $breed,
'gender' => $gender,
'img' => $filename,
'img2' => $img2_name,
'img3' => $img3_name
);

$result = insertDataToTable($conn, $table, $data);
if ($result) {
// Insertion successful
echo "<script> alert('Data Saved'); </script>";
} else {
// Insertion failed
echo "<script> alert('ERROR'); </script>";
}
} else {
echo "<script> alert('Failed to upload image!'); </script>";
}
}
?>
<div class="content">
<div class="container">
<div class="page-title">
<h3>Top dogs</h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">Add dogs</div>
<div class="card-body">
<form accept-charset="utf-8" action="top_dogs.php" method="POST" enctype="multipart/form-data">
<div class="mb-3">
<label for="email" class="form-label">Name</label>
<input type="text" name="name" placeholder="Dog's name" value="<?php if (isset($name)) {
echo $name;
} ?>" class="form-control" required>
</div>
<div class="mb-3">
<label for="password" class="form-label">A little about the dog</label>
<textarea name="dog" class="form-control" required placeholder="A little about the dog"><?php if (isset($dog)) {
            echo $dog;
        } ?></textarea>
</div>
<div class="mb-3">
<label for="img" class="form-label">Image 1</label>
<input type="file" name="img" placeholder="Dog image" required />
</div>
<div class="mb-3">
<label for="img" class="form-label">Image 2</label>
<input type="file" name="img2" placeholder="Dog image" required />
</div>
<div class="mb-3">
<label for="img" class="form-label">Image 3</label>
<input type="file" name="img3" placeholder="Dog image" required />
</div>
<div class="mb=3">
<label for="age" class="form-label">Age</label>
<input type="text" name="age" class="form-control" placeholder="x years/months" value="<?php if (isset($age)) {
        echo $age;
    } ?>" required>
</div>
<div class="mb=3">
<label for="age" class="form-label">Gender</label>
<select class="form-select" name="gender" required>
<option value="0">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
<div class="mb-3">
<label for="size" class="form-label">Size</label>
<input type="text" class="form-control" placeholder="Dog's size" name="size" value="<?php if (isset($size)) {
    echo $size;
} ?>" required>
</div>
<div class="mb-3">
<label for="breed" class="form-label">Breed</label>
<input type="text" class="form-control" placeholder="Breed" name="breed" value="<?php if (isset($breed)) {
    echo $breed;
} ?>" required>
</div>
<div class="mb-3">
<input type="submit" name="submit" class="btn btn-primary">
</div>
</form>
</div>
</div>
<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header">Team</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Info</th>
<th>Age</th>
<th>Size</th>
<th>Breed</th>
<th>Gender</th>
<th>Img 1</th>
<th>Img 2</th>
<th>Img 3</th>
</tr>
</thead>
<tbody>
<?php
$table = "top_dogs";
$columns = "*";
$conditions = "ORDER BY id DESC";
$data = getDataFromDatabase($conn, $table, $columns, $conditions);
if ($data) {
$id = 1;
foreach ($data as $row) {
?>
<tr>
<th scope="row"><?php echo $id; ?></th>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['dog']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['size']; ?></td>
<td><?php echo $row['breed']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo '<img src="assets/img/dogs/' . $row['img'] . '" style="max-width: 100%; max-height: 50px; border-radius: 25%;" alt="Image">' ?></td>
<td><?php echo '<img src="assets/img/dogs/' . $row['img2'] . '" style="max-width: 100%; max-height: 50px; border-radius: 25%;" alt="Image">' ?></td>
<td><?php echo '<img src="assets/img/dogs/' . $row['img3'] . '" style="max-width: 100%; max-height: 50px; border-radius: 25%;" alt="Image">' ?></td>
</tr>
<?php
$id++;
}
} else {
echo "Failed to retrieve data.";
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
include('include/footer.php');
?>
