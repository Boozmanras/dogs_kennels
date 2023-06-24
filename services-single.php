<?php
include('includes/header.php');

$service_id = filter_input(INPUT_GET, 'service', FILTER_SANITIZE_NUMBER_INT);

if ($service_id == false) {
echo "<h1>YOU ARE 100% LOST!!!</h1>";
} else {


?>
<style>
  .social-share {
    text-align: center;
    margin-top: 20px;
  }

  .social-share p {
    margin-bottom: 10px;
  }

  .social-share .share-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    color: #fff;
    transition: background-color 0.3s ease;
    margin-right: 10px;
    margin-bottom: 10px; /* Add margin bottom to create spacing between buttons */
  }

  .social-share .whatsapp {
    background-color: #25d366;
  }

  .social-share .twitter {
    background-color: #1da1f2;
  }

  .social-share .facebook {
    background-color: #1877f2;
  }

  .social-share .instagram {
    background-color: #c32aa3;
  }

  .social-share .tiktok {
    background-color: #69c9d0;
  }

  .social-share .share-button:hover {
    opacity: 0.8;
  }

</style>

<!-- Services -->
<div class="container">
<?php
$table = "services";
$columns = "*";
$conditions = "WHERE id =".$service_id;
$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
foreach ($data as $row) {
?>
<div class="row adoption-single">
<div class="col-md-6">
<!-- Slider -->
<div id="adoption" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo 'admin/assets/img/services/'.$row['img_1']; ?>" alt="<?php echo $row['name']; ?>" style="width: 100%; height: 300px; object-fit: cover;">
        </div>
        <?php
        for ($i = 2; $i <= 6; $i++) {
            $imgKey = 'img_'.$i;
            if (!empty($row[$imgKey])) {
                ?>
                <div class="item">
                    <img src="<?php echo 'admin/assets/img/services/'.$row[$imgKey]; ?>" alt="<?php echo $row['name']; ?>" style="width: 100%; height: 300px; object-fit: cover;">
                </div>
                <?php
            }
        }
        ?>
    </div>

    <!-- Indicators -->
    <ul class="carousel-indicators" style="display: inline-flex;">
        <?php for($i = 1; $i <= 6; $i++) {
            if(!empty($row['img_'.$i])) { ?>
                <li data-target="#adoption" data-slide-to="<?php echo ($i - 1); ?>" <?php if($i == 1) echo 'class="active"'; ?>>
                    <img src="<?php echo 'admin/assets/img/services/'.$row['img_'.$i]; ?>" alt="<?php echo $row['name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                </li>
        <?php }} ?>
    </ul>
</div>


<!-- Slider end -->
</div>
<div class="col-md-6">
<h2><?php echo $row['name']; ?></h2>
<p><?php echo $row['more']; ?></p>
Share with your frinds
<div class="social-share">

<!-- WhatsApp Share Button -->

<a class="share-button whatsapp" href="https://api.whatsapp.com/send?text=Check%20out%20this%20awesome%20content%21" target="_blank" rel="nofollow">WhatsApp</a>

<!-- Twitter Share Button -->
<a class="share-button twitter" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fexample.com&text=Check%20out%20this%20awesome%20content%21" target="_blank" rel="nofollow">Twitter</a>

<!-- Facebook Share Button -->
<a class="share-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com" target="_blank" rel="nofollow">Facebook</a>

<!-- Instagram Share Button -->
<a class="share-button instagram" href="https://www.instagram.com/" target="_blank" rel="nofollow">Instagram</a>



</div>
</div>
</div>
</div>

<?php
}  } else{ echo "<h1>YOU ARE 100% LOST!!!</h1>"; }
?>











<?php
}
include('includes/footer.php');
?>