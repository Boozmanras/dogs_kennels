<?php
include('include/header.php');




if(isset($_POST['team'])){
$name = $_POST['name'];
$role = $_POST['role'];
$twitter = $_POST['twitter'];
$fb = $_POST['fb'];

$filename = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$folder = "./assets/img/" . $filename;

// Now let's move the uploaded image into the folder
if (move_uploaded_file($tempname, $folder)) {
$table = "team";
$data = array(
'name' => $name,
'role' => $role,
'img' => $filename,
'twitter' => $twitter,
'fb' => $fb
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
<h3>Team</h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">Add team</div>
<div class="card-body">

<form accept-charset="utf-8" action="team.php" method="POST" enctype="multipart/form-data">
<div class="mb-3">
<label for="email" class="form-label">Name</label>
<input type="text" name="name" placeholder="enter full name" value="<?php if(isset($name)){echo $name;} ?>" class="form-control" required>
</div>
<div class="mb-3">
<label for="password" class="form-label">Role</label>
<textarea name="role" class="form-control" required placeholder="Role"><?php if(isset($role)){echo $role;} ?></textarea>

</div>
<div class="mb-3">
<label for="img" class="form-label">Image</label>
<input type="file" name="img" placeholder="User image" required/>    
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">@</span>
<input type="text" class="form-control" name="twitter" placeholder="Twitter Username" value="<?php if(isset($twitter)){echo $twitter;} ?>" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1"><span class="fas fa-link"></span></span>
<input type="text" class="form-control" name="fb" placeholder="Facebook account link" value="<?php if(isset($fb)){echo $fb;} ?>" aria-label="Facebook account" aria-describedby="basic-addon1">
</div>


<div class="mb-3">
<input type="submit" name="team" class="btn btn-primary">
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
<th>Full name</th>
<th>Bios</th>
<th>image</th>
<th>Twitter Username</th>
<th>Facebook link</th>
</tr>
</thead>
<tbody>
<?php

// Assuming $conn is your database connection object
$table = "team";
$columns = "*";
$conditions = "";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);
if ($data) {
// Data retrieval successful
$id = 1;
foreach ($data as $row) {

?>






<tr>
<th scope="row"><?php echo $id; ?></th>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['role']; ?></td>
<td><?php  echo '<img src="assets/img/' . $row['img'] . '" style="max-width: 100%; max-height: 50px; border-radius: 25%;" alt="Image">' ?></td>

<td><?php echo $row['twitter']; ?></td>
<td><?php echo $row['fb']; ?></td>


</tr>
<?php
$id++;
}
} else {
// Data retrieval failed
echo "Failed to retrieve data.";
}?>

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>










<?php
include('include/footer.php');
?>