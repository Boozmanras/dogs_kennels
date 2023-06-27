<?php include('includes/header.php'); ?>
<!-- Navigation end -->
<style>
.product-view {
display: flex;
align-items: center;
justify-content: flex-start;
max-width: 1200px;
margin: 0 auto;
overflow-x: auto;
padding: 20px 0;
}

.product-card {
flex: 0 0 calc(33.33% - 20px);
display: flex;
flex-direction: column;
margin-right: 20px;
border-radius: 8px;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.product-images {
width: 100%;
position: relative;
overflow: hidden;
border-radius: 8px 8px 0 0;
height: 0;
padding-top: 66.66%;
}

.product-images img {
width: 100%;
height: 100%;
object-fit: cover;
display: none;
position: absolute;
top: 0;
left: 0;
animation: slideImage 6s infinite;
border-radius: 8px 8px 0 0;
}

.product-card.active .product-images img {
display: block;
}

.product-description {
padding: 20px;
background-color: #f1f1f1;
flex-grow: 1;
display: flex;
flex-direction: column;
justify-content: space-between;
border-radius: 0 0 8px 8px;
}

.product-description h2 {
font-size: 24px;
margin-bottom: 10px;
color: #333;
}

.product-description p {
font-size: 16px;
margin-bottom: 20px;
color: #666;
}

.btn {
display: inline-block;
padding: 10px 20px;
background-color: #337ab7;
color: #fff;
text-decoration: none;
border-radius: 5px;
font-size: 18px;
transition: background-color 0.3s ease;
}

.btn:hover {
background-color: #23527c;
}

@keyframes slideImage {
0% {
opacity: 0;
}
20% {
opacity: 1;
}
33.33% {
opacity: 1;
}
53.33% {
opacity: 0;
}
100% {
opacity: 0;
}
}
</style>
<!-- Services -->
<!-- Services -->


<div class="container">
<div class="row">
<div class="col-md-12 centered">
<h3><span>Our services</span></h3>

</div>
</div>
</div>
<?php
$table = "services";
$columns = "*";
$conditions = "";
$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
foreach ($data as $row) {
?>
<div class="container">
<div class="row">
<div class="col-md-4 col3">
<a href="services-single.php?service='<?php echo $row['id']; ?>'" title="<?php echo $row['name']; ?>"><img src="<?php echo 'admin/assets/img/services/'.$row['img_2']; ?>" class="roundal"></a>
<h3><?php echo $row['name']; ?></h3>
<p><?php echo substr($row['more'], 0, 116) . '...'; ?><a href="services-single.php?service=<?php echo $row['id']; ?>"> Read more</a></p>


</div>

<?php } } else{echo 'no service'; } include('testimony.php') ?>
<!-- Testimonials -->
<div class="testimonials" data-stellar-background-ratio="0.6">
<div class="container">
<div class="row">
<div class="col-md-12 centered">
<!-- Slider -->
<?php include('testimony2.php'); ?>
<!-- Slider end -->
</div>
</div>
</div>
</div>
<!-- Testimonials end -->

<br>
<?php include('includes/footer.php'); ?>
