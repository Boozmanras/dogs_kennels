<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 centered">
            <h3><span>Add testimony</span></h3>
            <p></p>
        </div>
    </div>
</div>

<div class="container content">
    <div class="row">
        <div class="col-md-9">
            <form role="form" id="contact_form">
                <div class="form-group">
                    <label for="InputName">Your name</label>
                    <input type="text" class="form-control" id="InputName" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Dog's image</label>
                    <input type="file" class="form-control" id="InputImg" name="image" placeholder="Dog's image" required>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Your message</label>
                    <textarea class="form-control" id="InputMessage" name="message" placeholder="Your review" rows="8" required></textarea>
                </div>
                <button type="submit" class="btn btn-default btn-green">Submit</button>
            </form>
        </div>
    </div>
    <?php include('testimony.php');
    include('testimony2.php');
    ?>
</div>

<script>
    document.getElementById("contact_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var successAlert = document.createElement("div");
                    successAlert.className = "alert alert-success";
                    successAlert.innerHTML = "Form submitted successfully!";
                    document.getElementById("contact_form").appendChild(successAlert);
                } else {
                    var errorAlert = document.createElement("div");
                    errorAlert.className = "alert alert-danger";
                    errorAlert.innerHTML = "Failed to submit the form.";
                    document.getElementById("contact_form").appendChild(errorAlert);
                }
            }
        };
        xhr.send(formData);
    });
</script>

</br></br>
<?php include('includes/footer.php'); ?>
