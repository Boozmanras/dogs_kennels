
<?php
include('include/header.php');


//gets data 

$table = 'settings';
$columns = '*';
$conditions = 'WHERE id = 1';
// Call the function to get the data from the database
$data = getDataFromDatabase($conn, $table, $columns, $conditions);
if ($data !== false) {
// Process the fetched data
foreach ($data as $row) {
// Access individual columns of each row
$title = $row['site_name'];
$desc = $row['meta_description'];
$keywords = $row['meta_keywords'];
$s_logo = $row['site_logo'];
$s_favicon = $row['site_favicon'];
$s_email = $row['email'];
$s_phone = $row['phone'];
$location = $row['location'];
$google = $row['analytics'];
$about = $row['about_us'];
$mission = $row['mission'];
$vision = $row['vision'];
$trust = $row['trust'];


}
}
//about data
if(isset($_POST['about_btn'])){
$u_about = nl2br($_POST['about']);
$u_mission = nl2br($_POST['mission']);
$u_vision = nl2br($_POST['vision']);
$u_trust = nl2br($_POST['trust']);

$table = 'settings';
$columns = ['about_us', 'mission', 'vision','trust'];
$values = [$u_about, $u_mission, $u_vision, $u_trust];
$conditions = 'WHERE id = 1';

// Call the function to update the values in the database
updateDatabaseValues($conn, $table, $columns, $values, $conditions);

}


//general data
if(isset($_POST['general'])){

$title = $_POST['site_title'];
$desc = $_POST['site_description'];
$keywords = $_POST['meta_keywords'];
$s_email = $_POST['email'];
$s_phone = $_POST['tel'];
$location = $_POST['location'];
$google = $_POST['google'];

$site_logo = uploadFile("site_logo", "assets/img/");
$siteFavicon = uploadFile("site_favicon", "assets/img/");


$table = 'settings';
$columns = ['site_name', 'meta_description', 'meta_keywords','site_logo', 'site_favicon', 'email', 'phone', 'location', 'analytics'];
$values = [$title, $desc, $keywords, $site_logo, $siteFavicon, $s_email, $s_phone, $location, $google];
$conditions = 'WHERE id = 1';

// Call the function to update the values in the database
updateDatabaseValues($conn, $table, $columns, $values, $conditions);

}




?>
<script>

function handleKeyPress(event) {
if (event.keyCode === 13) {
event.preventDefault();
var textarea = document.getElementById("myTextarea");
var value = textarea.value;
value += "<p></p>";
textarea.value = value;
}
}
</script>
<!-- end of navbar navigation -->
<div class="content">
<div class="container">
<div class="page-title">
<h3>Settings</h3>
</div>
<div class="box box-primary">
<div class="box-body">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
</li>
<li class="nav-item">
<a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">About us</a>
</li>
<!--
<li class="nav-item">
<a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Contact</a>
</li>
<li class="nav-item">
<a class="nav-link" id="appearance-tab" data-bs-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Appearance</a>
</li>
<li class="nav-item">
<a class="nav-link" id="attributions-tab" data-bs-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Attributions</a>
</li> -->
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
<div class="col-md-6">
<form accept-charset="utf-8" action="settings.php" method="POST" enctype="multipart/form-data">
<p class="text-muted">General settings such as, site title, site description, address and so on.</p>
<div class="mb-3">
<label for="site-title" class="form-label">Site Title</label>
<input type="text" value="<?php if(isset($title)){echo $title; } ?>" placeholder="site title" name="site_title" class="form-control">
</div>
<div class="mb-3">
<label for="site-description" class="form-label">Site Description</label>
<textarea class="form-control" name="site_description" placeholder="meta description"><?php if(isset($desc)){echo $desc; } ?></textarea>
</div>
<div class="mb-3">
<label for="site-keywords" class="form-label">Site keywords(separate with commas)</label>
<textarea class="form-control" name="meta_keywords" placeholder="Keywords"><?php if(isset($keywords)){echo $keywords; } ?></textarea>
</div>

<div class="mb-3">
<label class="form-label">Site Logo</label>
<input class="form-control" name="site_logo" type="file" id="formFile1">
<small class="text-muted">The image must have a maximum size of 1MB</small></br>
<img id="logoPreview" src="<?php if(isset($s_logo)){echo 'assets/img/'.$s_logo; } ?>" alt="Logo Preview" style="max-width: 150px; border-radius: 50%; margin-top: 10px;">
</div>
<div class="mb-3">
<label class="form-label">Favicon</label>
<input class="form-control" name="site_favicon" type="file" id="formFile2">
<small class="text-muted">The image must have a maximum size of 1MB</small></br>
<img id="faviconPreview" class="preview-image" src="<?php if(isset($s_favicon)){echo 'assets/img/'.$s_favicon; } ?>" alt="Favicon Preview" style="max-width: 150px; border-radius:50%; margin-top: 10px;">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input class="form-control" name="email" type="email" placeholder="Site's email" value="<?php if(isset($s_email)){echo $s_email; } ?>">

