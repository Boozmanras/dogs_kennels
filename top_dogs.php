<?php
include('includes/header.php');


// Get the dog ID from the URL parameter
$dogID = isset($_GET['dog']) ? $_GET['dog'] : '';

// Validate the dog ID
if (ctype_digit($dogID)) {
    $table = 'top_dogs';
    $columns = '*';
    $conditions = "WHERE id = $dogID";
    
    $data = getDataFromDatabase($conn, $table, $columns, $conditions);
    
    if ($data) {

?>
		<!-- Navigation end -->
		<!-- Services -->
		<div class="container">
			
            <?php 
        foreach ($data as $row) {
            ?>
			<div class="row adoption-single">
				<div class="col-md-6">
					<!-- Slider -->
					<div id="adoption" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<img src="<?php echo 'admin/assets/img/dogs/'.$row['img']; ?>" alt="<?php echo $row['name']; ?>" />
							</div>
							<div class="item">
								<img src="<?php echo 'admin/assets/img/dogs/'.$row['img2'] ?>" alt="<?php echo $row['name']; ?>" />
							</div>
							<div class="item">
								<img src="<?php echo 'admin/assets/img/dogs/'.$row['img3']; ?>" alt="<?php echo $row['name']; ?>" />
							</div>
						</div>
                       
						<!-- Indicators -->
						<ul class="carousel-indicators">
							<li data-target="#adoption" data-slide-to="0" class="active"><img src="<?php echo 'admin/assets/img/dogs/'.$row['img']; ?>" alt="<?php echo $row['name']; ?>" /></li>
							<li data-target="#adoption" data-slide-to="1"><img src="<?php echo 'admin/assets/img/dogs/'.$row['img2']; ?>" alt="<?php echo $row['name']; ?>" /></li>
							<li data-target="#adoption" data-slide-to="2"><img src="<?php echo 'admin/assets/img/dogs/'.$row['name']; ?>" alt="<?php echo $row['name']; ?>" /></li>
						</ul>

					</div>
					<!-- Slider end -->
				</div>
				<div class="col-md-6">
					<h2><?php echo $row['name']; ?></h2>
					<p><?php echo $row['dog']; ?></p>
					<ol>
						<li><span>Age</span><?php echo $row['age']; ?></li>
						<li><span>Size</span> <?php echo $row['size']; ?></li>
						<li><span>Breed</span> <?php echo $row['breed']; ?></li>
						<li><span>Gender</span> <?php echo $row['gender']; ?></li>
					
					</ol>
				
				</div>
			</div>
		</div>
		<!-- Adoption 
        //add here code to select similar dogs from database-->
        <div class="container">
                <div class="row">
                    <div class="col-md-12 centered">
                        <h3><span>We have more dogs</span></h3>
                        <p></p>
                    </div>
                </div>
             
                <?php
               $breed = $row['breed'];
               $c_id = $row['id'];
                    $table = 'top_dogs';
                    $columns = '*';
                    $conditions = "WHERE breed = '$breed'";
                    $conditions .= " AND id != $c_id";
                    
                    
                    $similarDogs = getDataFromDatabase($conn, $table, $columns, $conditions);
                ?>
                <div class="row adoption">
                    <?php
                    // Get similar dogs
                  

                    // Display similar dogs
                    foreach ($similarDogs as $similarDog) {
                        ?>
                        <div class="col-md-4">
                            <a href="top_dogs.php?dog=<?php echo $similarDog['id']; ?>" title="<?php echo $similarDog['name']; ?>"><img src="<?php echo 'admin/assets/img/dogs/'.$similarDog['img']; ?>" alt="<?php echo $similarDog['breed']; ?>" /></a>
                            <div class="title">
                                <h5>
                                    <span data-hover="<?php echo $similarDog['breed']; ?>"><?php echo $similarDog['name']; ?></span>
                                </h5>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php 
        }
    } else{ echo "<h1>You're lost go <a href='index.php'>back</a>!!</h1>";  }
 } else { echo "<h1>You're lost go <a href='index.php'>back</a>!!</h1>"; 
  } ?>
		<!-- Adoption end -->
                        </br>
                        </br>
<?php
include('includes/footer.php');
?>