<?php
$table = "settings";
$columns = "email,phone,about_us";
$conditions = "WHERE id = 1";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

// Use the retrieved data

    foreach ($data as $row) {
		$about = $row['about_us'];
        $email = $row['email'];
        $tel = $row['phone'];
		
	}

?>
<!-- Footer -->
<div class="footer">
<div class="container">
<div class="row">
<div class="col-md-3">
<h6>A little about us</h6>

<p><?php echo substr($about, 0, 247) . '...'; ?><a href="about.php"> Read more</a></p>
</div>
<div class="col-md-3">
<h6>You may need this</h6>
<ul>
<li><a href="index.php" title="Home">Home</a></li>
<li><a href="contact.php" title="Contact us">Contact us</a></li>
<li><a href="#" title="">Terms &amp; conditions</a></li>
<li><a href="#" title="">Privacy policy</a></li>
<li><a href="add_testimony.php">Add testimony</a></li>
</ul>
</div>
<div class="col-md-3 contact-info">
<h6>Keep in touch</h6>
<p>Follow us on social media.</p>
<p class="social">
<a href="#" class="facebook"></a> <a href="#" class="instagram"></a> <a href="#" class="twitter"></a><a href="#" class="tiktok"></a>
</p>
<p class="c-details">
<span>Mail</span> <a href="<?php echo 'mailto:'.$email; ?>"><?php echo $email;?></a>
<br >
<br>
<span>Tel</span><a href="<?php echo 'tel:'.$tel;?>"><?php echo $tel; ?></a>

</p>
</div>
</div>
<div class="row">
<div class="col-md-12 copyright">
<p>&copy; Copyright <?php echo date('Y'); ?>. All rights reserved.</p>
</div>
</div>
</div>
</div>


<!-- Footer end -->
<script>
// JavaScript code to hide the loader after the page loads
window.addEventListener("load", function() {
var loader = document.getElementById("loader");
loader.classList.add("hidden");
});
</script>
<!-- Javascript plugins -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/carouFredSel.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/ekkoLightbox.js"></script>
<script src="js/custom.js"></script>
</body>
</html>