<?php
$table = 'testimonies';
$columns = 'location';
$conditions = "WHERE status = 'yes'";

$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if ($data) {
    $testimonialCount = count($data); // Get the number of testimonials

    echo '<div class="testimonials" data-stellar-background-ratio="0.6">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12 centered">';
    echo '<div id="home_testimonial" class="carousel slide" data-ride="carousel">';
    echo '<ol class="carousel-indicators">';

    // Generate the carousel indicators
    $i = 0; // Initialize the $i variable
    for ($i = 0; $i < $testimonialCount; $i++) {
        $isActive = ($i === 0) ? 'active' : '';
        echo '<li data-target="#home_testimonial" data-slide-to="' . $i . '" class="' . $isActive . '"></li>';
    }

    echo '</ol>';
    echo '<div class="carousel-inner">';

    // Generate the testimonial slides
    $i = 0; // Initialize the $i variable
    foreach ($data as $row) {
        $location = $row['location'];
        $isActive = ($i === 0) ? 'active' : '';

        echo '<div class="item ' . $isActive . '">';
        echo '<p>' . $location . '</p>';
        echo '</div>';

        $i++;
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo "No testimonials found.";
}
?>