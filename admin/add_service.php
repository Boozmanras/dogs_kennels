<?php
include('include/header.php');


if (isset($_POST['submit'])) {
    $service = $_POST['service'];
    $more = $_POST['more'];
    $firstImage = $_FILES['img']['tmp_name'][0];
    $firstImageName = $_FILES['img']['name'][0];

    // Retrieve additional images
    $additionalImages = $_FILES['img']['tmp_name'];
    $additionalImageNames = $_FILES['img']['name'];

    // Move the first image to the destination directory
    if (move_uploaded_file($firstImage, 'assets/img/services/' . $firstImageName)) {
        $firstImagePath = 'assets/img/services/' . $firstImageName;

        // Apply watermark to the first image and save
        $watermarkImagePath = 'assets/img/t_logo.png'; // Path to your watermark image
        $firstOutputImagePath = 'assets/img/services/watermarked_' . $firstImageName;
        addWatermarkToImage($firstImagePath, $watermarkImagePath, $firstOutputImagePath);

        // Move additional images to the destination directory and apply watermark
        $additionalOutputImagePaths = [];
        foreach ($additionalImages as $key => $image) {
            $imageName = $additionalImageNames[$key];
            $imagePath = 'assets/img/services/' . $imageName;

            if (move_uploaded_file($image, $imagePath)) {
                // Apply watermark to additional images and save
                $additionalOutputImagePath = 'assets/img/services/watermarked_' . $imageName;
                addWatermarkToImage($imagePath, $watermarkImagePath, $additionalOutputImagePath);
                $additionalOutputImagePaths[] = $additionalOutputImagePath;
            } else {
                echo "Failed to move additional image: $imageName";
            }
        }

        // Prepare the data to be inserted into the database
        $data = [
            'name' => $service,
            'more' => $more,
            'img_1' => $firstImageName,
            'img_2' => isset($additionalOutputImagePaths[0]) ? basename($additionalOutputImagePaths[0]) : null,
            'img_3' => isset($additionalOutputImagePaths[1]) ? basename($additionalOutputImagePaths[1]) : null,
            'img_4' => isset($additionalOutputImagePaths[2]) ? basename($additionalOutputImagePaths[2]) : null,
            'img_5' => isset($additionalOutputImagePaths[3]) ? basename($additionalOutputImagePaths[3]) : null,
            'img_6' => isset($additionalOutputImagePaths[4]) ? basename($additionalOutputImagePaths[4]) : null,
        ];

        $table = 'services';
        // Call the function to insert data into the database
        $insertedRowId = insertDataToTable($conn, $table, $data);
        if ($insertedRowId) {
            // Data inserted successfully
            echo "<script> alert('Data inserted.'); </script>";
        } else {
            // Failed to insert data
            echo "<script> alert('Failed to insert data.'); </script>";
        }
    } else {
        echo "Failed to move the first image: $firstImageName";
    }
}


?>

<div class="content">
    <div class="container">
        <div class="page-title">
            <h3>Services</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Add service</div>
                    <div class="card-body">
                        <form accept-charset="utf-8" method="POST" action="add_service.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="email" class="form-label">Service</label>
                                <input type="text" name="service" placeholder="Name of service" value="<?php if (isset($service)) {echo $service;} ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="more">About service</label>
                                <textarea class="form-control" placeholder="More about the service" rows="5" required name="more"><?php if (isset($more)) {echo $more;} ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image 1</label>
                                <input type="file" name="img[]" class="form-control" required>
                            </div>
                            <div id="additional-images">
                                <!-- Additional image fields will be dynamically added here -->
                            </div>
                            <div class="mb-3">
                                <button type="button" id="add-image-btn" class="btn btn-primary">Add Another Image</button>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addButton = document.getElementById('add-image-btn');
        var additionalImagesContainer = document.getElementById('additional-images');
        var imageCount = 2; // Counter for dynamically added image fields

        addButton.addEventListener('click', function() {
            var inputWrapper = document.createElement('div');
            inputWrapper.className = 'mb-3';
            var inputLabel = document.createElement('label');
            inputLabel.textContent = 'Image ' + imageCount;
            var input = document.createElement('input');
            input.type = 'file';
            input.name = 'img[]';
            input.className = 'form-control';

            inputWrapper.appendChild(inputLabel);
            inputWrapper.appendChild(input);
            additionalImagesContainer.appendChild(inputWrapper);

            imageCount++;

            if (imageCount > 6) {
                addButton.style.display = 'none';
            }
        });
    });
</script>


<?php include('include/footer.php'); ?>