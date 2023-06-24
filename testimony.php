<div class="row">
<div class="col-md-12 centered">
<h3><span>Some of our happy doggy customers</span></h3>
<p>Customer satisfaction is our priority.</p>
</div>
</div>
</div>
<!-- Services end -->
<!-- Carousel -->
<div id="c-carousel">
<div id="wrapper">
<div id="carousel">

<?php
$table = 'testimonies';
$columns = 'img, name, location';
$conditions = "WHERE status = 'yes'";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
foreach ($data as $row) {
?>
<div>
<a href="admin/assets/img/customer/<?php echo $row['img']; ?>" title="<?php echo $row['name']; ?>" data-hover="<?php echo $row['name']; ?>" data-toggle="lightbox" class="lightbox">
<img src="admin/assets/img/customer/<?php echo $row['img']; ?>" alt="Dog" />
</a>
</div>
<?php 
}
} else {
echo "No testimonies found.";
}
?>

</div>
<div id="pager" class="pager"></div>
</div>
</div>
<!-- Carousel end -->
