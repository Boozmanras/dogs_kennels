<?php
include('includes/header.php');
?>
<!-- Slider -->
<div id="home_carousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<?php
$table = 'quote';
$columns = '*';
$conditions = "ORDER BY id DESC ";
$conditions .= "LIMIT 4";


$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
$slideCount = count($data);
for ($i = 0; $i < $slideCount; $i++) {
$activeClass = ($i === 0) ? 'class="active"' : '';
?>
<li data-target="#home_carousel" data-slide-to="<?php echo $i; ?>" <?php echo $activeClass; ?>></li>
<?php
}
}
?>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
<?php
if ($data) {
$i = 0;
foreach ($data as $row) {
$activeClass = ($i === 0) ? 'active' : '';
?>
<div class="item <?php echo $activeClass; ?>">
<img src="<?php echo 'admin/assets/img/quotes/' . $row['img']; ?>" alt="" />
<div class="carousel-caption">
<h2><?php echo $row['title']; ?></h2>
<p><?php echo $row['quote']; ?></p>
</div>
</div>
<?php
$i++;
}
}
?>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#home_carousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#home_carousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#home_carousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#home_carousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>
<!-- Slider end -->
<!-- Services -->
<div class="container">
<div class="row">
<?php
$table = 'services';
$columns = '*';
$conditions = "ORDER BY id DESC ";


$data1 = getDataFromDatabase($conn, $table, $columns, $conditions);
foreach ($data1 as $row1) {
?>
<div class="col-md-4 col3">
					<a href="services-single.php?service='<?php echo $row1['id']; ?>'" title="<?php echo $row1['name']; ?>"><img src="<?php echo 'admin/assets/img/services/'.$row1['img_2']; ?>" class="roundal"></a>
					<h3><?php echo $row1['name']; ?></h3>
					<p><?php echo substr($row1['more'], 0, 116) . '...'; ?><a href="services-single.php?service=<?php echo $row1['id']; ?>"> Read more</a></p>

				
				</div>
<?php
}
?>

</div>
</div>

<!-- Services end -->
<!-- Carousel -->
<?php 
include('testimony.php');
?>
<!-- Carousel end -->
<!-- Rehome -
<div class="rehome">
<div class="container">
<div class="row">
<div class="col-md-12 centered">
<p><a href="#" title="Dougie" class="roundal"></a></p>
<h4>Could you give <a href="adoption-single.html" title="Could you give Dougie a new home?">Dougie</a> a new home?</h4>
<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
<form method="get" action="https://xenothemes.co.uk/html-templates/petcare/adoption-single.html">	
<button type="submit" class="btn btn-default btn-green">Learn more</button>
</form>
</div>
</div>
</div>
</div> -->
<!-- Rehome end -->
<!-- Testimonials -->
<?php include('testimony2.php');
?>
<!-- Testimonials end -->
<!-- Adoption -->
<div class="container">
<div class="row">
<div class="col-md-12 centered">
<h3><span>Our top dogs</span></h3>
<p>Some texts</p>
</div>
</div>
<div class="row adoption">

<?php
$table = 'top_dogs';
$columns = '*';
$conditions = "ORDER BY id DESC ";
//$conditions .= "LIMIT 4";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) { 
    foreach ($data as $row) {
        ?>
        <div class="col-md-4">
            <a href="top_dogs.php?dog=<?php echo $row['id']; ?>" title=""><img src="<?php echo 'admin/assets/img/dogs/'.$row['img']; ?>" alt="<?php echo $row['name']; ?>" /></a>
            <div class="title">
                <h5>
                    <span data-hover="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></span>
                </h5>
            </div>
        </div>
        <?php
    }
}
?>

</div>

</div>
<!-- Adoption end -->
</br>
<?php
include('includes/footer.php');
?>