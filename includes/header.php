<?php include('config.php');


// Call the getDataFromDatabase function
$table = "settings";
$columns = "*";
$conditions = "WHERE id = 1";
$data = getDataFromDatabase($conn, $table, $columns, $conditions);

// Check if the function returned data successfully
if ($data !== false) {
// Process the retrieved data
foreach ($data as $row) {
// Access the values of each row
$title = $row['site_name'];
$meta_desc = $row['meta_description'];
$keywords = $row['meta_keywords'];
$logo = $row['site_logo'];
$favicon = $row['site_favicon'];
$analytics = $row['analytics'];

// Perform any desired operations with the data
// ...
}
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from xenothemes.co.uk/html-templates/petcare/prices.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Jun 2023 15:22:05 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $meta_desc; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="robots" content="index, follow"> <!-- Set to "noindex, nofollow" to prevent indexing -->
<meta name="language" content="English">
<meta name="og:title" content="<?php echo $title; ?>">
<meta name="og:description" content="<?php echo $meta_desc; ?>">
<meta name="og:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'/admin/assets/img/'.$logo; ?>">
<meta name="og:url" content="<?php echo $_SERVER['SERVER_NAME']; ?>">
<meta name="og:site_name" content="<?php echo $title; ?>">
<meta name="twitter:title" content="<?php echo $title; ?>">
<meta name="twitter:description" content="<?php echo $meta_desc; ?>">
<meta name="twitter:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'/admin/assets/img/'.$logo; ?>">
<meta name="twitter:card" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'/admin/assets/img/'.$logo; ?>">
<link rel="icon" type="image/png" href="favicon.png">
<title><?php echo $title; ?></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/mains.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" /><![endif]-->
<style>
.navbar-default {
background-color: #000; /* Set the background color */
}

.navbar-default .navbar-nav > li > a {
color: #555; /* Set the text color */
}

</style>
</head>
<body class="contentpage">
<div id="loader" class="loader">
<div class="puppy">
<div class="ear-left"></div>
<div class="ear-right"></div>
<div class="face">
<div class="eye-left"></div>
<div class="eye-right"></div>
<div class="nose"></div>
</div>
<div class="mouth">
<div class="tongue"></div>
</div>
</div>
</div>

<div class="navbar-links-container">
<!-- Navigation -->
<div class="navbar navbar-default navbar-fixed-top affix inner-pages" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<h1><a class="navbar-brand" href="index.php"><strong>CHEBA</strong>FAM<br />
<span data-hover="Kennels">Kennels</span>
</a></h1>
</div>	
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>
<a href="index.php" title="Home"><span data-hover="Home">Home</span></a>
</li>

<?php /*?><li <?php if(basename($_SERVER['PHP_SELF']) == 'prices.php') echo 'class="active"'; ?>>
<a href="prices.php" title="Prices"><span data-hover="Prices">Prices</span></a>
</li> */ ?>
<li <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>
<a href="about.php" title="About us"><span data-hover="About us">About us</span></a>
</li>
<li <?php if(basename($_SERVER['PHP_SELF']) == 'services.php') echo 'class="active"'; ?>>
<a href="services.php" title="Services"><span data-hover="Services">Services</span></a>

</li>
<li <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?>>
<a href="contact.php" title="Contact us"><span data-hover="Contact us">Contact us</span></a>
</li>
<li <?php if(basename($_SERVER['PHP_SELF']) == 'add_testimony.php') echo 'class="active"'; ?>>
<a href="add_testimony.php" title="Testimonies"><span data-hover="Testimonies">Testimonies</span></a>
</li>

</ul>
</div>
</div>
</div>