</div>
<div class="mb-3">
<label class="form-label">Phone</label>
<input class="form-control" name="tel" type="tel" placeholder="Site's phone" value="<?php if(isset($s_phone)){echo $s_phone; } ?>">

</div>

<div class="mb-3">
<label class="form-label">Location</label>
<input class="form-control" name="location" type="text" placeholder="Business location" value="<?php if(isset($location)){echo $location; } ?>">

</div>


<div class="mb-3">
<label class="form-label">Google Analytics Code</label>
<textarea class="form-control" name="google" rows="4"><?php if(isset($google)){echo $google; } ?></textarea>
</div>
<div class="mb-3 text-end">
<button class="btn btn-success" name='general' type="submit"><i class="fas fa-check"></i> Save</button>
</div>







</div>






</div>
<div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
<div class="col-md-6">
<p class="text-muted">Application settings, About us, mission, vision.</p>
<form action="settings.php" method="POST">
<div class="mb-3">
<label for="language" class="form-label">About us</label>
<textarea name="about" id="about" class="form-control" placeholder="Keep short and brief" rows="7"><?php if(isset($about)){echo $about; } ?></textarea>
</div>
<div class="mb-3">
<label for="site-title" class="form-label">Mission</label>
<textarea name="mission" id="mission" class="form-control" placeholder="Short and Brief" rows="5"><?php if(isset($mission)){echo $mission; } ?></textarea>
</div>
<div class="mb-3">
<label for="dateformat" class="form-label">Vision</label>
<textarea name="vision" id="vision" class="form-control" placeholder="Vision" rows="5"><?php if(isset($vision)){echo $vision;} ?></textarea>
</div>
<div class="mb-3">
<label for="trust" class="form-label">Trust us</label>
<textarea name = "trust" class="form-control" placeholder="trust us" rows="2"><?php if(isset($trust)){echo $trust; } ?></textarea>
</div>
<div class="mb-3 text-end">
<button class="btn btn-success" name="about_btn" type="submit"><i class="fas fa-check"></i> Save</button>
</div>
</form>
</div>
</div>

<div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
<div class="col-md-6">
<p class="text-muted">Contact infomation</p>

<div class="mb-3 text-end">
<button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
</div>
</div>
</div>
<div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
<div class="col-md-6">
<p class="text-muted">Settings about appearance such as themes, icon and color scheme.</p>
<div class="mb-3">
<label for="" class="form-label">Theme</label>
<select name="" class="form-select">
<option value="">Select theme</option>
<option value="">Dark</option>
<option value="">Light</option>
<option value="">Classic</option>
</select>
</div>
<div class="mb-3">
<label for="" class="form-label">Display colored icons</label>
<select name="" class="form-select">
<option value="">Enabled</option>
<option value="">Disabled</option>
</select>
</div>
<div class="mb-3">
<label for="" class="form-label">Set default font size</label>
<select name="" class="form-select">
<option value="">10</option>
<option value="">12</option>
<option value="">13</option>
<option value="">14</option>
<option value="">15</option>
<option value="">16</option>
<option value="">17</option>
<option value="">18</option>
<option value="">19</option>
<option value="">20</option>
</select>
</div>
<div class="mb-3 text-end">
<button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
</div>
</div>
</div>
<div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
<h4 class="mb-0">Legal Notice</h4>
<p class="text-muted">Copyright (c) 2021 Brian Luna. All rights reserved.</p>
<p class="mb-0"><strong>Bootstrap</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright 2011-2018 Twitter, Inc. <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>jQuery JavaScript Library</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright jQuery Foundation and other contributors <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>DataTables</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright 2008-2018 SpryMedia Ltd <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>Chart.js</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright 2018 Chart.js Contributors <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>Air Datepicker</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright (c) 2016 Timofey Marochkin <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>MDTimePicker</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright (c) 2017 Dionlee Uy <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>Fontawesome</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Font Awesome Free License <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
<p class="mb-0"><strong>Flag Icon CSS</strong></p>
<p class="text-muted">The MIT License (MIT)</p>
<p class="ps-4 col-md-6">
Copyright (c) 2013 Panayiotis Lipiridis <br><br>
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
<br><br>
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
<br><br>
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
include('include/footer.php');
?>