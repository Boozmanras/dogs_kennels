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
<h4>Unleashing the Extraordinary in Canine Companionship.<h4>

<p>At ChebaFam Kennels, we are passionate about bringing out the best in dogs and their human companions. Our mission is to create a world where dogs and their families live in perfect harmony, experiencing the joys of a deep and meaningful bond based on trust, understanding, and mutual respect.</p>

<p>With a name synonymous with excellence, ChebaFam Kennels is committed to setting a new standard in the realm of dog training and companionship. We take pride in our expertise and the innovative methods we employ to empower dogs and their owners to reach their full potential, both individually and as a unified team.</p>

<p>Our dedication to responsible dog ownership is unwavering. We believe that dogs are not just pets but cherished family members, deserving of love, care, and the opportunity to flourish. Through our expert training techniques, we aim to cultivate well-behaved, confident, and contented dogs that enrich the lives of their families, while also being valued and respected members of their communities.</p>

<p>At ChebaFam Kennels, we stay ahead of the curve by continually refining our training approaches and staying informed about the latest advancements in the field. Our trainers are highly skilled professionals who are deeply passionate about their craft, bringing a wealth of knowledge and experience to every interaction.</p>

<p>We understand that exceptional customer service is paramount. We strive to provide a seamless and transformative experience for our clients, guiding them through the journey of building a strong and harmonious relationship with their beloved canine companions. Our commitment to professionalism, integrity, and personalized attention ensures that each client receives the highest level of care and support.</p>

<p>As the leading authority in dog training, ChebaFam Kennels is dedicated to inspiring and transforming the lives of countless dogs and their families. Join us on this extraordinary adventure, where the extraordinary becomes the norm, and together, we can unlock the true potential within every dog, fostering a world where the human-dog bond thrives like never before.</p>
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
<h4><b>Unleashing a Harmonious World:
Where Dogs and Their Human Companions Thrive Together.</b></h4>

<p>At the heart of our vision lies a world where dogs and their human companions coexist in perfect harmony, bound by understanding and mutual respect. We strive for a society where well-mannered and self-assured dogs not only bring joy and fulfillment to their families but are also esteemed and valued members of their communities.</b>

<p>With our expertise, unwavering dedication, and groundbreaking training methods, we aspire to redefine the very essence of dog training, establishing a new benchmark that empowers both dogs and their owners. Together, we forge lifelong bonds built on trust, effective communication, and the power of positive reinforcement.</p>

<p>Our ambition knows no bounds. We aim to be renowned as the foremost authority in the realm of dog training, inspiring and revolutionizing the lives of countless dogs and their families. Join us on this transformative journey as we shape a future where dogs and their human companions thrive in unison, forever changing what it means to be a truly harmonious partnership.</p>





User

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

<h4><b>Unleash a Stronger Bond with Your Furry Friend,
While Ensuring Unparalleled Security.</b></h4>
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