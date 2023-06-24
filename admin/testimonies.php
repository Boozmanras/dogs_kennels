<?php
include('include/header.php');
if (isset($_GET['green'])) {
$id = $_GET['green'];
$table = 'testimonies';
$columns = ['status'];
$values = ['no'];
$conditions = 'WHERE id = ' . $id;

updateDatabaseValues($conn, $table, $columns, $values, $conditions);
}
if (isset($_GET['red'])) {
$id = $_GET['red'];
$table = 'testimonies';
$columns = ['status'];
$values = ['yes'];
$conditions = 'WHERE id = ' . $id;

updateDatabaseValues($conn, $table, $columns, $values, $conditions);
}

?>
<div class ='container'>
<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header">Testimonies</div>
<div class="card-body">
<p class="card-title">Manage.</p>
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Name</th>
<th scope="col">Review</th>
<th scope="col">Image</th>
<th scope="col">Status</th>
</tr>
</thead>
<?php
$table = 'testimonies';
$columns = '*';
$conditions = ' ORDER BY id DESC';
$data = getDataFromDatabase($conn, $table, $columns, $conditions);
if ($data) { $t_id = 1;
foreach ($data as $row) {


?>
<tbody>
<tr>
<th scope="row"><?php echo $t_id; ?></th>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['location']; ?></td>
<td style="padding: 0;">
<div style="max-width: 100px; height: auto; overflow: hidden;">
<img src="<?php echo 'assets/img/customer/' . $row['img']; ?>" style="max-width: 150%; height: auto;">
</div>
</td>


<td>
<?php if ($row['status'] == 'no') { ?>
<a href="testimonies.php?green=<?php echo $row['id']; ?>" class="btn btn-outline-success mb-2" onclick="return confirm('Are you sure you\'d like to publish it?');">
<i class="fas fa-check" style="color: forestgreen"></i>
</a>
<?php } else if ($row['status'] == 'yes') { ?>
<a href='testimonies.php?red=<?php echo $row['id']; ?>' class="btn btn-outline-danger mb-2" onclick="return confirm('Are you sure you want to unpublish this?');">
<i class="fas fa-trash" style="color: red;"></i>
</a>
<?php } ?>
</td>

</tr>

</tbody>
<?php     }
}
?>
</table>
</div>
</div>
</div>
</div>


<?php
include('include/footer.php');
?>