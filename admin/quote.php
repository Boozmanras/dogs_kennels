<?php
include('include/header.php');

if(isset($_POST['submit'])){
$title = $_POST['title'];
$quote = $_POST['quote'];
$img = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$folder = "assets/img/quotes/" . $img;

// Now let's move the uploaded image into the folder
if (move_uploaded_file($tempname, $folder)) {
$table = 'quote';
$data = [
'title' => $title,
'img' => $img,
'quote' => $quote

];

try {
$result = insertDataToTable($conn, $table, $data);

if ($result !== false) {
//echo "Data inserted successfully. Inserted row ID: " . $result;
} else {
echo "<script> alert('Failed to insert data.'); </script>";
}
} catch (Exception $e) {
//echo "Error: " . $e->getMessage();
}
}

}
?>


<div class="container">

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">Quotes management</div>
<div class="card-body">
<h5 class="card-title">Add quote.</h5>
<form accept-charset="utf-8" method="post" action="quote.php" enctype="multipart/form-data">
<div class="mb-3">
    <label for="form-label">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="<?php if(isset($title)){echo $title; } ?>"
</div>
<div class="mb-3">
    <label class="form-label">BG Image</label>
    <input type="file" class="form-control" name="img" required value="<?php if(isset($img)){echo $img; } ?>">
</div>
<div class="mb-3">
<label for="quote" class="form-label">Quote</label>
<textarea class="form-control" placeholder="Write quote" name="quote" rows="5"><?php if(isset($quote)){echo $quote; } ?></textarea>
</div>
<div class="mb-3">
<input type="submit" value="Add quote" name="submit" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>

<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header">Quote overview</div>
<div class="card-body">
<p class="card-title">Recent quotes.</p>
<div class="table-responsive">
<table class="table table-sm">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Title</th>
<th scope="Img">Img</th>
<th scope="col">Quote</th>
</tr>
</thead>
<tbody>
<?php
$table = 'quote';
$columns = '*';
$conditions = 'ORDER BY id DESC';

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
    $id = 1; // Initialize $id before the loop
    foreach ($data as $row) {
        ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <th scope="row"><?php echo $row['title']; ?></th>
            <td><?php  echo '<img src="assets/img/quotes/' . $row['img'] . '" style="max-width: 100%; max-height: 50px; border-radius: 25%;" alt="Image">' ?></td>
            <td><?php echo $row['quote']; ?></td>
        </tr>
        <?php
        $id++; // Increment $id
    }
} else {
    echo "Empty.";
}
?>

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