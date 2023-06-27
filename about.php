<?php
include('includes/header.php');
//include('includes/config.php');

$table = "settings";
$columns = "about_us, mission, vision, trust";
$conditions = "WHERE id = 1";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

// Use the retrieved data
if ($data) {
    foreach ($data as $row) {
		$about = $row['about_us'];
		$mission = $row['mission'];
		$vision = $row['vision'];
		$trust = $row['trust'];
	}
}

?>
		<!-- Navigation end -->
		<!-- Adoption -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 centered">
					<h3><span>About us</span></h3>
					<!--<p>At Chebafam Dog Kennels, we are dedicated to revolutionizing the dog training and security industry. Our highly skilled team specializes in professional dog training, behavior modification,and top-notch security solutions. We strive to create a harmonious bond between dogs and their owners while ensuring the safety and well-being of our clients and their canine companions. With our exceptional services tailored to meet specific needs, we guarantee an unmatched experience that will transform the lives of both dogs and their owners.Trust Chebafam Dog Kennels for excellence in training, security, and lasting companionship.</p>
-->
<?php echo $about; ?>
		</div>
			</div>
		</div>
		<!-- Adoption end -->

		<!-- Staff -->
		<div class="staff" data-stellar-background-ratio=".3">


			<div class="container">
				<div class="row">
              <?php
								// Assuming $conn is your database connection object
				$table = "team";
				$columns = "*";
				$conditions = "";

				$data = getDataFromDatabase($conn, $table, $columns, $conditions);
				if ($data) {
					// Data retrieval successful
					foreach ($data as $row) {
						// Process each row of data
					
				?>
				
					<div class="col-md-3 member">
						<div data-stellar-ratio="1.2" data-stellar-vertical-offset="150" data-stellar-horizontal-offset="0">
							<span>
								<a href="<?php echo 'https://twitter.com/'.$row['twitter'] ?>" class="twitter"></a>
								<a href="<?php echo $row['fb']; ?>" class="facebook"></a>
								<img src="<?php echo 'admin/assets/img/'.$row['img']; ?>" alt="user img" />
							</span>
							<h4><?php echo $row['name']; ?></h4>
							<p><?php echo $row['role']; ?></p>
						</div>
					</div>
					<?php 
						}
					} else {
						// Data retrieval failed
						//echo "Failed to retrieve data.";
					}
	?>
					<!--<div class="col-md-3 member">
						<div data-stellar-ratio="1.2" data-stellar-vertical-offset="150" data-stellar-horizontal-offset="0">
							<span>
								<a href="#" class="twitter"></a>
								<a href="#" class="facebook"></a>
								<img src="images/profile2.png" alt="" />
							</span>
							<h4>Jane Doe</h4>
							<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
						</div>
					</div>
					<div class="col-md-3 member">
						<div data-stellar-ratio="1.2" data-stellar-vertical-offset="150" data-stellar-horizontal-offset="0">
							<span>
								<a href="#" class="twitter"></a>
								<a href="#" class="facebook"></a>
								<img src="images/profile3.png" alt="" />
							</span>
							<h4>John Doe</h4>
							<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
						</div>
					</div>
					<div class="col-md-3 member">
						<div data-stellar-ratio="1.2" data-stellar-vertical-offset="150" data-stellar-horizontal-offset="0">
							<span>
								<a href="#" class="twitter"></a>
								<a href="#" class="facebook"></a>
								<img src="images/profile4.png" alt="" />
							</span>
							<h4>Jane Doe</h4>
							<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- Staff end -->
		<!-- Content -->
		<div class="container content">
			<div class="row">
				<div class="col-md-6">
					<h3><span>Our vision</span></h3>
                     	
					<h3><span>Our business hours</span></h3>
					<div class="hours">
						<div>
							<p class="day">Monday</p>
							<p class="time">8am - 4pm</p>
						</div>
						<div>
							<p class="day">Tuesday</p>
							<p class="time">8am - 4pm</p>
						</div>
						<div>
							<p class="day">Wednesday</p>
							<p class="time">8am - 4pm</p>
						</div>
						<div>
							<p class="day">Thursday</p>
							<p class="time">8am - 4pm</p>
						</div>
						<div>
							<p class="day">Friday</p>
							<p class="time">8am - 4pm</p>
						</div>
						<div>
							<p class="day">Saturday</p>
							<p class="time">8am - 2pm</p>
						</div>
						<div>
							<p class="day">Sunday</p>
							<p class="time">8am - 1pm</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3><span>Our mission</span></h3>
					<div id="tabs">
					
						
<p>At our core, we are passionate about fostering responsible dog ownership, nurturing the extraordinary connection between humans and their four-legged companions, and providing trustworthy security solutions to individuals, families, and businesses alike.</p>

<p>With an unwavering commitment to employing the most effective and compassionate training techniques, we empower dogs to reach their utmost potential, paving the way for owners to relish a harmonious and fulfilled life alongside their cherished pets.</p>

<p>But it doesn't stop there. Our dedication extends beyond training to deliver an exceptional customer experience, going above and beyond to maintain the highest standards of professionalism in every facet of our business.</p>

<p>Join us on this transformative journey, where responsible dog ownership meets unbeatable customer service, creating an extraordinary life for both you and your beloved furry companion.</p>
							
						
						
					</div>
				</div>
			</div>
		</div>
		<!-- Content end -->
</br>
		<?php
		include('includes/footer.php');		?>