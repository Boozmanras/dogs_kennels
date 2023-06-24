<?php
include('includes/header.php');


$table = 'settings'; 
$columns = 'email, phone, location, contact';
$conditions = 'WHERE id = 1';

$data = getDataFromDatabase($conn, $table, $columns, $conditions);


if ($data) {
    // Process the retrieved data
    foreach ($data as $row) {
  $email = $row['email'];
  $phone = $row['phone'];
  $location = $row['location'];
  $contact = $row['contact'];
    }
} else {
    // Handle the case where data retrieval failed
    echo "Failed to retrieve data.";
}

?>
		<!-- Navigation end -->
		<!-- Contact -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 centered">
					<h3><span>Contact us</span></h3>
					<p><?php echo $contact; ?></p>
				</div>
			</div>
		</div>
		<!-- Contact end -->
		
		<!-- Content -->
		<div class="container content">
			<div class="row">
				<div class="col-md-9">
					<form role="form" id="contact_form">
						<div class="form-group">
							<label for="InputName">Your name</label>
							<input type="text" class="form-control" id="InputName" placeholder="Your name">
						</div>
						<div class="form-group">
							<label for="InputEmail">Your email</label>
							<input type="email" class="form-control" id="InputEmail" placeholder="Your email">
						</div>
						<div class="form-group">
							<label for="InputMesaagel">Your messsage</label>
							<textarea class="form-control" id="Message" placeholder="Your message" rows="8"></textarea>
						</div>
						<button type="submit" class="btn btn-default btn-green">Send message</button>
					</form>
				</div>
				<div class="col-md-3">
					<ul class="contact-info">
						<li class="telephone">
							<?php echo $phone; ?>
						</li>
						<li class="address">
							<?php echo $location; ?>
						</li>
						<li class="mail">
							<?php echo $email; ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Content end -->
</br>
		<?php
		include('includes/footer.php');
		?>