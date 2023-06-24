<?php
include('include/header.php');


if(isset($_POST['submit'])){

$wha = $_POST['wha'];
$twi = $_POST['twi'];
$insta = $_POST['insta'];
$tik = $_POST['tik'];
$contact = nl2br($_POST['contact']);

$table = 'settings';  
$columns = ['whatsapp', 'twitter','instagram','tiktok','contact']; 
$values = [$wha, $twi, $insta, $tik, $contact];
$conditions = 'WHERE id = 1';


updateDatabaseValues($conn, $table, $columns, $values, $conditions);

}


$table = 'settings'; 
$columns = 'whatsapp, twitter, instagram ,tiktok , contact';  
$conditions = 'WHERE id = 1';

// Call the function
$data = getDataFromDatabase($conn, $table, $columns, $conditions);

if($data){
   
    foreach ($data as $row) {
 $wha = $row['whatsapp'];
 $twi = $row['twitter'];
 $insta = $row['instagram'];
 $tik = $row['tiktok'];
 $contact = $row['contact'];

    }

} 
?>
<div class="content">
<div class="container">
<div class="page-title">
<h3>Contact information</h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">Contact form</div>
<div class="card-body">

<form accept-charset="utf-8" action="contact.php" method="post">
<div class="mb-3">
<label for="wha" class="form-label">Whatsapp number</label>
<input type="tel" name="wha" placeholder="eg +254 *****" value="<?php if(isset($wha)){ echo $wha; } ?>" class="form-control" required>
</div>
<div class="mb-3">
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">@</span>
<input type="text" class="form-control" placeholder="Twitter Username" name="twi" value="<?php if(isset($twi)){ echo $twi; } ?>" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="mb-3">
<label class="form-label">Instagram account link</label>
<input type="text" class="form-control" placeholder="Instagram link" name="insta" value="<?php if(isset($insta)){ echo $insta; } ?>">
</div>
<div class="mb-3">
<label class="form-label">Tiktok account link</label>
<input type="text" class="form-control" placeholder="Tiktok link" name="tik" value="<?php if(isset($tik)){ echo $tik; } ?>">
</div>
<div class="mb-3">
<label class="form-label">Contact message</label>
<textarea class="form-control" name="contact" rows="5" placeholder="keep it short"><?php if(isset($contact)){ echo $contact; } ?></textarea>
</div>
<div class="mb-3">
<input type="submit" name="submit" class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>


<?php
include('include/footer.php');
?>